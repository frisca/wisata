<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\TiketPemesanan;
use App\Models\TanggalWisata;
use App\Models\Wisata;
use App\Models\Trip;
use App\Models\Reschedule;
use App\Models\DataPemesan;
use App\Models\Refund;
use Input;


class KonfirmasiController extends Controller
{

  public function __construct(pemesanan $pemesanan, pemesanandetail $pemesanandetail, tiketpemesanan $tiketpemesanan, 
  tanggalwisata $tanggalwisata, wisata $wisata, trip $trip, reschedule $reschedule, datapemesan $datapemesan,
  refund $refund)
  	{  
     	$this->pemesanan= $pemesanan;
      $this->pemesanandetail = $pemesanandetail;
      $this->tiketpemesanan = $tiketpemesanan;
      $this->tanggalwisata = $tanggalwisata;
      $this->wisata = $wisata;
      $this->trip = $trip;
      $this->reschedule = $reschedule;
      $this->datapemesan = $datapemesan;
      $this->refund = $refund;
  	}
    
	public function index()
	{
		$data = $this->pemesanan->pemesananById(auth()->user()->id);
    $trip = $this->trip->lists();
    $reschedule = $this->reschedule->lists();
		return view('konfirmasi/index', ['data' => $data, 'trip' => $trip, 'reschedule' => $reschedule]);
	}

  public function uploadGambar(Request $request) {
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);
    
    $data = array(
      'bukti_pembayaran' => $imageName,
      'status_pemesanan' => 1
    );

    $result = $this->pemesanan->changeById($request->input('id_pemesanan'), $data);
    return redirect('user/konfirmasi')->with('success','Data upload berhasil disimpan. ');
  }

  public function uploadLunasGambar(Request $request) {
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);
    
    $data = array(
      'bukti_pembayaran' => $imageName,
      'status_pemesanan' => 2,
      'pembayaran' => 2,
      'status_approve' => 0
    );

    $result = $this->pemesanan->changeById($request->input('id_pemesanan'), $data);

    $data = $this->pemesanan->detail($request->input('id_pemesanan'));
		foreach($data as $k=>$vl){
      $nomor = $vl->nomor_pemesanan;
      $tgl = $vl->tgl_pemesanan;
    }

    $datapemesan = $this->datapemesan->detail($nomor);
    foreach($datapemesan as $k=>$vp){
      $nama = $vp->nama_pemesan;
    }

    $d_pemesanan = $this->pemesanandetail->lists($nomor);
		foreach ($d_pemesanan as $key_pemesanan => $value_pemesanan) {
			$waktu = $value_pemesanan->waktu;
			$lokasi = $value_pemesanan->lokasi;
			$trip = $value_pemesanan->trip;
			$nama_wisata = $value_pemesanan->nama_wisata;
		}

		$tanggalwisata = $this->tanggalwisata->tanggalWisataByPemesanan($nomor);
		foreach ($tanggalwisata as $k => $v) {
			$from = $v->dari_tanggal;
			$to  = $v->sampai_tanggal;
		}

		$pemesanan = $this->pemesanan->detail($request->input('id_pemesanan'));
		
		foreach ($pemesanan as $key => $value) {
			$datas = array(
				'total_sebelum' => $value->total,
				'total_refund' => $value->total * 0.25,
				'nomor_pemesanan' => $value->nomor_pemesanan,
				'nama_pelanggan' => $nama,
				'id_pelanggan' => auth()->user()->id,
				'waktu' => $waktu,
				'lokasi' => $lokasi,
				'trip' => $trip,
				'nama_wisata' => $nama_wisata,
				'tgl_refund' => date('Y-m-d'),
				'dari_tgl_wisata' => $from,
				'sampai_tgl_wisata' => $to,
        'status_approve' => 0,
        'tgl_pemesan' => $tgl,
        'status_refund' => 0
      );
      
      $data_reschedule = array(
        'nomor_pemesanan' => $nomor,
        'total_sebelum' => $value->total,
        'id_pelanggan' => auth()->user()->id,
        'nama_pelanggan' => $nama,
        'total_reschedule' => $value->total,
        'from_tgl_wisata' => $from,
        'to_tgl_wisata' => $to,
        'nama_wisata' => $nama_wisata,
        'lokasi' => $lokasi,
        'status_delete' => 0,
        'status_approve' => 0,
        'status_reschedule' => 0
      );
      
      $res = $this->refund->store($datas);
      $res1 = $this->reschedule->store($data_reschedule);
		}
    
    return redirect('user/konfirmasi')->with('success','Data upload berhasil disimpan. ');
  }

  public function detail($id){
    // $data = $this->pemesanan->detail($nomor);
    // $pemesanandetail = $this->pemesanandetail->lists($nomor);
    $pemesanandetail = array();
    $data = $this->pemesanan->detail($id);
		foreach($data as $k=>$v){
      $datapemesan = $this->datapemesan->detail($v->nomor_pemesanan);
      $pemesanandetail = $this->pemesanandetail->lists($v->nomor_pemesanan);
    }
    // var_dump($data);exit();
    $trip = $this->trip->lists();
    return view('user/konfrimasi_detail', ['data' => $data, 'trip' => $trip, 'pemesanandetail' => $pemesanandetail,
    'datapemesan' => $datapemesan]);
  }
}
