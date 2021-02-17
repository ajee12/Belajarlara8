<?php

namespace App\Http\Controllers;

use App\Models\PemasokModel;
use App\Models\BeliModel;
use App\Models\SatuanModel;
use Exception;
use App\Models\PrintModel;
use Illuminate\Support\Facades\DB;

class BeliController extends Controller
{
    protected $PemasokModel;
    protected $BeliModel;
    protected $SatuanModel;
    protected $PrintModel;
    public function __construct()
    {
        $this->PemasokModel = new PemasokModel();
        $this->BeliModel = new BeliModel();
        $this->SatuanModel = new SatuanModel();
        $this->PrintModel = new PrintModel();
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
            'subtotal' => request()->hrgbeli * request()->qty,
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


    public function e_beli($nobukti)
    {
        $data = [
            'pengguna' => $this->BeliModel->detailBeli($nobukti),
            'satuan' => $this->SatuanModel->getData(),
            'pemasok' => $this->PemasokModel->getdata(),

        ];

        return view('beli/e_beli', $data);
    }
    public function edit_save($nobukti)
    {
        $data = [
            'nobukti' => $nobukti,
            'tgl' => date('Y-m-d'),
            'id_pemasok' => request()->id_pemasok,
            'keterangan' => request()->keterangan,


        ];
        $data2 = [
            'nobukti' => $nobukti,
            'id_stok' => request()->id_stok,
            'qty' => request()->qty,
            'hrgbeli' => request()->hrgbeli,
            'subtotal' => request()->hrgbeli * request()->qty,
        ];
        $this->BeliModel->editBeli($data);
        $this->BeliModel->editdetail($data2);
        return redirect()->to('/beli/index')->with('sukses', 'Data Beli Berhasil Di Edit');
    }

    public function  delete($nobukti)
    {

        $this->BeliModel->detaildelete($nobukti);
        $this->BeliModel->deleteBeli($nobukti);
        return redirect()->to('/beli/index')->with('danger', 'Data Beli Berhasil Di Delete');
    }

    public function print($nobukti)
    {
        $data = [
            'print' => $this->PrintModel->getprint($nobukti)
        ];
        return view('print/v_print', $data);
    }
    //
    //
}
