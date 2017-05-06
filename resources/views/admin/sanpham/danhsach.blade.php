<style>
    /*
    table#mytable thead th {
        background-color: blue;
        color: red;
    }
            
    tbody td {
        background-color: #EEEEEE;
    }*/
</style>
@extends('admin.layout.index')
@section('content')
<div id="content">
    <h1 class="title">Danh sách sản phẩm</h1>
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
                    <th class="col">ID</th>
                    <th class="col">Tên</th>
                    <th class="col">Loại</th>
                    <th class="col">Mô Tả</th>
                    <th class="col">Tên tóm tắt</th>
                    <th class="col">Giá</th>
                    <th class="col">Giá KM</th>
                    <th class="col">Hình</th>
                    <th class="col">Kích thước</th>
                    <th class="col">Ngày</th>
                    <th class="col">Xóa</th>
                    <th class="col">Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanpham as $tt)
                <tr>
                    <td>{{$tt->ID_sp}}</td>
                    <td>{{$tt->Ten_sp}}</td>
                    <td>{{$tt->to_loaisanpham->Ten_loaisp}}</td>
                    <td>{{$tt->Mota}}</td>
                    <td>{{$tt->Ten_sp_tomtat}}</td>
                    <td>{{number_format($tt->Gia)}} VNĐ</td>
                    <td>{{number_format($tt->GiaKM)}} VNĐ</td>
                    <td>
                        <a href="sanpham_img/{{$tt->Hinh}}">
                            <img width="50" height="50" src="sanpham_img/{{$tt->Hinh}}" />
                        </a>
                    </td>
                    <td>{{$tt->ID}}</td>
                    <td>{{$tt->updated_at}}</td>
                    <td>
                        <a href="admin/sanpham/sua/{{$tt->ID_sp}}">Sua</a>
                    </td>
                    <td>
                        <a href="admin/sanpham/xoa/{{$tt->ID_sp}}">Xoa</a>
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
