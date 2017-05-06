<style>
    
    .pagination li {
        list-style: none;
        float: left;
        margin-left: 0px;
        padding:0px;
    }
    
</style>
@extends('layout.index')
@section('content')

<div id="main_menu">
    <!--<div class="title_menu">San Pham //$loaisanpham->Ten_loaisp</div>-->
    <ul class="breadcrumb"><li><a href="#">Sản Phẩm {{$loaisanpham->Ten_loaisp}}</a></li></ul>
    @foreach($sanpham as $sp)
    <ul class="sanpham">
        <li>
            <a href="sanpham/{{$sp->ID_sp}}/{{$sp->Ten_sp_tomtat}}.html">
                <img src="sanpham_img\{{$sp->Hinh}}" width="231" height="383" />
            </a>
            <div class="sanpham_info">
                {{number_format($sp->Gia) }}VNĐ
            </div>
        </li>
    </ul>
    @endforeach
    <ul class="pagination">
        {!!$sanpham->links() !!}
    </ul>
</div>


@endsection