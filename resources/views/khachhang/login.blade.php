
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

@extends('layout.index')
@section('content')
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>
                        <span class="glyphicon glyphicon-lock"></span>Login
                    </h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" enctype="multipart/form-data" action="login">
                        <div class="form-group">
                            <label for="usrname">
                                <span class="glyphicon glyphicon-user"></span>Username
                            </label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter email" />
                        </div>
                        <div class="form-group">
                            <label for="psw">
                                <span class="glyphicon glyphicon-eye-open"></span>Password
                            </label>
                            <input type="text" class="form-control" id="psw" name="psw" placeholder="Enter password" />
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="radio" id="chk" name="chk" value="1" checked />Khach hang moi
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="radio" id="chk" name="chk" value="0" unchecked />Dang ky
                            </label>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token() }}" />
                        <button type="submit" class="btn btn-success btn-block">
                            <span class="glyphicon glyphicon-off"></span>Login
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>Cancel
                    </button>
                    <p>
                        Not a member?
                        <a href="#">Sign Up</a>
                    </p>
                    <p>
                        Forgot
                        <a href="#">Password?</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myModal").modal();
    });
</script>
@endsection