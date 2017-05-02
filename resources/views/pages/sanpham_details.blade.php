@extends('layout.index')
@section('content')
<div id="main_menu">
    <div class="title_menu">Chi Tiết Sản Phẩm</div>
    <ul class="sanpham_details">
        <li>
            <a href="#"><img src="sanpham_img/{{$sanpham->Hinh}}" width="231" height="383"/></a>
            <div class="sanpham_details_info">
                <span>{{$sanpham->Ten_sp}}</span>
                <br />
                <span>{{$sanpham->Mota}}.</span>
                <br />
                <span style="font-weight:bold">{{$sanpham->Gia}} VNĐ</span>
                <br />
                <span>Kich Thuoc : {{$sanpham->Kichthuoc}}</span>
                <br />
                <a href="{!! url('cart',[$sanpham->ID_sp]) !!}" class="buy_product">
                    <input type="button" value="Mua Hang" />
                </a>
                
            </div>
        </li>
    </ul>
    <div class="sanpham_lienquan">
        <h1>Sản phẩm cùng nhóm</h1>
        @foreach($spcungnhom as $spcn)
        <ul class="sanpham">
            <li>
                <a href="sanpham/{{$spcn->ID_sp}}/{{$spcn->Ten_sp_tomtat}}.html"><img src="sanpham_img/{{$spcn->Hinh}}"width="231" height="383" /></a>
                <div class="sanpham_info">
                   {{number_format($spcn->Gia) }}VNĐ
                </div>
            </li>
        </ul>
        @endforeach
    </div>
</div>
@endsection