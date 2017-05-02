
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
        width: 100%;
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
    <h3>Sua thong tin Nhom san pham</h3>
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
        <form action="admin/loaisanpham/sua/{{$loaisanpham->ID_loaisp}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="fname">Ten</label>
            <input type="text" id="txtten" name="txtten" value="{{$loaisanpham->Ten_loaisp}}" placeholder="Your name..">
            <label for="country">Nhom san pham</label>
            <select id="country" name="nhomsp">
                <option value="">----Chon nhom sanpham----</option>
                @foreach($nhomsanpham as $loaisp)
                    <option 
                            @if($loaisp->ID_nhomsp==$loaisanpham->ID_nhomsp)
                                {{"selected"}}
                            @endif
                                value="{{$loaisp->ID_nhomsp}}">{{$loaisp->Ten_nhomsp}}
                    </option>
                @endforeach
            </select>
            <input type="submit" value="Cap Nhat">
        </form>
        
    </div>
</div>
@endsection
