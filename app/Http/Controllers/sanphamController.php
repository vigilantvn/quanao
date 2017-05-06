<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\loaisanpham;
use App\nhomsanpham;
use Illuminate\Support\Facades\DB;

class sanphamController extends Controller
{
    public function getdanhsach(){
        //DB::enableQueryLog();
        $sanpham=sanpham::orderBy('ID_sp','desc')->get();
        //$query=DB::getQueryLog();
        //var_dump($query);
        //$loaisanpham=loaisanpham::all();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
    public function paging_getdanhsach(){
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->simplePaginate(2);
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->paginate(10);
        $loaisanpham=loaisanpham::where('ID_nhomsp','>=','1')->get();
        return view('admin.nhomsanpham.danhsach',['nhomsanpham'=>$loaisanpham]);
    }
    public function getthem(){
        $loaisanpham=loaisanpham::all();
        return view('admin.sanpham.them',['loaisanpham'=>$loaisanpham]);
    }

    public function postthem(Request $a)
    {
        $this->validate($a,
            [
                'txtten'=>'required',
                'loaisp'=>'required',
                //'loaisp'=>'required|not_in:0',
                //'loaisp'=>'required|not_in:----Chon nhom sanpham----',--------set option value=""
                'mota'=>'required',
                'size'=>'required',
                'gia'=>'required',
            ],
            [
                'txtten.required'=>'chua nhap Ten',
                'loaisp.required'=>'chua chon loai san pham',
                'mota.required'=>'chua chon mota san pham',
                'size.required'=>'chua chon size san pham',
                'gia.required'=>'chua chon gia san pham',
            ]);
        $sanpham=new sanpham();
        $sanpham->Ten_sp=$a->txtten;
        $sanpham->Ten_sp_tomtat=changeTitle($a->txtten);
        $sanpham->ID_loaisp=$a->loaisp;
        $sanpham->Mota=$a->mota;
        $sanpham->Kichthuoc=$a->size;
        $sanpham->Gia=$a->gia;
        $sanpham->GiaKM=$a->giakm;
        if($a->hasFile('hinh'))
        {
            $imagename=date('Y-m-d_H_i_s').".".$a->hinh->getClientOriginalExtension();
            $a->hinh->move("sanpham_img", $imagename);
            $sanpham->Hinh=$imagename;

        }
        else{
            $sanpham->Hinh="";
        }
        try{
            $sanpham->save();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }

        return redirect('admin/sanpham/them')->with('thongbao','them thanh cong');

    }
    public function getsua($id){

        try{
            $sanpham=sanpham::find($id);
            $loaisanpham=loaisanpham::all();
            //$loaisanpham=nhomsanpham::all();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }
        return view('admin.sanpham.sua',['loaisanpham'=>$loaisanpham,'sanpham'=>$sanpham]);
    }
    public function postsua($ID_sp,Request $request){
        //DB::enableQueryLog();
        //$loaisanpham=nhomsanpham::where('ID_nhomsp',$ID_nhomsp)->get();
        $sanpham=sanpham::find($ID_sp);
        //$query=DB::getQueryLog();
        //var_dump($query);
        //$loaisanpham=nhomsanpham::find($ID_nhomsp);
        $this->validate($request,
            [
                'txtten'=>'required',
                'loaisp'=>'required',
                //'loaisp'=>'required|not_in:0',
                //'loaisp'=>'required|not_in:----Chon nhom sanpham----',--------set option value=""
                'mota'=>'required',
                'size'=>'required',
                'gia'=>'required',
            ],
            [
                'txtten.required'=>'chua nhap Ten',
                'loaisp.required'=>'chua chon loai san pham',
                'mota.required'=>'chua chon mota san pham',
                'size.required'=>'chua chon size san pham',
                'gia.required'=>'chua chon gia san pham',
            ]);

        //$sanpham=new sanpham();
        $sanpham->Ten_sp=$request->txtten;
        $sanpham->Ten_sp_tomtat=changeTitle($request->txtten);
        $sanpham->ID_loaisp=$request->loaisp;
        $sanpham->Mota=$request->mota;
        $sanpham->Kichthuoc=$request->size;
        $sanpham->Gia=$request->gia;
        $sanpham->GiaKM=$request->giakm;
        if($request->hasFile('hinh'))
        {
            $imagename=date('Y-m-d_H_i_s').".".$request->hinh->getClientOriginalExtension();
            $request->hinh->move("sanpham_img", $imagename);
            $sanpham->Hinh=$imagename;
        }
        else{
            //$sanpham->Hinh="";
        }
        DB::enableQueryLog();
        $sanpham->save();
        $query=DB::getQueryLog();
        var_dump($query);
        return redirect('admin/sanpham/sua/'.$ID_sp)->with('thongbao','sua thanh cong');
    }
    public function getxoa($id){
        $sanpham=sanpham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach/')->with('thongbao','xoa thanh cong');
    }
}
