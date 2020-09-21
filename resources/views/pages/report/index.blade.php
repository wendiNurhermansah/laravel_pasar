@php
$template = App\Models\Template::select('id', 'logo', 'logo_title')->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title --> 
    <link rel="icon" href="{{ asset('images/logo/'.$template->logo_title) }}" type="image/x-icon">
    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">

    <style>
        .border2 {
          border: 1px solid black;
        }
    </style>

</head>
<body class="light" style="font-family: Arial, Helvetica, sans-serif">
    <div class="container my-4" style="background-color:#FC8C4F !important">
        <div class="justify-content-center">
            <div class="font-weight-bold">
                <div class="ml-3">
                    <p class="m-0">KANTOR WILAYAH : <span class="font-weight-light">DJP JAKARTA 1</span></p>
                    <p>KANTOR PELAYANAN PBB : <span class="font-weight-light">JAKARTA CEMPAKA PUTIH</span></p>
                </div>
                <div style="background-color: #FAC2AA !important">
                    <div class="text-center fs-18 font-weight-bolder" style="margin-top: -10px">
                        <p class="m-0">SURAT PEMBERITAHUAN PAJAK TERHUTANG</p>
                        <P>PAJAK BUMI DAN BANGUNAN TAHUN</P>
                    </div>
                    <div class="container" style="margin-top: -10px">
                        <div class="row">
                            <div class="col-8">
                                <p>NO.SPPT(NOP) : <span class="font-weight-bold">xx.xx.xxx.xxx.xxx.xxx.x</span></p>
                            </div>
                            <div class="col-4">
                                <p>NPWP : <span class="font-weight-bold">BELUM ADA</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-top: -10px">
                        <div class="row">
                            <div class="col border2 bg-transparent">
                                <p class="text-center">LETAK OBJEK PAJAK</p>
                                <div>
                                    <p class="m-0">JL : <span class="font-weight-bold">xxxxxxxxxx</span></p>
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="mr-40">RT : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                        <div class="col-10">
                                            <p>RW : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                    </div>
                                    <div style="margin-top: -13px">
                                        <p class="m-0">RAWASARI</p>
                                        <p class="m-0">CEMPAKA PUTIH</p>
                                        <p class="m-0">JAKARTA PUSAT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col border2 bg-transparent">
                                <p class="text-center">LETAK OBJEK PAJAK</p>
                                <div>
                                    <p class="m-0"><span class="font-weight-bold">xxxxxxxxxx</span></p>
                                    <p class="m-0">JL : <span class="font-weight-bold">xxxxxxxxxx</span></p>
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="mr-40">RT : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                        <div class="col-10">
                                            <p>RW : <span class="font-weight-bold">xxx</span></p>
                                        </div>
                                    </div>
                                    <div style="margin-top: -13px">
                                        <p class="m-0">RAWASARI</p>
                                        <p class="m-0">JAKARTA PUSAT</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mt-2">
                            <div class="col-2 border2 bg-transparent">
                                <P class="text-center">OBJEK PAJAK</P>
                            </div>
                            <div class="col-2 border2 bg-transparent">
                                <P class="text-center">LUAS(M2)</P>
                            </div>
                            <div class="col-1 border2 bg-transparent">
                                <P class="text-center">KELAS</P>
                            </div>
                            <div class="col-7 border2 bg-transparent">
                                <P class="text-center m-0">NJOP(Rp)</P>
                                
                                <p style="border-top: 1px solid black; width: 105%; margin-left: -15px !important" class="text-center m-0">PER M2</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</html>
