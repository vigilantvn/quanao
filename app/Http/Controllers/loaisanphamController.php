<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\loaisanpham;
use App\nhomsanpham;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\DB;
class loaisanphamController extends Controller
{
    public function getdanhsach(){
        $loaisanpham=loaisanpham::orderBy('ID_loaisp','desc')->get();
        //$loaisanpham=loaisanpham::all();
        return view('admin.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham]);
    }
    public function paging_getdanhsach(){
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->simplePaginate(2);
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->paginate(10);
        $loaisanpham=loaisanpham::where('ID_nhomsp','>=','1')->get();
        return view('admin.nhomsanpham.danhsach',['nhomsanpham'=>$loaisanpham]);
    }
    public function getthem(){
        $nhomsanpham=nhomsanpham::all();
        return view('admin.loaisanpham.them',['nhomsanpham'=>$nhomsanpham]);
    }

    public function postthem(Request $a)
    {
        $this->validate($a,
            [
                'txtten'=>'required|unique:loaisanpham,Ten_loaisp',
                'nhomsp'=>'required'
            ],
            [
                'txtten.required'=>'chua nhap Ten',
                'nhomsp.required'=>'chua chon loai san pham',
                'txtten.unique'=>'Ten loai san pham da ton tai',
            ]);
        $loaisanpham=new loaisanpham();
        $loaisanpham->Ten_loaisp=$a->txtten;
        $loaisanpham->Ten_loaisp_tomtat=changeTitle($a->txtten);
        $loaisanpham->ID_nhomsp=$a->nhomsp;
        try{
            $loaisanpham->save();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }

        return redirect('admin/loaisanpham/them')->with('thongbao','them thanh cong');

    }
    public function getsua($id){
        try{
            $loaisanpham=loaisanpham::find($id);
            $nhomsanpham=nhomsanpham::all();
            //$loaisanpham=nhomsanpham::all();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }
        return view('admin.loaisanpham.sua',['loaisanpham'=>$loaisanpham,'nhomsanpham'=>$nhomsanpham]);
    }
    public function postsua($ID_loaisp,Request $request){
        //DB::enableQueryLog();
        //$loaisanpham=nhomsanpham::where('ID_nhomsp',$ID_nhomsp)->get();
        $loaisanpham=loaisanpham::find($ID_loaisp);
        //$query=DB::getQueryLog();
        //var_dump($query);
        //$loaisanpham=nhomsanpham::find($ID_nhomsp);

        $this->validate($request,
           [
                'txtten'=>'required|unique:loaisanpham,Ten_loaisp',
                'nhomsp'=>'required'
            ],
            [
                'txtten.required'=>'chua nhap Ten',
                'nhomsp.required'=>'chua chon nhom san pham',
                'txtten.unique'=>'Ten loai san pham da ton tai',
            ]);

        $loaisanpham->Ten_loaisp=$request->txtten;
        $loaisanpham->Ten_loaisp_tomtat=changeTitle($request->txtten);
        $loaisanpham->ID_nhomsp=$request->nhomsp;
        //DB::enableQueryLog();
        $loaisanpham->save();
        //$query=DB::getQueryLog();
        //var_dump($query);

        return redirect('admin/loaisanpham/sua/'.$ID_loaisp)->with('thongbao','sua thanh cong');
    }
    public function getxoa($id){
        $loaisanpham=loaisanpham::find($id);
        $loaisanpham->delete();
        return redirect('admin/loaisanpham/danhsach/')->with('thongbao','xoa thanh cong');
    }
}
