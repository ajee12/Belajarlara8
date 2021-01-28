<?php

namespace App\Http\Controllers;

use App\Models\PemasokModel;
use App\Models\BeliModel;
use App\Models\SatuanModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $totalsemua = DB::raw('SUM(addetailbel.qty*adddetailbel.hrgbeli) as totalsemua');

        $data = [
            'detail_barang' => $this->BeliModel->detail_Beli(),
            'beli' => $this->BeliModel->dataBeli(),
            'pemasok' => $this->PemasokModel->getdata(),
            'satuan' => $this->SatuanModel->getData(),

        ];



        return view('beli/v_beli', $data);
    }
    //ini belum jalan
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




        $data = [
            'nobukti' => request()->nobukti,
            'tgl' => date('Y-m-d'),
            'id_pemasok' => request()->id_pemasok,
            'keterangan' => request()->keterangan,


        ];


        $data2 = [
            'id_stok' => request()->id_stok,
            'qty' => request()->qty,
            'hrgbeli' => request()->hrgbeli,
            'subtotal' => request()->subtotal,
            'nobukti' => request()->nobukti,
            'ket' => request()->ket,

        ];

        DB::beginTransaction();
        try {
            DB::commit();
            $this->BeliModel->addBeli($data); //$nobuk);
            $this->BeliModel->adddetailbeli($data2);
            return redirect()->to('/beli/index')->with('sukses', 'Data Beli Berhasil Di Tambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->to('/beli/index')->with('danger', 'Data tidak Berhasil Di simpan');
        }
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
