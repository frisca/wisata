<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Oborolan extends Model
{

    protected $table = 'oborolan';

    protected $fillable = [
        'id_oborolan',
        'nama_pengirim',
        'nama_penerima',
        'oborolan',
        'status_oborolan',
        'tgl_oborolan'
    ];

    public function lists($nama)
    {
        // $result = DB::select("select * from oborolan where (nama_penerima = '?' and nama_pengirim not like '?') and (status_oborolan = 0 or status_oborolan =1) group by nama_pengirim", [$nama, $nama]);
        $result = DB::table('oborolan')
                    // ->where('nama_penerima', '=', $nama)
                    // ->where('nama_pengirim', 'not like', $nama)
                    // ->where('status_oborolan', '=', 0)
                    // ->Orwhere('status_oborolan', '=', 1)
                    ->where(function ($query) use ($nama) {
                        $query->where('nama_penerima', '=', $nama)
                              ->where('nama_pengirim', 'not like', $nama);
                    })->where(function ($query){
                        $query->where('status_oborolan', '=', 0)
                              ->orWhere('status_oborolan', '=', 1);
                    })
                    ->get();
        return $result;
    }

    public function detail($id)
    {
        $result = DB::table('oborolan')
                  ->where(array('id_oborolan' => $id))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('oborolan')
                  ->insert($data);
        return true;
    }

    public function updatepesan($id, $data)
    {   
        $result = DB::table('oborolan')
                  ->where('nama_pengirim', '=', $id)
                  ->update($data);
    }

    function getReceiver($id, $receiver)
    {
        // $query = "select * from tbl_chat where (sender = ".$id." OR sender = ".$receiver.") AND (receiver = ".$receiver." OR receiver = ".$id.") order by id desc limit 3 ";
        // $tamp = $this->db->query($query);
        // return $tamp->result();
        // var_dump($receiver);exit();
        $result = DB::table('oborolan')
                //   ->where('nama_pengirim', '=', $id)
                //   ->Orwhere('nama_pengirim', '=', $receiver)
                //   ->where('nama_penerima', '=', $receiver)
                //   ->Orwhere('nama_penerima', '=', $id)
                //   ->orderBy('id_oborolan', 'desc')
                //   ->limit(3)
                //   ->groupBy('nama_pengirim')
                //   ->get();
                ->where(function ($query) use ($id,$receiver) {
                    $query->where('nama_pengirim', '=', $id)
                          ->orWhere('nama_pengirim', '=', $receiver);
                })->where(function ($query) use ($id,$receiver) {
                    $query->where('nama_penerima', '=', $receiver)
                          ->orWhere('nama_penerima', '=', $id);
                })
                ->orderBy('id_oborolan', 'desc')
                ->limit(3)
                ->get();
                //   var_dump($result);exit();
        return $result;
    }
}
