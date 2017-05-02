<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomsanpham extends Model
{
    //
    protected $primaryKey = 'ID_nhomsp';
    protected $table="nhomsanpham";

    public  function to_loaisanpham(){
        return $this->hasMany('App\loaisanpham','ID_nhomsp','ID_nhomsp');
    }
    /*
    public  function nhomsanpham(){
        return $this->hasMany('App\loaisanpham','ID_nhomsp','ID_nhomsp');
    }
    */
    //lien ket bang trung gian
    public function sanpham()
    {
        return $this->hasManyThrough('App\sanpham','App\loaisanpham','ID_nhomsp','ID_sp','ID_loaisp');
    }

}
?>
