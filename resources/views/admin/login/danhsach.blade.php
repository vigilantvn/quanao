@extends('admin.layout.index')
@section('content')
<div id="content">
    <h1 class="title">User</h1>
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
    <div class="table-responsive">
        <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Quyen</th>
                    <th scope="col">Xoa</th>
                    <th scope="col">Sua</th>
                </tr>
            </thead>
            <tbody>
                @foreach($login as $tt)
                <tr>
                    <td>{{$tt->id}}</td>
                    <td>{{$tt->name}}</td>
                    <td>{{$tt->email}}</td>
                    <td>
                        @if($tt->quyen==1)
                            {{"admin"}}
                        
                        @else
                        
                            {{"user"}}
                        
                        @endif
                    </td>
                    <td><a href="admin/login/sua/{{$tt->id}}">Sua</a></td>
                    <td><a href="admin/login/xoa/{{$tt->id}}">Xoa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('#myTable').dataTable();
    });
</script>
@endsection
