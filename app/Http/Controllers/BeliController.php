<?php

namespace App\Http\Controllers;

use App\Models\PemasokModel;
use App\Models\BeliModel;
use App\Models\SatuanModel;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    protected $PemasokModel;
    protected $BeliModel;
    protected $SatuanModel;
    public function __construct()
    {
        $this->PemasokModel = new PemasokModel();
        $this->BeliModel = new BeliModel();
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {
        $data = [
            'detail_barang' => $this->BeliModel->detail_Beli(),
            'beli' => $this->BeliModel->dataBeli(),
            'pemasok' => $this->PemasokModel->getdata(),
            'satuan' => $this->SatuanModel->getData()

        ];

        return view('beli/v_beli', $data);
    }

    public function t_beli()
    {
        $iduser = '001';
        $str_time = date('yMD');
        $nobuk = "BL" . "$iduser" . "$str_time";
        $data = [
            'nobukti' => $nobuk
        ];
        return view('beli/v_beli', $data);
    }

    public function save_beli()
    {

        //$id_beli = '001';
        //$str_time = date('ymdHis');
        //$nobuk = "BL" . "$id_beli" . "$str_time";

        $data = [
            'nobukti' => request()->nobukti,
            'tgl' => date('Y-m-d'),
            'id_pemasok' => request()->id_pemasok,
            'keterangan' => request()->keterangan,


        ];

        $data2 = [
            'id_stok' => request(null)->id_stok,
            'qty' => request()->qty,
            'hrgbeli' => request()->hrgbeli,
            'subtotal' => request(null)->subtotal,
            'nobukti' => request(null)->nobukti,
            'ket' => request(null)->ket,
        ];

        $this->BeliModel->addBeli($data); //$nobuk);
        $this->BeliModel->adddetailbeli($data2);
        return redirect()->to('/beli/index')->with('sukses', 'Data Beli Berhasil Di Tambahkan');
    }


    public function e_beli()
    {
        return view('beli/v_beli');
    }
    public function edit_save($id_beli)
    {
        $data = [
            'id_beli' => $id_beli,
            'nobukti' => request()->nobukti,
            'tgl' => date('Y-m-d'),
            'id_pemasok' => request()->id_pemasok,
            'keterangan' => request()->keterangan
        ];
        $this->BeliModel->editBeli($data);
        return redirect()->to('/beli/index')->with('sukses', 'Data Beli Berhasil Di Edit');
    }

    public function  delete($id_detail)
    {

        $this->BeliModel->detaildelete($id_detail);
        return redirect()->to('/beli/index')->with('danger', ' Data Beli Berhasil Di Delete');
    }
    //
}
