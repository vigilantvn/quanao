<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    //
    protected $primaryKey = 'ID';
    protected $table="nguoidung";
    public function muahang(){
        return $this->hasMany('App\cart','ID_kh','ID');
    }
}
