<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Syarat extends Model
{

    protected $table = 'syarat';

    protected $fillable = [
        'id_syarat',
        'keterangan',
        'id_wisata',
        'status_delete',
        'status_syarat',
        'judul'
    ];

    public function lists()
    {
        $result = DB::table('syarat as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.status_delete' => 0))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('syarat')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('syarat as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.id_syarat' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('syarat')
                  ->where('id_syarat', '=', $id)
                  ->update($data);
        return true;
    }
}
