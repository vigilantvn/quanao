<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\login;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function getdanhsach(){
        //DB::enableQueryLog();
        $login=login::all();
        //$query=DB::getQueryLog();
        //var_dump($query);
        //$loaisanpham=loaisanpham::all();
        return view('admin.login.danhsach',['login'=>$login]);
    }

    public function getthem(){
        $login=login::all();
        return view('admin/login/them',['login'=>$login]);
    }

    public function postthem(Request $a)
    {
        $this->validate($a,
            [
                'txtten'=>'required',
                'email'=>'required|unique:tblusers,email',
                //'loaisp'=>'required|not_in:0',
                //'loaisp'=>'required|not_in:----Chon nhom sanpham----',--------set option value=""
                'pass'=>'required',

            ],
            [
                'txtten.required'=>'chua nhap Ten',
                'email.required'=>'chua chon loai san pham',
                'mota.required'=>'chua chon mota san pham',
                'pass.required'=>'chua chon size san pham',
                'email.unique'=>'email ko duoc trung',
            ]);
        $login=new login();
        $login->name=$a->txtten;
        $login->email=$a->email;
        $login->password=bcrypt($a->pass);
        $login->quyen=$a->quyen;

        try{
            $login->save();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }

        return redirect('admin.login.them')->with('thongbao','them thanh cong');

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
        return redirect('sanpham/sua/'.$ID_sp)->with('thongbao','sua thanh cong');
    }
    public function getxoa($id){
        $sanpham=sanpham::find($id);
        $sanpham->delete();
        return redirect('sanpham/danhsach/')->with('thongbao','xoa thanh cong');
    }
    public function loginadmin(){
        return view('admin.login');
    }
    public function postloginadmin(Request $a){
        if(Auth::attempt(['email'=>$a->username,'password'=>$a->psw]))

        {
        
            return redirect('admin/login/danhsach');
        }
        else{
          
            return redirect('admin/login')->with('thongbao','dang nhap khong thanh cong');
          
        }

    }
    public function logoutadmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
