<?php

namespace App\Http\Controllers\MasterMahasiswa;

use Auth;
use DataTables;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Modes
use App\Models\Pasar;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Mapel;
use Spatie\Permission\Models\Role;

class MahasiswaController extends Controller
{
    protected $route = 'master-mahasiswa.mahasiswa.';
    protected $view  = 'pages.mahasiswa.';
    protected $title = 'mahasiswa';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

       
        $provinsi = Provinsi::select('id', 'n_provinsi')->get();
        $jurusan = Jurusan::select('id', 'nama')->get();
        $mapel = Mapel::select('id', 'n_nama')->get();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'provinsi',
            'jurusan',
            'mapel'
        ));
    }
    public function kabupatenByProvinsi($provinsi_id)
    {
        return Kabupaten::select('id', 'n_kabupaten')->where('provinsi_id', $provinsi_id)->get();
    }

    public function kecamatanByKabupaten($kabupaten_id)
    {
        return Kecamatan::select('id', 'n_kecamatan')->where('kabupaten_id', $kabupaten_id)->get();
    }

    public function kelurahanByKecamatan($kecamatan_id)
    {
        return Kelurahan::select('id', 'n_kelurahan')->where('kecamatan_id', $kecamatan_id)->get();
    }
    public function mapelByJurusan($jurusan_id)
    {
        return mapel::select('id', 'n_nama')->where('jurusan_id', $jurusan_id)->get();
    }


    public function api()
    {
        $mahasiswa = Mahasiswa::all();
        return Datatables::of($mahasiswa)
            
            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route($this->route . 'show', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })
            
            ->editColumn('id_mapel',function($p) {
                if ($p->mapel != null) {
                    return $p->mapel->n_nama;
                } else {
                    return '-';
                }  
            })
            ->editColumn('id_kec',function($p) {
                if ($p->kecamatan != null) {
                    return $p->kecamatan->n_kecamatan;
                } else {
                    return '-';
                } 
            
            })
            ->addIndexColumn()
            ->rawColumns(['action', ])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:roles,name',
            'nim' => 'required',
            'id_kel' => 'required'
        ]);

        $input = $request->all();
      
        Mahasiswa::create($input);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $route = $this->route;
        $title = $this->title;
        $jurusan = Jurusan::select('id', 'nama')->get();

        return view($this->view . 'show', compact(
            'route',
            'title',
            'mahasiswa',
            'jurusan'
            
        ));

        
    }

    public function editPassword($id)
    {
        $route = $this->route;
        $title = $this->title;

        $mahasiswa = Mahasiswa::findOrFail($id);

        return view($this->view . 'form_password', compact(
            'route',
            'title',
            'mahasiswa'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $provinsi = Provinsi::select('id', 'n_provinsi')->get();
        return Mahasiswa::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:mahasiswa,nama,' . $id,
            'nim' => 'required'
        ]);

        $input = $request->all();
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($input);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasisw = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.']);
        
    }
}
