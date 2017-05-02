<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cartsp;
use App\sanpham;
use Excel;
use DateTime;
//require('App\function\fpdf.php');
//use App\func\listcart;
use \Dompdf;
class donhang extends Controller
{
    //
    public function danhsachdonhang()
    {
        $cartsp=cartsp::orderBy('Tenkh','Email','Dienthoai')->get();
        return view('admin.donhang.donhang',['donhang'=>$cartsp]);
    }
    public function donhangbaocao()
    {
        $cartsp=cartsp::orderBy('Tenkh','Email','Dienthoai')->get();
        $data=array();

        foreach($cartsp as $key=> $tt)
        {
            //array_push($data,$tt['ID']);
            //array_push($data,$tt['Tenkh']);
            //$data[$tt['ID']]=array($tt['ID'],$tt['Tenkh'],$tt['Soluong'],$tt['Email'],$tt['Diachi'],$tt['Dienthoai']);
            //$data[$key]=array($tt['ID'],$tt['Tenkh'],$tt['Soluong'],$tt['Email'],$tt['Diachi'],$tt['Dienthoai']);
            $data[$key]=array('ID'=>$tt['ID'],'KH'=>$tt['Tenkh'],'sl'=>$tt['Soluong'],'mail'=>$tt['Email'],'dc'=>$tt['Diachi'],'dt'=>$tt['Dienthoai']);
        }

        Excel::create('Laravel Excel', function($excel) use($data) {

            $excel->sheet('Excel sheet', function($sheet) use($data) {

                //$sheet->fromArray($data, null, 'A1', false, false);
                $now = new DateTime();
                $sheet->row(1, array('Bao cao:',$now));

                $sheet->fromArray($data, null, 'A2', true, true);

            });

        })->export('xls');

    }


}
