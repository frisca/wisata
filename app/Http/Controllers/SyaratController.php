<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Syarat;
use App\Models\Wisata;

class SyaratController extends Controller
{

	public function __construct(Syarat $syarat, Wisata $wisata)
  	{  
     	$this->syarat= $syarat;
        $this->wisata = $wisata;
  	}
    
	public function index()
	{
		$data = $this->syarat->lists();
		return view('syarat/index', ['data' => $data]);
	}

	public function add()
	{
        $wisata = $this->wisata->listWisata();
		return view('syarat/add', ['listWisata' => $wisata]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'id_wisata' => 'required',
            'status_syarat' => 'required'
        ]);

        $data = array(
        	'judul' => $request->input('judul'),
        	'keterangan' => $request->input('keterangan'),
            'id_wisata' => $request->input('id_wisata'),
            'status_syarat' =>  $request->input('status_syarat'),
            'status_delete' => 0
        );

		$result = $this->syarat->store($data);
		return  redirect('syarat')
                ->with('success','Data syarat berhasil disimpan.');
	}

	public function edit($id)
	{
        $wisata = $this->wisata->listWisata();
		$data = $this->syarat->detail($id);
		return view('syarat/edit', ['data' => $data, 'listWisata' => $wisata]);
	}

	public function change(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'id_wisata' => 'required',
            'status_syarat' => 'required'
        ]);

 		$data = array(
            'judul' => $request->input('judul'),
            'keterangan' => $request->input('keterangan'),
            'id_wisata' => $request->input('id_wisata'),
            'status_syarat' =>  $request->input('status_syarat')
        );

        $result = $this->syarat->change($request->input('id_syarat'), $data);
        return redirect('syarat')->with('success','Data syarat berhasil diubah. ');
    }

    public function detail($id)
	{
		$data = $this->syarat->detail($id);
		return view('syarat/detail', ['data' => $data]);
	}

	public function delete($id)
    {
 		$data = array(
        	'status_delete' => 1
        );

        $result = $this->syarat->change($id, $data);
        return redirect('syarat')->with('success','Data syarat berhasil dihapus. ');
    }
}