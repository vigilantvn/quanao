<style>
    thead th {
    background-color: blue;
    color: red;
}
tbody td {
    background-color: #EEEEEE;
}
</style>
@extends('admin.layout.index')
@section('content')
<div id="content">
    <h1 class="title">Loại Sản Phẩm</h1>
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
                    <th scope="col">Nhóom Sản Phẩm</th>
                    <th scope="col">Tên Loại Sản Phẩm</th>
                    <th scope="col">Tên Tóm Tắt</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col">Xoá</th>
                    <th scope="col">Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loaisanpham as $tt)
                <tr>
                    <td>{{$tt->ID_loaisp}}</td>
                    <td>{{$tt->to_nhomsanpham->Ten_nhomsp}}</td>
                    <td>{{$tt->Ten_loaisp}}</td>
                    <td>{{$tt->Ten_loaisp_tomtat}}</td>
                    <td>{{$tt->updated_at}}</td>
                    <td>
                        <a href="loaisanpham/sua/{{$tt->ID_loaisp}}">Sua</a>
                    </td>
                    <td>
                        <a href="loaisanpham/xoa/{{$tt->ID_loaisp}}">Xoa</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('#myTable').dataTable({
            "order": [[0, "desc"]]
        });

    });
</script>
@endsection
