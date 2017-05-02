<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\nhomsanpham;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\DB;
class nhomsanphamController extends Controller
{
    //
    public function getdanhsach(){
        //return view('admin.admin_layout.index');
        $nhomsanpham=nhomsanpham::all();
        return view('admin.nhomsanpham.danhsach',['nhomsanpham'=>$nhomsanpham]);
    }
    public function paging_getdanhsach(){
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->simplePaginate(2);
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->paginate(10);
        $nhomsanpham=nhomsanpham::where('ID_nhomsp','>=','1')->get();
        return view('admin.nhomsanpham.danhsach',['nhomsanpham'=>$nhomsanpham]);
    }
    public function getthem(){
        $nhomsanpham=nhomsanpham::all();
        return view('admin.nhomsanpham.them',['nhomsanpham'=>$nhomsanpham]);
    }

    public function postthem(Request $a)
    {
        $this->validate($a,
            [
                //'Ten_nhomsp'=>'required',
                //'Ten_nhomsp_tomtat'=>'required',
                'txtten'=>'required|unique:nhomsanpham,Ten_nhomsp',
                //'txttentomtat'=>'required|unique:nhomsanpham,Ten_nhomsp_tomtat'
            ],
            [
                'txtten.required'=>'chua nhap Ten',
                //'txttentomtat.required'=>'chua nhap Ten Tom Tat',
                'txtten.unique'=>'Ten nhomsp da ton tai',
                //'txttentomtat.unique'=>'Ten nhomsp tomtat da ton tai',
            ]);
        $nhomsanpham=new nhomsanpham();
        $nhomsanpham->Ten_nhomsp=$a->txtten;
        $nhomsanpham->Ten_nhomsp_tomtat=changeTitle($a->txtten);

        try{
            $nhomsanpham->save();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }

        return redirect('admin/nhomsanpham/them')->with('thongbao','them thanh cong');

    }
    public function getsua($id){
        try{
            $nhomsanpham=nhomsanpham::where('ID_nhomsp',$id)->get();
            //$nhomsanpham=nhomsanpham::all();
        }
        catch(Exception $ex){
            file_put_contents("Logfile/errordb.txt","-".date("Y-m-d h:i:sa").":". $ex ->getMessage() . "\r\n", FILE_APPEND);
            exit();
        }
        return view('admin.nhomsanpham.sua',['nhomsanpham'=>$nhomsanpham]);
    }
    public function postsua($ID_nhomsp,Request $request){
        //DB::enableQueryLog();
        //$nhomsanpham=nhomsanpham::where('ID_nhomsp',$ID_nhomsp)->get();
        $nhomsanpham=nhomsanpham::find($ID_nhomsp);
        //$query=DB::getQueryLog();
        //var_dump($query);
        //$nhomsanpham=nhomsanpham::find($ID_nhomsp);

            $this->validate($request,
               [
                   //'Ten_nhomsp'=>'required',
                   //'Ten_nhomsp_tomtat'=>'required',
                   'txtten'=>'required|unique:nhomsanpham,Ten_nhomsp',
                   //'txttentomtat'=>'required|unique:nhomsanpham,Ten_nhomsp_tomtat'
               ],
               [
                   'txtten.required'=>'chua nhap Ten',
                   //'txttentomtat.required'=>'chua nhap Ten Tom Tat',
                   'txtten.unique'=>'Ten nhomsp da ton tai',
                   //'txttentomtat.unique'=>'Ten nhomsp tomtat da ton tai',
               ]);

            $nhomsanpham->Ten_nhomsp=$request->txtten;
            $nhomsanpham->Ten_nhomsp_tomtat=changeTitle($request->txtten);
            $nhomsanpham->save();

            return redirect('admin/nhomsanpham/sua/'.$ID_nhomsp)->with('thongbao','sua thanh cong');
    }
    public function getxoa($id){
        $nhomsanpham=nhomsanpham::find($id);
        $nhomsanpham->delete();
        return redirect('admin/nhomsanpham/danhsach/')->with('thongbao','xoa thanh cong');
    }
}
?>