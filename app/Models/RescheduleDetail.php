<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RescheduleDetail extends Model
{

    protected $table = 'reschedule_detail';

    protected $fillable = [
        'id_reschedule',
        'id_reschedule_detail',
        'nama_wisata',
        'status_delete',
        'lokasi',
        'trip',
        'waktu'
    ];

    public function lists($id_reschedule)
    {
        $result = DB::table('reschedule_detail')
                  ->where(array('id_reschedule' => $id_reschedule))
                  ->get();
        return $result;
    }
}
