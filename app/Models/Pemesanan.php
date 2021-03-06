<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemesanan extends Model
{

    protected $table = 'pemesanan';

    protected $fillable = [
        'id_pemesanan',
        'nomor_pemesanan',
        'status_pemesanan',
        'status_delete',
        'tgl_pemesanan',
        'total',
        'pembayaran',
        'bukti_pembayaran',
        'tgl_wisata',
        'id_pelanggan',
        'status_approve'
    ];

    public function lists()
    {
        $result = DB::table('pemesanan')
                //   ->join('reschedule', 'pemesanan.nomor_pemesanan', '=', 'reschedule.nomor_pemesanan')
                  ->where('status_delete', 0)
                  ->get();
        return $result;
    }

    public function detail($id_pemesanan)
    {
        $result = DB::table('pemesanan as p')
                  ->select('p.*')
                //   ->rightJoin('data_pemesan as d', 'd.nomor_pemesanan', '=', 'p.nomor_pemesanan')
                  ->where('p.id_pemesanan', '=', $id_pemesanan)
                  ->limit(1)
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('pemesanan')
                  ->insert($data);
        return true;
    }

    public function pemesananByDesc()
    {
        $result = DB::table('pemesanan')
                  ->where('status_delete', 0)
                  ->orderBy('nomor_pemesanan', 'desc')
                  ->limit(1)
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('pemesanan')
                  ->where('nomor_pemesanan', '=', $id)
                  ->update($data);
        return true;
    }

    public function pemesananById($id)
    {
        $result = DB::table('pemesanan as p')
                  ->select('p.*', 'pd.id_wisata', 'pd.nama_wisata')
                  ->leftJoin('pemesanan_detail as pd', 'pd.nomor_pemesanan', '=', 'p.nomor_pemesanan')
                  ->where('p.id_pelanggan', $id)
                  ->orderBy('p.nomor_pemesanan', 'asc')
                  ->get();
        return $result;
    }

    public function changeById($id, $data)
    {
        $result = DB::table('pemesanan')
                  ->where('id_pemesanan', '=', $id)
                  ->update($data);
        return true;
    }

    public function pemesananByIdLimit($id)
    {
        $result = DB::table('pemesanan')
                  ->where(array('id_pelanggan' => $id, 'pembayaran' => 1))
                  ->limit(1)
                  ->get();
        return $result;
    }
}
