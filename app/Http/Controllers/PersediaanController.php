<?php

namespace App\Http\Controllers;

use App\Models\PersediaanModel;
use App\Models\SatuanModel;

use Illuminate\Http\Request;

class PersediaanController extends Controller
{
    protected $SatuanModel;
    protected $PersediaanModel;

    //
    public function __construct()
    {
        $this->PersediaanModel = new PersediaanModel;
        $this->SatuanModel = new SatuanModel;
    }
    public function index()
    {
        $data = [
            'persediaan' => $this->PersediaanModel->getData()
        ];

        return view('persediaan/v_persediaan', $data);
    }
    public function tambah_persediaan()
    {
        $data = [
            'satuan' => $this->SatuanModel->getData()
        ];

        return view('persediaan/t_persediaan', $data);
    }
    public function save_persediaan()
    {

        $data = [
            'kode' => Request()->kode,
            'name' => Request()->name,
            'id_satuan' => Request()->id_satuan,
            'hrgjual' => Request()->hrgjual,
            'hrgbeliratarata' => Request()->hrgbeliratarata

        ];
        $this->PersediaanModel->tambah_persediaan($data);
        return redirect()->to('/persediaan/index')->with('sukses', 'Data Persediann Berhasil Ditambahkan');
    }
}
