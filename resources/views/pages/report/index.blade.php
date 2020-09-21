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
            <div class="">
                <div class="ml-3 font-weight-bold">
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
                                <p>NPWP : <span class="font-weight-bolder">BELUM ADA</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-top: -10px">
                        <div class="row">
                            <div class="col border2 bg-transparent" style="border-right: none">
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
                        <div class="row mt-2">
                            <div class="col-2 border2 bg-transparent" style="border-right: none">
                                <P class="text-center mt-2">OBJEK PAJAK</P>
                            </div>
                            <div class="col-2 border2 bg-transparent" style="border-bottom: none; border-right: none">
                                <P class="text-center mt-2">LUAS(M2)</P>
                            </div>
                            <div class="col-1 border2 bg-transparent" style="border-right: none; border-bottom: none">
                                <P class="text-center mt-2">KELAS</P>
                            </div>
                            <div class="col-7 border2 bg-transparent" style="border-bottom: none">
                                <P class="text-center m-0">NJOP(Rp)</P>
                                <div class="row">
                                    <div class="col">
                                        <p style="border-top: 1px solid black; border-right: 1px solid black; width: 110%; margin-left: -15px !important" class="text-center m-0">PER M2</p>
                                    </div>
                                    <div class="col">
                                        <p style="border-top: 1px solid black; width: 110%; margin-left: -15px !important" class="text-center m-0">PER M2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 border2 bg-transparent" style="border-top: none; border-right: none">
                                <P class="m-0">BUMI</P>
                                <P>BANGUNAN</P>
                            </div>
                            <div class="col-2 border2 bg-transparent" style="border-right: none">
                                <P class="m-0 text-right">972</P>
                                <P class="text-right">1.064</P>
                            </div>
                            <div class="col-1 border2 bg-transparent" style="border-right: none">
                                <P class="text-center m-0">B49</P>
                                <P class="text-center">A02</P>
                            </div>
                            <div class="col-7 border2 bg-transparent">
                                <div class="row">
                                    <div class="col">
                                        <div class="pr-3" style="border-right: 1px solid black; height: 100%; margin-right: -15px">
                                            <p class="text-right m-0">3.745.000</p>
                                            <p class="text-right">968.000</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="text-center m-0">3.640.140.000</p>
                                        <p class="text-center">1.029.111.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border2 bg-transparent" style="border-top: none">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</html>
