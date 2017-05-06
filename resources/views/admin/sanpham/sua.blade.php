
<!DOCTYPE html>
<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 50%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        
    }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    .suathongtin {
        border-radius: 5px;
        background-color: #ffffff;
        padding: 20px; width: 80%;
    }
</style>
    
@extends('admin.layout.index')
@section('content')
<div id="content">
    <h1 class="title">Sua thong tin Nhom san pham</h1>
    @if(count($errors)>0)
    <div class="aler_thongbao">
        @foreach($errors->all() as $err)
        {{$err}}
        <br />
        @endforeach
    </div>
    @endif
    @if(session('thongbao'))
    <div class="session_thongbao">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="suathongtin">
        <form action="admin/sanpham/sua/{{$sanpham->ID_sp}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="fname">Ten</label>
            <input type="text" id="txtten" name="txtten" value="{{$sanpham->Ten_sp}}" placeholder="Your name..">
            <label for="country">Nhom san pham</label>
            <select id="loaisp" name="loaisp">
                <option value="">----Chon nhom sanpham----</option>
                @foreach($loaisanpham as $loaisp)
                    <option 
                            @if($loaisp->ID_loaisp==$sanpham->ID_loaisp)
                                {{"selected"}}
                            @endif
                                value="{{$loaisp->ID_loaisp}}">{{    $loaisp->Ten_loaisp}}
                    </option>
                @endforeach
            </select>
            <label for="fname">Mota</label>
            <input type="text" id="mota" name="mota" value="{{$sanpham->Mota}}" placeholder="Your name..">
            <label for="fname">Kich thuoc</label>
            <input type="text" id="size" name="size" value="{{$sanpham->Kichthuoc}}" placeholder="Your name..">
            <label for="fname">Gia</label>
            <input type="text" id="gia" name="gia" value="{{$sanpham->Gia}}" placeholder="Your name..">
            <label for="fname">Gia Khuyen Mai</label>
            <input type="text" id="giakm" name="giakm" value="{{$sanpham->GiaKM}}" placeholder="Your name..">
            <label for="fname">Hinh</label>
            <input type="file" name="hinh" class="form-control" placeholder="Please Enter Category Name" onchange="inputImage(this)" />
            <img name="img" src="sanpham_img/{{$sanpham->Hinh}}" width="150" height="100" id="img" />
            <input type="submit" value="Cap Nhat">
        </form>
        
    </div>
</div>
@endsection
