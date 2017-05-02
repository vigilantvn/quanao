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
    <h1 class="title">Danh sách don hang</h1>
    <form method="get" action="admin/donhang/baocao" enctype="multipart/form-data">
        <input type="submit" value="xuat bao cao" id="baocao" />
    </form>
    <div class="table-responsive">
        <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ten san pham</th>
                    <th scope="col">So luong</th>
                    <th scope="col">Tien</th>
                    <th scope="col">Ten KH</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dia chi</th>
                    <th scope="col">Dien thoai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donhang as $tt)
                <tr>
                    <td>{{$tt->ID}}</td>
                    <td>{{$tt->donhang_sanpham->Ten_sp}}</td>
                    <td>{{$tt->SoLuong}}</td>
                    <td>{{number_format($tt->Tien)}}</td>
                    <td>{{$tt->Tenkh}}</td>
                    <td>{{$tt->Email}}</td>
                    <td>{{$tt->Diachi}}</td>
                    <td>{{$tt->Dienthoai}}</td>
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
