@extends('admin.layout.index')
@section('content')
<div id="content">
    <div id="them">
        @if(count($errors)>0)
        <div class="aler_thongbao">
            @foreach($errors->all() as $err)
            {{    $err}}
            <br />
            @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="session_thongbao">
            {{session('thongbao')}}
        </div>
        @endif
        <div class="suathongtin">
            <div class="section">
                <span>Thêm Nhóm Sản Phẩm</span>
            </div>
            <div class="inner-wrap">
                <form action="admin/nhomsanpham/them" method="post" enctype="multipart/form-data">
                                <label>Ten</label>
                                    <input type="text" name="txtten" id="txtten" />
                                <label></label>
                                    <input type="submit" name="btnthem" id="btnthem" value="Them" />
                                    <input type="submit" name="btnthoat" id="btnthoat" value="BoQua" />
                   
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
