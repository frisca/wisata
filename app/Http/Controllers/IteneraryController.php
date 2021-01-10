<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Itenerary;
use App\Models\Wisata;

class IteneraryController extends Controller
{

	public function __construct(Itenerary $itenerary, Wisata $wisata)
  	{  
     	$this->itenerary= $itenerary;
        $this->wisata = $wisata;
  	}
    
	public function index()
	{
		$data = $this->itenerary->lists();
		return view('itenerary/index', ['data' => $data]);
	}

    public function add()
    {
        $wisata = $this->wisata->listWisata();
        return view('itenerary/add', ['listWisata' => $wisata]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hari' => 'required',
            'keterangan' => 'required',
            'id_wisata' => 'required',
            'status_itenerary' => 'required',
            'tujuan' => 'required'
        ]);

        $data = array(
            'hari' => $request->input('hari'),
            'keterangan' => $request->input('keterangan'),
            'id_wisata' => $request->input('id_wisata'),
            'status_itenerary' =>  $request->input('status_itenerary'),
            'status_delete' => 0,
            'tujuan' => $request->input('tujuan')
        );
        // var_dump($data);exit();
        $result = $this->itenerary->store($data);
        return  redirect('itenerary')
                ->with('success','Data itenerary berhasil disimpan.');
    }

    public function edit($id)
    {
        $wisata = $this->wisata->listWisata();
        $data = $this->itenerary->detail($id);
        return view('itenerary/edit', ['data' => $data, 'listWisata' => $wisata]);
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'hari' => 'required',
            'keterangan' => 'required',
            'id_wisata' => 'required',
            'status_itenerary' => 'required',
            'tujuan' => 'required'
        ]);

        $data = array(
            'hari' => $request->input('hari'),
            'keterangan' => $request->input('keterangan'),
            'id_wisata' => $request->input('id_wisata'),
            'status_itenerary' =>  $request->input('status_itenerary'),
            'status_delete' => 0,
            'tujuan' => $request->input('tujuan')
        );

        $result = $this->itenerary->change($request->input('id_itenerary'), $data);
        return redirect('itenerary')->with('success','Data itenerary berhasil diubah. ');
    }

    public function detail($id)
    {
        $data = $this->itenerary->detail($id);
        return view('itenerary/detail', ['data' => $data]);
    }

    public function delete($id)
    {
        $data = array(
            'status_delete' => 1
        );

        $result = $this->itenerary->change($id, $data);
        return redirect('itenerary')->with('success','Data itenerary berhasil dihapus. ');
    }
}