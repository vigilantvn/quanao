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
         input[type=password], select {
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
        margin-left:10px;
    }
</style>
@extends('layout.index')
@section('content')
<div id="main_menu">
        <div class="suathongtin">
            <h1>Đăng ký khách hàng</h1>
            <form method="post" action="/action_page_post.php">
               
                    <label for="fname">Ten</label>
                    <input type="text" name="ten" id="ten" placeholder="Your Ten.." />
                    <label for="fname">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="Your email.." />
                    <label for="fname">Dia chi</label>
                    <input type="text" name="diachi" id="diachi" placeholder="Your dia chi.." />
                    <label for="fname">Mat Khau</label>
                    <input type="password" name="password" id="password" placeholder="Your password.." />
                    <label for="fname">Dien thoai</label>
                    <input type="text" name="phone" id="phone" placeholder="Your dien thoai.." />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" data-inline="true" value="Submit" />
            </form>
        </div>
    </div>
</div>
@endsection