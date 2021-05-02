@extends('theme.main', ["title" => "Daftar Hewan"])
@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div id="content_list">
                <div class="grid-filter-wrap">
                    <!-- Portfolio Filter ============================================= -->
                    <form id="form_filter">
                        <select onchange="load_list(1);" name="jenis" class="form-control">
                            <option value="semua" selected>Semua</option>
                            <option value="Anjing"></option>
                            <option value="Kucing"></option>
                        </select>
                    </form>
                </div>
                <div id="list_result"></div>
            </div>
            <div id="content_input"></div>
        </div>
    </section>
</div>
@endsection
@section('custom_js')
<script type="text/javascript">
    $(function() {
        load_list(1);
    });
</script>
@endsection