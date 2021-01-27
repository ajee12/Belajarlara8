<?php

namespace App\Http\Controllers;

use App\Models\PelangganModel;
use App\Models\PemasokModel;


use Illuminate\Http\Request;

class PemasokController extends Controller
{
    protected $PemasokModel;
    public function __construct()
    {

        $this->PemasokModel = new PemasokModel();
    }
    public function index()
    {
        $data = [
            'pemasok' => $this->PemasokModel->getdata()
        ];
        return view('pemasok/v_pemasok', $data);
    }

    public function tambah_pemasok()
    {
        return view('pemasok/t_pemasok');
    }
    public function save_pemasok()
    {
        Request()->validate([
            'kode' => 'required|max:10',
            'name' => 'required',
            'alamat' => 'required',
            'telp' => 'required|max:12',
            'namapimpinan' => 'required',
            'namaadmin' => 'required'
        ], [
            'kode.required' => 'Wajib diisi!!',
            'kode.max' => 'Kode Anda Terlalu Panjang',
            'name.required' => 'Wajib Diisi',
            'alamat.required' => 'Wajib Diisi',
            'telp.required' => 'Wajib Diisi',
            'telp.max' => 'No Hp Anda Terlalu Panjang',
            'namapimpinan.required' => 'Wajib Diisi',
            'namaadmin.required' => 'Wajib Diisi',

        ]);
        $data = [
            'kode' => Request()->kode,
            'name' => Request()->name,
            'alamat' => Request()->alamat,
            'telp' => Request()->telp,
            'namapimpinan' => Request()->namapimpinan,
            'namaadmin' => Request()->namaadmin,



        ];

        $this->PemasokModel->add_pemasok($data);
        return redirect()->to('/pemasok/index')->with('sukses', 'Data Pemasok Behasil Ditambahkan');
    }
    public function edit_data()
    {
        $data = [
            'pemasok' => $this->PemasokModel->getdata()
        ];
        return view('pemasok/v_pemasok', $data);
    }

    public function save_edit($id)
    {
        Request()->validate([
            'kode' => 'required|nullable|max:10',
            'name' => 'required',
            'alamat' => 'required',
            'telp' => 'required|max:12',
            'namapimpinan' => 'required',
            'namaadmin' => 'required'
        ], [
            'kode.required' => 'Wajib diisi!!',
            'kode.max' => 'Kode Anda Terlalu Panjang',
            'name.required' => 'Wajib Diisi',
            'alamat.required' => 'Wajib Diisi',
            'telp.required' => 'Wajib Diisi',
            'telp.max' => 'No Hp Anda Terlalu Panjang',
            'namapimpinan.required' => 'Wajib Diisi',
            'namaadmin.required' => 'Wajib Diisi',

        ]);
        $data = [
            'id' => $id,
            'kode' => Request()->kode,
            'name' => Request()->name,
            'alamat' => Request()->alamat,
            'telp' => Request()->telp,
            'namapimpinan' => Request()->namapimpinan,
            'namaadmin' => Request()->namaadmin,



        ];

        $this->PemasokModel->edit_pemasok($data);
        return redirect()->to('/pemasok/index')->with('sukses', 'Data Pemasok Berhasil Diedit');
    }

    public function delete($id)
    {

        $this->PemasokModel->delete_pemasok($id);
        return redirect()->to('/pemasok/index')->with('danger', 'Data Berhasil Di Hapus!!');
    }
}
    //
