@extends('layout.index')
@section('content')

<div id="main_menu">
    <div class="title_menu">Sản Phẩm Nổi Bật</div>
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
</div>
@endsection