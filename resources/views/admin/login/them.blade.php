
<style>
    /*
    input[type=text], select {
        width: 70%;
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
            */
</style>
@extends('admin.layout.index')
@section('content')
<div id="content">
    <div id="them">
        @if(count($errors)>0)
        <div class="aler_thongbao">
            @foreach($errors->all() as $err)
                {{    $err}}
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
            <div class="section">
                <span>Thêm Người Dùng</span>
            </div>
            <div class="inner-wrap">
                <form action="admin/login/them/" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <label for="fname">Ten</label>
                    <input type="text" id="txtten" name="txtten" value="" placeholder="Your name.." />
                    <label for="fname">Email</label>
                    <input type="text" id="email" name="email" value="" placeholder="Your name.." />
                    <label for="fname">Mat khau</label>
                    <input type="text" id="pass" name="pass" value="" placeholder="Your name.." />
                    <label for="fname">Quyen</label>
                    <input type="radio" value="1" name="quyen" />Admin
                    <input type="radio" value="0" name="quyen" />User
                    <label></label>
                    <input type="submit" value="Cap Nhat" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection