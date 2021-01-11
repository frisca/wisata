<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Refund extends Model
{

    protected $table = 'refund';

    protected $fillable = [
        'id_refund',
        'nomor_pemesanan',
        'total_sebelum',
        'status_delete',
        'total_refund',
        'dari_tgl_wisata',
        'sampai_tgl_wisata',
        'nama_wisata',
        'lokasi',
        'trip',
        'waktu',
        'nama_pelanggan',
        'id_pelanggan',
        'status_approve'
    ];

    public function lists()
    {
        $result = DB::table('refund')
                  ->get();
        return $result;
    }

    public function detail($nomor)
    {
        $result = DB::table('refund')
                  ->where(array('nomor_pemesanan' => $nomor))
                  ->get();
        return $result;
    }

    public function detailById($id)
    {
        $result = DB::table('refund')
                  ->where(array('id_refund' => $id))
                  ->get();
        return $result;
    }

    public function refundByIdPelanggan($id)
    {
        $result = DB::table('refund')
                  ->where(array('id_pelanggan' => $id))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('refund')
                  ->insert($data);
        return true;
    }
}
