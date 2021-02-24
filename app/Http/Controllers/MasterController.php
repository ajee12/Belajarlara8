<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\BeliModel;
use App\Models\PrintModel;
use Illuminate\Support\Facades\DB;
use App\Models\SatuanModel;
use App\Models\PemasokModel;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    protected $BeliModel;
    protected $PrintModel;
    protected $SatuanModel;
    protected $PemasokModel;
    public function __construct()
    {
        $this->BeliModel = new BeliModel();
        $this->PrintModel = new PrintModel();
        $this->SatuanModel = new SatuanModel();
        $this->PemasokModel = new PemasokModel();
    }

    public function index()
    {
        $data = [
            'master' => $this->BeliModel->dataBeli(),
            'beli' => $this->BeliModel->beli(),
            'belid' => $this->BeliModel->detail_Beli(),
            'detail_barang' => $this->BeliModel->detail_Beli()
        ];
        return view('master/m_penjualan', $data);
    }

    public function print($nobukti)
    {
        $data = [
            'print' => $this->PrintModel->getprint($nobukti),
            'pengguna' => $this->BeliModel->detailBeli($nobukti),
            'detail_barang' => $this->BeliModel->detail_Beli()

        ];
        return view('print/v_print', $data);
    }

    public function e_penjualan($nobukti)
    {
        $data = [
            'pengguna' => $this->BeliModel->detailBeli($nobukti),
            'satuan' => $this->SatuanModel->getData(),
            'pemasok' => $this->PemasokModel->getdata(),
            'detail_barang' => $this->BeliModel->detail_Beli()

        ];

        return view('master/e_penjualan', $data);
    }
    public function edit_save($nobukti)
    {
        $data = [
            'id_stok' => request()->id_stok,
            'qty' => request()->qty,
            'hrgbeli' => request()->hrgbeli,
            'subtotal' => request()->hrgbeli * request()->qty,
            'nobukti' => $nobukti,
            'ket' => request()->ket,

        ];

        DB::beginTransaction();
        try {
            DB::commit();
            $this->BeliModel->adddetailbeli($data);
            return redirect()->to('/master/e_penjualan/' . $nobukti)->with('sukses', 'Data Beli Berhasil Di Tambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->to('/master/index')->with('danger', 'Data tidak Berhasil Di simpan');
        }
    }


    public function delete($id_detail)
    {
        $data = [
            'id_detail' => $id_detail,


        ];
        $this->BeliModel->detaildelete($data);
        return redirect()->to('/master/index')->with('danger', 'Data Beli Berhasil Di Delete');
    }
    //
}
