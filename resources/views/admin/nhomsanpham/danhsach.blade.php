@extends('admin.layout.index')
@section('content')
<div id="content">
    <h1 class="title">Nhom San Pham</h1>
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
                    <th scope="col">Xoa</th>
                    <th scope="col">Sua</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nhomsanpham as $tt)
                <tr>
                    <td>{{    $tt->ID_nhomsp}}</td>
                    <td>{{    $tt->Ten_nhomsp}}</td>
                    <td>{{    $tt->Ten_nhomsp_tomtat}}</td>
                    <td>
                        <a href="admin/nhomsanpham/sua/{{    $tt->ID_nhomsp}}">Sua</a>
                    </td>
                    <td>
                        <a href="admin/nhomsanpham/xoa/{{    $tt->ID_nhomsp}}">Xoa</a>
                    </td>
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
