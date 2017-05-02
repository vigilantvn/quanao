<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    //
    protected $primaryKey = 'ID_loaisp';
    protected $table="loaisanpham";
    public $timestamps = false;
    public  function to_nhomsanpham(){
        return $this->belongsTo('App\nhomsanpham','ID_nhomsp','ID_nhomsp');
    }
}
