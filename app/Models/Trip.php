<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trip extends Model
{
  protected $table = 'trip';

  protected $fillable = [
    'id_trip',
    'trip',
    'status_trip',
    'status_delete'
  ];

  public function lists()
  {
    $result = DB::table('trip')
              ->where('status_delete', 0)
              ->get();
    return $result;
  }

  public function store($data)
  {
    $result = DB::table('trip')
              ->insert($data);
    return true;
  }

  public function detail($id)
  {
    $result = DB::table('trip')
              ->where(array('id_trip' => $id))
              ->get();
    return $result;
  }

  public function change($id, $data)
  {
    $result = DB::table('trip')
              ->where('id_trip', '=', $id)
              ->update($data);
    return true;
  }

  public function trips()
  {
    $result = DB::table('trip')
              ->where(array('status_delete' => 0, 'status_trip' => 1))
              ->get();
    return $result;
  }

  public function tripsAktif()
  {
    $result = DB::table('trip')
              ->where(array('status_trip' => 1))
              ->get();
    return $result;
  }
}
