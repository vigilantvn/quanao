<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoidung;
use App\loaisanpham;
use App\nhomsanpham;
use App\sanpham;
use App\Http\listcart;
use \Cart;
use App\cartsp;
use Illuminate\Support\Facades\DB;
class nguoidungController extends Controller
{
    //
    function __construct(){
        $loaisanpham=loaisanpham::all();
        $nhomsanpham=nhomsanpham::all();
        view()->share('loaisanpham',$loaisanpham);
        view()->share('nhomsanpham',$nhomsanpham);
    }
    public function getdangky(){
        $kh=nguoidung::all();
        return view('khachhang.dangky',['nguoidung'=>$kh]);
    }
    public function postdangky(Request $a){
        $a->validate($a,
            [
                'ten'=>'required',
                'email'=>'required|unique:tblusers,email',
                'password'=>'required',
                'diachi'=>'required',
                'phone'=>'required',
            ]
            ,
            [
                'ten.required'=>'chua nhap Ten',
                'email.required'=>'chua chon Email',
                'password.required'=>'chua nhap mat khau',
                'diachi.required'=>'chua nhap dia chi',
                'phone.required'=>'chua nhap dien thoai',
                'email.unique'=>'email ko duoc trung',
            ]);
        $kh=new nguoidung();
        $kh->name=$a->ten;
        $kh->email=$a->email;
        $kh->password=$a->password;
        $kh->Diachi=$a->diachi;
        $kh->Sodienthoai=$a->phone;
        try{
            $kh->save();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }

        return redirect('admin/loaisanpham/them')->with('thongbao','them thanh cong');
    }
    /*
    public function cartsp($ID){
    $sanpham=sanpham::find($ID);
    Cart::add(array('id'=>$ID,'name'=>$sanpham->Ten_sp,'price'=>$sanpham->Gia,'qty'=>1,'options'=>array('Hinh'=>$sanpham->Hinh)));
    $content=Cart::content();
    //print_r($content);
    //return view('khachhang.cart',['cart'=>$content]);
    return view('khachhang.cart',compact('content'));
    }
     */
    public function cartsp()
    {
        $array_session;$countsession;$sum;$sl=1;$tongtien=0;;

        if(session()->has('cart'))
        {
            $array_session=session()->get('cart');
            $sum = array_reduce($array_session, function ($a, $b) {
                //isset($a[$b['id']]) ? $a[$b['id']]['tensp'] += $b['gia'] : $a[$b['id']] = $b;
                //return $a;

                if(isset($a[$b['id']]))
                {
                    //$a[$b['id']]['gia']+=$b['gia'];
                    $a[$b['id']]['sl']+=$b['sl'];
                }
                else{
                    $a[$b['id']] = $b;

                }
                return($a);
            });
            $countsession=count($sum);
            if($countsession >0)
            {
                foreach($sum as $tt)
                {
                    $tongtien+=$tt['gia']*$tt['sl'];
                }
            }
            else
            {
                return redirect('pagesnull');
            }
        }
        else
        {
            //echo "ko co san pham";
            $sum=0;$countsession=0;$tongtien=0;
            return redirect('pagesnull');
        }
        //session()->push('cartupdate',$sum);
        session()->put('cart',$sum);
        $sessionID=md5(session()->getId());
        session()->put('sessionID',$sessionID);
        return view('khachhang.cart',['content'=>$sum,'countsession'=>$countsession,'tongtien'=>$tongtien,'sessionID'=>$sessionID]);
    }
    public function trangnull()
    {
        return view('khachhang.pagesnull');
    }
    public function pagescucess()
    {
        return view('khachhang.pagesucess');
    }
    public function removecart($id)
    {
        $array=session()->get('cart');
        array_forget($array,$id);
        if(session()->has('cart'))
            session()->put('cart',$array);
        return back()->withInput();
    }
    public function muacart($ID_sp){
        $sanpham=sanpham::find($ID_sp);
        $tensp=$sanpham['Ten_sp'];
        $IDsp=$sanpham['ID_sp'];
        $gia=$sanpham['Gia'];

        $array_sp=array('id'=>$IDsp,'tensp'=>$tensp,'gia'=>$gia,'sl'=>1);
        session()->push('cart',$array_sp);
        //session()->push('cart',$sanpham);
        //return back()->withInput();
        return back()->withInput();
    }
    public function test($id){
        $sanpham=sanpham::find($id);
        session()->push('test',$sanpham);
        $b=session()->get('test',$sanpham);
        return view('khachhang.test',['sanpham'=>$b]);
    }
    public function updateCart(Request $data)
    {
        /*
        if(isset($_GET['id']))
        {
        $id=$_GET['id'];
        }*/
        /*
        if(isset($data))
        {
        $id=$dat;a
        }*/
        $array=$data->query->get('id');
        /*
        $tong=0;
        foreach($array as $tt)
        {
        $tong=+$tt['tong'];
        }
         */
        //return view('khachhang.dathang',['updateCart'=>$array]);
        session()->put('dathang',$array);
        redirect('dathang');
        //redirect('khachhang.dathang');
        //return redirect('dathang')->with($array);
    }
    public function getupdateCart()
    {
        $a=session()->get('dathang');
        $tongtien=0;
        if(session()->has('dathang'))
        {
            foreach($a as $tt)
            {
                $tongtien+=$tt['tong'];
            }
        }
        else
        {
            $a=0;
            return redirect('pagesnull');
        }
        return view('khachhang.dathang',['array'=>$a,'tongtien'=>$tongtien]);
    }
    public function postupdateCart(Request $a)
    {

        $this->validate($a,
          [
              'ten'=>'required',
              'email'=>'required|unique:tblusers,email',
              'diachi'=>'required',
              'phone'=>'required',
          ]
          ,
          [
              'ten.required'=>'chua nhap Ten',
              'email.required'=>'chua chon Email',
              'diachi.required'=>'chua nhap dia chi',
              'phone.required'=>'chua nhap dien thoai',
              'email.unique'=>'email ko duoc trung',
          ]);
        //$cartsp=new cartsp();
        $b=session()->get('dathang');
        $sessionID=session()->get('sessionID');
        foreach($b as $tt)
        {
            DB::table('cart')->insert([
            /*
                $cartsp->ID_sp=$tt['id'];
                $cartsp->Soluong=$tt['sl'];
                $cartsp->Tien=$tt['gia'];
                $cartsp->Tenkh=$a->ten;
                $cartsp->Email=$a->email;
                $cartsp->Diachi=$a->diachi;
                $cartsp->Dienthoai=$a->phone;
                //$cartsp->save();*/
                [
                    'ID_sp'=>$tt['id'],
                    'Soluong'=>$tt['sl'],
                    'Tien'=>$tt['gia'],
                    'Tenkh'=>$a->ten,
                    'Email'=>$a->email,
                    'Diachi'=>$a->diachi,
                    'Dienthoai'=>$a->phone,
                    'sessionID'=>$sessionID,
                ],
                ]);
            //DB::table('cart')->insert($cartsp);
        }

        //redirect('pages.home');
        session()->forget('dathang');
        session()->forget('cart');
        return redirect ('pagesucess');

    }

}
