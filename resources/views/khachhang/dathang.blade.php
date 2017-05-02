<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <base href="{{asset('')}}" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <style></style>
    <link rel="stylesheet" href="html-shop\w3.css" />
    <link rel="stylesheet" href="html-shop\shop\shop.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

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
                padding: 5px;
                width: 100%;
                margin-left: 5px;
                float: left;
            }
    </style>
</head>
<body>
    <div id="pages">
        @include('layout.header')
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
        <table border="0" id="myTable">
            <tr>
                <th class="col-sm-1">STT</th>
                <th class="col-sm-2">Ten San pham</th>
                <th class="col-sm-2">Gia</th>
                <th class="col-sm-2">Soluong</th>
                <th class="col-sm-2">Tong</th>
            </tr>
            <?php $i=1;?>
            @if(count($array)>0)
            {{var_dump(count($array))}}
            @foreach($array as $tt)
            <tr>
                <td>
                    <input type="hidden" name="id" value="{{$tt['id']}}" id="id" />
                    <?php echo $i++;?>
                </td>
                <td>{{$tt['name']}}</td>
                <td class="gia">{{number_format($tt['gia'])}}</td>
                <td class="qty">{{$tt['sl']}}</td>
                <td class="tong">{{number_format($tt['tong'])}}</td>
            </tr>
            @endforeach
            @endif
        </table>

        <span class="tienthanhtoan">Tong so tien:{{number_format($tongtien)}}VNĐ</span>
        <div class="suathongtin">
            
            <h1>Đăt hàng</h1>
            <form method="post" action="dathang" enctype="multipart/form-data">
                <label for="fname">Ten</label>
                <input type="text" name="ten" id="ten" placeholder="Your Ten.." />
                <label for="fname">E-mail</label>
                <input type="text" name="email" id="email" placeholder="Your email.." />
                <label for="fname">Dia chi</label>
                <input type="text" name="diachi" id="diachi" placeholder="Your dia chi.." />
                <label for="fname">Dien thoai</label>
                <input type="text" name="phone" id="phone" placeholder="Your dien thoai.." />
                <input type="hidden" name="_token" value="{{csrf_token() }}" />
                <input type="submit" data-inline="true" value="Hoan tat" />
            </form>
        </div>
    </div>
    @include('layout.footer')
</body>
