<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPemesan extends Model
{

    protected $table = 'fasilitas';

    protected $fillable = [
        'id_data_pemesan',
        'nama_pemesan',
        'alamat',
        'email',
        'nomor_pemesanan',
        'hp'
    ];

    public function store($data)
    {
        $result = DB::table('data_pemesan')
                  ->insert($data);
        return true;
    }

    public function detail($nomor)
    {
        $result = DB::table('data_pemesan')
                  ->where(array('nomor_pemesanan' => $nomor))
                  ->get();
        return $result;
    }
}
