<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'active'
    ];

    public function detail($id)
    {
        $result = DB::table('users')
                  ->where(array('id' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('users')
              ->where('id', '=', $id)
              ->update($data);
        return true;
    }
}
