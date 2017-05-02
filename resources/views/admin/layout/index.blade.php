<!DOCTYPE html>
<html lang="vi">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="adminlayout/adminpage.css" />
    <script type="text/javascript" src="adminlayout/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet"
          href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript"
            src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".cap2").hide();
            $(".cap1").click(function () {
                $(".cap2").hide();
                $(this).next().slideToggle();
            });
        });
    </script>
    <style>
        .table-responsive {
            width: 100%;
            /*margin-left: 10px;*/
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="adminpage">
            @include('admin.layout.menu')
            @yield('content')
    </div>
    @yield('script')

</body>
</html>
