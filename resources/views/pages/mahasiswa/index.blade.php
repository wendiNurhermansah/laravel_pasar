@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-users mr-2"></i>
                        List {{ $title }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-home2"></i>Semua Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-plus"></i>Tambah Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card no-b">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th width="30">No</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Alamat</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tambah-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div id="alert"></div>
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('POST') }}
                                    <input type="hidden" id="id" name="id"/>
                                    <h4 id="formTitle">Tambah Data</h4><hr>
                                    <div class="form-row form-inline">
                                        <div class="col-md-8">
                                            <div class="form-group m-0">
                                                <label for="nama" class="col-form-label s-12 col-md-2">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="nim" class="col-form-label s-12 col-md-2">Nim</label>
                                                <input type="text" name="nim" id="nim" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label s-12 col-md-2">Alamat</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="id_prov" id="id_prov" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                        @foreach ($provinsi as $i)
                                                            <option value="{{ $i->id }}">{{ $i->n_provinsi }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label s-12 col-md-2">Kabupaten/Kota</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="id_kab" id="id_kab" autocomplete="off">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label s-12 col-md-2">Kecamatan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="id_kec" id="id_kec" autocomplete="off">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label s-12 col-md-2">Kelurahan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="id_kel" id="id_kel" autocomplete="off">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label s-12 col-md-2">Jurusan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="id_jurusan" id="id_jurusan" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                        @foreach ($jurusan as $i)
                                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label s-12 col-md-2">Mapel</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="id_mapel" id="id_mapel" autocomplete="off">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-2" style="margin-left: 17%">
                                                <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                                <a class="btn btn-sm" onclick="add()" id="reset">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        pageLength: 15,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route($route.'api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'nama', name: 'nama'},
            {data: 'nim', name: 'nim'},
            {data: 'id_kec', name: 'id_kec'},
            {data: 'id_mapel', name: 'n_nama'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });
 $('#id_prov').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_kab').html(option);
            $('#id_kec').html(option);
            $('#id_kel').html(option);
            selectOnChange();
        }else{
            $('#id_kab').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'kabupatenByProvinsi', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kabupaten +"</li>";
                    });
                    $('#id_kab').empty().html(option);

                    $("#id_kab").val($("#id_kab option:first").val()).trigger("change.select2");
                }else{
                    $('#id_kab').html(option);
                    $('#id_kec').html(option);
                    $('#id_kel').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#id_kab').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_kec').html(option);
            $('#id_kel').html(option);
            selectOnChange();
        }else{
            $('#id_kec').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'kecamatanByKabupaten', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kecamatan +"</li>";
                    });
                    $('#id_kec').empty().html(option);

                    $("#id_kec").val($("#id_kec option:first").val()).trigger("change.select2");
                }else{
                    $('#id_kec').html(option);
                    $('#id_kel').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#id_kec').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_kel').html(option);
            selectOnChange();
        }else{
            $('#id_kel').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'kelurahanByKecamatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kelurahan +"</li>";
                    });
                    $('#id_kel').empty().html(option);

                    $("#id_kel").val($("#id_kel option:first").val()).trigger("change.select2");
                }else{
                    $('#id_kel').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#id_jurusan').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_mapel').html(option);
            
            selectOnChange();
        }else{
            $('#id_mapel').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'mapelByJurusan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_nama +"</li>";
                    });
                    $('#id_mapel').empty().html(option);

                    $("#id_mapel").val($("#id_mapel option:first").val()).trigger("change.select2");
                }else{
                    $('#id_mapel').html(option);
                   
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
        $('#username').focus();
    }

    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route($route.'store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    table.api().ajax.reload();
                    add();    
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route($route.'destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }



   

</script>

@endsection