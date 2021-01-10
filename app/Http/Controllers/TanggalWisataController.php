<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TanggalWisata;
use App\Models\Wisata;

class TanggalWisataController extends Controller
{

	public function __construct(TanggalWisata $tglWisata, Wisata $wisata)
  	{  
     	$this->tglWisata= $tglWisata;
        $this->wisata = $wisata;
  	}
    
	public function index()
	{
		$data = $this->tglWisata->lists();
		return view('tanggal-wisata/index', ['data' => $data]);
	}

	public function add()
	{
        $wisata = $this->wisata->listWisata();
		return view('tanggal-wisata/add', ['listWisata' => $wisata]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required'
        ]);

        $data = array(
        	'dari_tanggal' => $request->input('dari_tanggal'),
        	'sampai_tanggal' => $request->input('sampai_tanggal'),
            'id_wisata' => $request->input('id_wisata'),
            'status_delete' => 0
        );

		$result = $this->tglWisata->store($data);
		return  redirect('tanggal/wisata')
                ->with('success','Data tanggal wisata berhasil disimpan.');
	}

	public function edit($id)
	{
        $wisata = $this->wisata->listWisata();
		$data = $this->tglWisata->detail($id);
		return view('tanggal-wisata/edit', ['data' => $data, 'listWisata' => $wisata]);
	}

	public function change(Request $request)
    {
        $this->validate($request, [
        	'id_tanggal' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'id_wisata' => 'required'
        ]);
 		
 		$data = array(
        	'dari_tanggal' => $request->input('dari_tanggal'),
            'sampai_tanggal' => $request->input('sampai_tanggal'),
            'id_wisata' => $request->input('id_wisata')
        );

        $result = $this->tglWisata->change($request->input('id_tanggal'), $data);
        return redirect('tanggal/wisata')->with('success','Data tanggal wisata berhasil diubah. ');
    }

    public function detail($id)
	{
		$data = $this->tglWisata->detail($id);
		return view('tanggal-wisata/detail', ['data' => $data]);
	}

	public function delete($id)
    {
 		$data = array(
        	'status_delete' => 1
        );

        $result = $this->tglWisata->change($id, $data);
        return redirect('tanggal/wisata')->with('success','Data tanggal wisata berhasil dihapus. ');
    }
}