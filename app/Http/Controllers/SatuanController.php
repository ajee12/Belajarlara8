<?php

namespace App\Http\Controllers;

use App\Models\SatuanModel;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    protected $SatuanModel;
    public function __construct()
    {
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {
        $data = ['satuan' => $this->SatuanModel->getData()];
        return view('satuan/v_satuan', $data);
    }

    public function tambah_satuan()
    {
        $data = [
            'name_satuan' => Request()->name_satuan,

        ];
        $this->SatuanModel->add_satuan($data);
        return redirect()->to('satuan/index')->with('sukses', 'Data Satuan Berhasil Ditambahkan');
    }

    public function edit_satuan($id)
    {
        $data = [
            'id' => $id,
            'name_satuan' => Request()->name_satuan
        ];
        $this->SatuanModel->edit_satuan($data, $id);
        return redirect()->to('satuan/index')->with('sukses', 'Data Satuan Berhasil Di Edit');
    }

    public function delete_satuan($id)
    {
        $data = ['id' => $id];
        $this->SatuanModel->delete_satuan($data);
        return redirect()->to('satuan/index')->with('danger', 'Data Satuan Berhasil Dihapus!');
    }

    //
}
