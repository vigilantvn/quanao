<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Route::get('test', 'nguoidungController@test');
Route::get('trangchu','homeController@trangchu');
Route::get('admin/login','loginController@loginadmin');
Route::post('admin/login','loginController@postloginadmin');
//Route::get('sanpham/{id}/{TenKhongDau}.html','homeController@sanpham_details');
Route::get('sanpham/{id}','homeController@sanpham_details');
Route::get('{id}/{TenKhongDau}.html','homeController@sanpham_theloai');
Route::get('lienhe','homeController@lienhe');
Route::get('dangky','nguoidungController@getdangky');
Route::post('dangky','nguoidungController@postdangky');
//Route::get('cartsp/{id}','nguoidungController@cartsp');
//Route::post('cartsp/{id}','nguoidungController@postcartsp');
Route::get('test/{id}','nguoidungController@test');
Route::get('cart/{id}','nguoidungController@muacart');
Route::get('cartsp','nguoidungController@cartsp');
Route::get('testarray','nguoidungController@testarray');
Route::get('removecart/{id}','nguoidungController@removecart');
Route::get('pagesnull','nguoidungController@trangnull');
Route::get('pagesucess','nguoidungController@pagescucess');
Route::get('dathang','nguoidungController@getupdateCart');

Route::post('dathang','nguoidungController@postupdateCart');


Route::get('updatecart/{id}','nguoidungController@updateCart');

Route::group(['middleware'=>['web']],function(){
    //Route::get('cartsp','nguoidungController@cartsp');
    Route::get('test/{id}','nguoidungController@test');
    //Route::get('cartsp/{id}','nguoidungController@cartsp');
    //Route::get('cartsp/{id}','nguoidungController@cart');
    /*
    Route::get('session',function(){
        $a=Session::put('khoahoc','testgiatri') ;
        //$a=Session::get('khoahoc');
        $a=Session::push('khoahoc',$a) ;
        echo $a;
        //echo Session::get('khoahoc1');
        //Session::flush();
        session::flash('mess','hi');
       echo "<br/>".Session::get('mess');

        if(Session::has('khoahoc'))

            echo "<br/>"."tontai session";

        else

            echo "ko";

    });
    */
    /*
    Route::get('session/test',function(){
        echo "<br/>".Session::get('mess') ;
    });
    */
});
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    Route::group(['prefix'=>'nhomsanpham'],function(){
        Route::get('danhsach','nhomsanphamController@paging_getdanhsach');
        Route::get('them','nhomsanphamController@getthem');
        Route::post('them','nhomsanphamController@postthem');
        Route::get('sua/{ID_nhomsp}','nhomsanphamController@getsua');
        Route::post('sua/{ID_nhomsp}','nhomsanphamController@postsua');
        Route::get('xoa/{ID_nhomsp}','nhomsanphamController@getxoa');
    });
    Route::group(['prefix'=>'loaisanpham'],function(){
        Route::get('danhsach','loaisanphamController@getdanhsach');
        Route::get('them','loaisanphamController@getthem');
        Route::post('them','loaisanphamController@postthem');
        Route::get('sua/{ID_loaisp}','loaisanphamController@getsua');
        Route::post('sua/{ID_loaisp}','loaisanphamController@postsua');
        Route::get('xoa/{ID_loaisp}','loaisanphamController@getxoa');
    });
    Route::group(['prefix'=>'sanpham'],function(){
        Route::get('danhsach','sanphamController@getdanhsach');
        Route::get('them','sanphamController@getthem');
        Route::post('them','sanphamController@postthem');
        Route::get('sua/{ID_sp}','sanphamController@getsua');
        Route::post('sua/{ID_sp}','sanphamController@postsua');
        Route::get('xoa/{ID_sp}','sanphamController@getxoa');
    });
    Route::group(['prefix'=>'login'],function(){
        Route::get('danhsach','loginController@getdanhsach');
        Route::get('them','loginController@getthem');
        Route::post('them','loginController@postthem');
        Route::get('sua/{ID}','loginController@getsua');
        Route::post('sua/{ID}','loginController@postsua');
        Route::get('xoa/{ID}','loginController@getxoa');
    });
    Route::group(['prefix'=>'donhang'],function(){
        Route::get('danhsach','donhang@danhsachdonhang');
        Route::get('baocao','donhang@donhangbaocao');
    });
});
route::get('array',function(){
                       /*
    $banks = array();
    $banks[] = array('name'=>'Bank BRI','amount'=>rand());
    $banks[] = array('name'=>'Bank BRI','amount'=>rand());
    $banks[] = array('name'=>'Bank BCA','amount'=>rand());
    $banks[] = array('name'=>'Bank CIMB','amount'=>rand());
    $banks[] = array('name'=>'Bank BRI','amount'=>rand());
    $banks[] = array('name'=>'Bank CIMB','amount'=>rand());
    $banks[] = array('name'=>'Bank BRI','amount'=>rand());
    $banks[] = array('name'=>'Bank BNI','amount'=>rand());
    $banks[] = array('name'=>'Bank CIMB','amount'=>rand());
    $banks[] = array('name'=>'Bank BCA','amount'=>rand());
    $banks[] = array('name'=>'Bank Mandiri','amount'=>rand());
    $banks[] = array('name'=>'Bank BCA','amount'=>rand());
    $banks[] = array('name'=>'Bank BCA','amount'=>rand());
    $banks[] = array('name'=>'Bank Permata','amount'=>rand());

    // begin the iteration for grouping bank name and calculate the amount
    $amount = array();
    foreach($banks as $bank) {
        $index = bank_exists($bank['name'], $amount);
        if ($index < 0) {
            $amount[] = $bank;
        }
        else {
            $amount[$index]['amount'] +=  $bank['amount'];
        }
    }
    print_r($amount); //display

    // for search if a bank has been added into $amount, returns the key (index)
    function bank_exists($bankname, $array) {
        $result = -1;
        for($i=0; $i<sizeof($array); $i++) {
            if ($array[$i]['name'] == $bankname) {
                $result = $i;
                break;
            }
        }
        return $result;
    }*/
    $a=array();

    $a[]=array('name'=>'A','price'=>'10');
    $a[]=array('name'=>'B','price'=>'10');
    $a[]=array('name'=>'A','price'=>'10');

    $b=array();
    foreach($a as $d){
    foreach($d as $key=>$values)
    {
        if(isset($b[$key]['name']))
        {
            $b[$key] += $values;
        }
        else
        {
            $b[$key] = $values;
        }
    }
    }
    print_r($b);
});