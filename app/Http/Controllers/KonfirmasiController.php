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
use Input;


class KonfirmasiController extends Controller
{

	public function __construct(pemesanan $pemesanan, pemesanandetail $pemesanandetail, tiketpemesanan $tiketpemesanan, tanggalwisata $tanggalwisata, wisata $wisata, trip $trip, reschedule $reschedule)
  	{  
     	$this->pemesanan= $pemesanan;
      $this->pemesanandetail = $pemesanandetail;
      $this->tiketpemesanan = $tiketpemesanan;
      $this->tanggalwisata = $tanggalwisata;
      $this->wisata = $wisata;
      $this->trip = $trip;
      $this->reschedule = $reschedule;
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
      'pembayaran' => 2
    );

    $result = $this->pemesanan->changeById($request->input('id_pemesanan'), $data);
    return redirect('user/konfirmasi')->with('success','Data upload berhasil disimpan. ');
  }

  public function detail($nomor){
    $data = $this->pemesanan->detail($nomor);
    $pemesanandetail = $this->pemesanandetail->lists($nomor);
    $trip = $this->trip->lists();
    return view('user/konfrimasi_detail', ['data' => $data, 'trip' => $trip, 'pemesanandetail' => $pemesanandetail]);
  }
}
