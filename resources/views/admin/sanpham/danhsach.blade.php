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
                    <th scope="col">ID</th>
                    <th scope="col">Ten san pham</th>
                    <th scope="col">Loai san pham</th>
                    <th scope="col">Mo Ta</th>
                    <th scope="col">Ten san pham tom tat</th>
                    <th scope="col">Gia</th>
                    <th scope="col">Gia khuyen mai</th>
                    <th scope="col">Hinh</th>
                    <th scope="col">Kich thuoc</th>
                    <th scope="col">Ngay cap nhat</th>
                    <th scope="col">Xoa</th>
                    <th scope="col">Sua</th>
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
                        <a href="sanpham/sua/{{$tt->ID_sp}}">Sua</a>
                    </td>
                    <td>
                        <a href="sanpham/xoa/{{    $tt->ID_sp}}">Xoa</a>
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
