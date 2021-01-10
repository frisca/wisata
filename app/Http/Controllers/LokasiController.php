<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;

class LokasiController extends Controller
{

	public function __construct(Lokasi $lokasi)
  	{  
     	$this->lokasi= $lokasi;
  	}
    
	public function index()
	{
		$data = $this->lokasi->lists();
		return view('lokasi/index', ['data' => $data]);
	}

	public function add()
	{
		return view('lokasi/add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'lokasi' => 'required',
            'status_lokasi' => 'required'
        ]);

        $data = array(
        	'lokasi' => $request->input('lokasi'),
        	'status_lokasi' => $request->input('status_lokasi'),
            'status_delete' => 0
        );

		$result = $this->lokasi->store($data);
		return  redirect('lokasi')
                ->with('success','Data lokasi berhasil disimpan.');
	}

	public function edit($id)
	{
		$data = $this->lokasi->detail($id);
		return view('lokasi/edit', ['data' => $data]);
	}

	public function change(Request $request)
    {
        $this->validate($request, [
        	'id_lokasi' => 'required',
            'lokasi' => 'required',
            'status_lokasi' => 'required'
        ]);
 		
 		$data = array(
        	'lokasi' => $request->input('lokasi'),
        	'status_lokasi' => $request->input('status_lokasi')
        );

        $result = $this->lokasi->change($request->input('id_lokasi'), $data);
        return redirect('lokasi')->with('success','Data lokasi berhasil diubah. ');
    }

    public function detail($id)
	{
		$data = $this->lokasi->detail($id);
		return view('lokasi/detail', ['data' => $data]);
	}

	public function delete($id)
    {
 		$data = array(
        	'status_delete' => 1
        );

        $result = $this->lokasi->change($id, $data);
        return redirect('lokasi')->with('success','Data lokasi berhasil dihapus. ');
    }
}