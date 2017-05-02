<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;
use App\nhomsanpham;
use App\sanpham;
use Illuminate\Support\Facades\DB;
class homeController extends Controller
{
    //
    function __construct(){
        $loaisanpham=loaisanpham::all();
        $nhomsanpham=nhomsanpham::all();
        view()->share('loaisanpham',$loaisanpham);
        view()->share('nhomsanpham',$nhomsanpham);
    }
    public function trangchu(){
        //$loaisanpham=loaisanpham::all();
        //$nhomsanpham=nhomsanpham::all();
        $sanpham=sanpham::orderBy('ID_sp','DESC')->limit(9)->get();
        //return view('pages.home',['loaisanpham'=>$loaisanpham,'nhomsanpham'=>$nhomsanpham,'sanpham'=>$sanpham]);
        return view('pages.home',['sanpham'=>$sanpham]);
    }
    public function sanpham_details($id_sp){
        $sanpham=sanpham::find($id_sp);
        //DB::enableQueryLog();
        //$spcungnhom=sanpham::where('ID_loaisp',$sanpham->ID_loaisp)->take(3);

        
        $spcungnhom=sanpham::where('ID_loaisp',$sanpham->ID_loaisp)->orderBy('ID_sp','DESC')->take(3)->get();
        //$query=DB::getQueryLog();
        //var_dump($query);

        return view('pages.sanpham_details',['sanpham'=>$sanpham,'spcungnhom'=>$spcungnhom]);
    }
    public function sanpham_theloai($id_loaisp){
        //DB::enableQueryLog();
        $sanpham=sanpham::where('ID_loaisp',$id_loaisp)->paginate(6);
        $loaisanpham=loaisanpham::find($id_loaisp);
        //$query=DB::getQueryLog();
        //var_dump($query);
        return view('pages.sanpham_theoloai',['sanpham'=>$sanpham,'loaisanpham'=>$loaisanpham]);
    }
    public function lienhe(){

        return view('pages.lienhe');
    }

}
