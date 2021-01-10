<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lokasi extends Model
{

    protected $table = 'lokasi';

    protected $fillable = [
        'id_lokasi',
        'lokasi',
        'status_lokasi',
        'status_delete'
    ];

    public function lists()
    {
        $result = DB::table('lokasi')
                  ->where('status_delete', 0)
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('lokasi')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('lokasi')
                  ->where(array('id_lokasi' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('lokasi')
                  ->where('id_lokasi', '=', $id)
                  ->update($data);
        return true;
    }

    public function lokasi()
    {
        $result = DB::table('lokasi')
                  ->where(array('status_delete' => 0, 'status_lokasi' => 1))
                  ->get();
        return $result;
    }


    public function lokasiAktif()
    {
        $result = DB::table('lokasi')
                  ->where(array('status_lokasi' => 1))
                  ->get();
        return $result;
    }
}
