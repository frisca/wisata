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

    public function lists()
    {
        $result = DB::table('oborolan')
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
}
