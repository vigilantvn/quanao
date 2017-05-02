<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartsp extends Model
{
    protected $primaryKey = 'ID';
    protected $table="cart";
    public function donhang_sanpham(){
        return $this->belongsTo('App\sanpham','ID_sp','ID_sp');
    }
}
