@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-users mr-2"></i>
                        Show {{ $title }} | {{ $mahasiswa->nama }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li>
                        <a class="nav-link" href="{{ route($route.'index') }}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-user"></i>Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#edit-data" role="tab"><i class="icon icon-edit"></i>Edit Data</a>
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
                        <div class="card">
                            <h6 class="card-header"><strong>Data Pegawai</strong></h6>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Username :</strong></label>
                                        <label class="col-md-3 s-12">{{ $mahasiswa->nama }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Nim :</strong></label>
                                        <label class="col-md-3 s-12">{{ $mahasiswa->nim }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Alamat :</strong></label>
                                        <label class="col-md-3 s-12">{{ $mahasiswa->id_kec }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Jurusan :</strong></label>
                                        <label class="col-md-3 s-12">{{ $mahasiswa->id_jurusan }}</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.mahasiswa.form_edit')
        </div>
    </div>
</div>
   
@endsection
