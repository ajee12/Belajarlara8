<?php

namespace App\Http\Controllers;

use App\Models\PelangganModel;
use DateTime;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class BelajarController extends Controller
{
    protected $PelangganModel;
    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
    }
    public function index()
    {
        return view('belajar.dashboard');
    }
    //

    public function pelanggan()
    {
        $data = ['pelanggan' => $this->PelangganModel->get_all_data()];
        return view('belajar.v_pelanggan', $data);
    }

    public function add()
    {
        return view('belajar.t_pelanggan');
    }

    public function save_pelanggan()
    {
        Request()->validate([
            'kode' => 'required|unique:pelanggan,kode|nullable|numeric|max:10',
            'name' => 'required',
            'alamat' => 'required',
            'telp' => 'required|max:12',
            'namapimpinan' => 'required',
            'namaadmin' => 'required'
        ], [
            'kode.required' => 'Wajib diisi!!',
            'kode.unique' => 'Kode Tidak Boleh Sama',
            'kode.max' => 'Kode Anda Terlalu Panjang',
            'kode.numeric' => 'Kode Hanya Berupa Angka',
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

        $this->PelangganModel->tambah_data($data);
        return redirect()->to('/belajar/pelanggan')->with('sukses', 'Data Behasil Ditambahkan');
    }

    public function edit_data()
    {
        $data = [
            'pelanggan' => $this->pelanggan->get_all_data()
        ];
        return view('belajar.v_pelanggan', $data);
    }

    public function save_edit($id)
    {
        Request()->validate([
            'kode' => 'required|nullable|numeric|max:10',
            'name' => 'required',
            'alamat' => 'required',
            'telp' => 'required|max:12',
            'namapimpinan' => 'required',
            'namaadmin' => 'required'
        ], [
            'kode.required' => 'Wajib diisi!!',
            'kode.max' => 'Kode Anda Terlalu Panjang',
            'kode.numeric' => 'Kode Hanya Berupa Angka',
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

        $this->PelangganModel->edit_data($id, $data);
        return redirect()->to('/belajar/pelanggan')->with('sukses', 'Data Berhasil Diedit');
    }

    public function delete($id)
    {

        $this->PelangganModel->delete_data($id);
        return redirect()->to('/belajar/pelanggan')->with('danger', 'Data Berhasil Di Hapus!!');
    }
}
