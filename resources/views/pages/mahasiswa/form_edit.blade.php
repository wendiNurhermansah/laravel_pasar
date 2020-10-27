<div class="tab-pane animated fadeInUpShort" id="edit-data" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div id="alert"></div>
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" id="form" method="PATCH"  enctype="multipart/form-data" novalidate>
                        {{ method_field('PATCH') }}
                        <input type="hidden" id="id" name="id" value="{{ $mahasiswa->id }}"/>
                        <h4>Edit Data</h4><hr>
                        <div class="form-row form-inline">
                            <div class="col-md-8">
                                <div class="form-group m-0">
                                    <label for="nama" class="col-form-label s-12 col-md-2">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control r-0 light s-12 col-md-6" value="{{ $mahasiswa->nama }}" autocomplete="off" required/>
                                </div>
                    
                                <div class="form-group m-t-5">
                                    <label for="nim" class="col-form-label s-12 col-md-2">Nim</label>
                                    <input type="text" name="nim" id="nim" class="form-control r-0 light s-12 col-md-6" value="{{ $mahasiswa->nim }}" autocomplete="off" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-form-label s-12 col-md-2">Jurusan</label>
                                        <div class="col-md-6 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_jurusan" id="id_jursan" autocomplete="off">
                                                <option value="">Pilih</option>
                                                @foreach ($jurusan as $i)
                                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                                @endforeach
                                            </select>
                                                    
                                        </div>
                                </div>
                                
                                
                                <div class="form-group m-0">
                                    <label class="col-form-label s-12 col-md-2"></label>
                                    <img width="150" class="rounded img-fluid mt-2 mb-2" id="preview" alt=""/>
                                </div>
                                <div style="margin-left: 17%">
                                    <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
    $('#mahasiswa').val("{{$mahasiswa->id}}");
    $('#role_id').trigger('change.select2');

    (function () {
        'use strict';
        $('.input-file').each(function () {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();

            $input.on('change', function (element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                    .removeClass('has-file').html(labelVal);
            });
        });
    })();

    function tampilkanPreview(gambar, idpreview) {
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                $.confirm({
                    title: '',
                    content: 'Tipe file tidak boleh! haruf format gambar (png, jpg)',
                    icon: 'icon icon-close',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    buttons: {
                        ok: {
                            text: "ok!",
                            btnClass: 'btn-primary',
                            keys: ['enter'],
                            action: reset()

                        }
                    }
                });
            }
        }
    }

    function reset(){
        $('#form').trigger('reset');
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
    }

    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route($route.'update', ':id') }}".replace(':id', $('#id').val());
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    location.reload();
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

</script>
@endsection