<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    //
    protected $primaryKey = 'ID_sp';
    protected $table="sanpham";
    public  function to_loaisanpham(){
        return $this->belongsTo('App\loaisanpham','ID_loaisp','ID_loaisp');
    }
  
}
