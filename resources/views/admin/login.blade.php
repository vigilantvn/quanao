﻿<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-lock"></span>Đăng nhập</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" method="post" enctype="multipart/form-data" action="login">
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Tên</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mật khẩu</label>
                                <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked>Nhớ</label>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token() }}">
                            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Đăng nhập</button>
                        </form>
                    </div>
                    <!--
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <p>Not a member? <a href="#">Sign Up</a></p>
                        <p>Forgot <a href="#">Password?</a></p>
                    </div>
                                            -->
                </div>
                
            </div>
        </div>
    </div>

    <script>
$(document).ready(function(){
    //$("#myBtn").click(function(){
        $("#myModal").modal();
    //});

});
    </script>

</body>
</html>
