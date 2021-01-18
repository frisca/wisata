<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Oborolan;
use App\Models\Users;

class ObrolanController extends Controller
{

	public function __construct(Oborolan $obrolan, users $users)
  	{  
         $this->obrolan= $obrolan;
         $this->users = $users;
  	}
    
	public function index()
	{
        $data = [];

        $obrolan = $this->obrolan->lists();
        $users = $this->users->lists();

        foreach($obrolan as $k=>$v) {
            foreach($users as $key=>$val){
                if( ($v->nama_penerima == $val->id && $v->nama_pengirim != $val->id)) {
                    $data['obrolan'] = $v->oborolan;
                    $data['nama_pengirim'] = $v->nama_pengirim;
                    $data['nama_penerima'] = $v->nama_penerima;
                    $data['status'] = $v->status_oborolan;
                    $data['id_obrolan'] = $v->id_oborolan;
                    // var_dump($data);exit();
                }
            }
        }

		return view('obrolan/index', ['data' => $data, 'users' => $users]);
    }
    
    public function detail($id, $id1)
	{
        $data = [];
// ]
        $obrolan = $this->obrolan->lists();
        $users = $this->users->lists();

        foreach($obrolan as $k=>$v) {
            if( ($v->nama_penerima == $id && $v->nama_pengirim == $id1) || ($v->nama_penerima == $id1 && $v->nama_pengirim == $id) ) {
                $data['obrolan'] = $v->oborolan;
                $data['nama_pengirim'] = $v->nama_pengirim;
                $data['nama_penerima'] = $v->nama_penerima;
                $data['status'] = $v->status_oborolan;
                $data['id_obrolan'] = $v->id_oborolan;
            }
        }
        var_dump($data);exit();
		return view('obrolan/detail', ['data' => $data, 'users' => $users, 'id' => $id, 'id1' => $id1]);
    }
    
    public function store(Request $request, $id)
	{
        $data = array(
        	'nama_pengirim' => $request->input('sender'),
        	'nama_penerima' => $request->input('receiver'),
            'oborolan' => $request->input('msg'),
            'status_oborolan' => 0,
            'tgl_oboralan' => date('Y-m-d')
        );

		$result = $this->obrolan->store($data);
		return  redirect('obrolan/detail/' . $id);
                // ->with('success','Data lokasi berhasil disimpan.');÷
	}
}