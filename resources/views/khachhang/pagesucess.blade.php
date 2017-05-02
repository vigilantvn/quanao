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
</head>
<body>
    <div id="pages">
        @include('layout.header')
        <div id="empty">Dat hang thanh cong</div>
        <span><a href="trangchu">Quay lai trang home</a></span>
        @include('layout.footer')
    </div>
</body>
</html>

