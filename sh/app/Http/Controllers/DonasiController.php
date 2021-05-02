<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Exports\DonasiExport;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
class DonasiController extends Controller
{
    public function index()
    {
        $donasi = Donasi::get();

        $count_donasi = DB::table('donasis')
        ->select(DB::raw('count(id) as `total`'),  DB::raw('MONTH(created_at) bulan'))
        ->groupby('bulan')
        ->get();

        return view('donasi.index',compact('donasi','count_donasi'));
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'alasan' => 'required',
                'nama' => 'required',
                'jenis' => 'required',
                'lokasi' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf sepertinya ada kesalahan,silahkan ulang.',
            ]);
        }
        try {
            $gambar = request()->file('gambar')->store("donasi");
            $donasi = new Donasi;
            $donasi->alasan = $request->alasan;
            $donasi->user_id = Auth::user()->id;
            $donasi->nama = $request->nama;
            $donasi->jenis = $request->jenis;
            $donasi->lokasi = $request->lokasi;
            $donasi->gambar = $gambar;
            $donasi->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi '. $request->nama . ' sedang diproses',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf sepertinya ada kesalahan,silahkan ulang.',
            ]);
        }
    }

}
