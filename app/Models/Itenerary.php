<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Itenerary extends Model
{

    protected $table = 'itenerary';

    protected $fillable = [
        'id_itenerary',
        'keterangan',
        'id_wisata',
        'status_delete',
        'status_itenerary',
        'hari',
        'tujuan'
    ];

    public function lists()
    {
        $result = DB::table('itenerary as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.status_delete' => 0))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('itenerary')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('itenerary as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.id_itenerary' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('itenerary')
                  ->where('id_itenerary', '=', $id)
                  ->update($data);
        return true;
    }

    public function iteneraryByWisata($id)
    {
        $result = DB::table('itenerary as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.id_wisata' => $id))
                  ->get();
        return $result;
    }
}
