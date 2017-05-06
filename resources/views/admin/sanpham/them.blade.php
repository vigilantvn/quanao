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
                <span>Thêm sản phẩm</span>
            </div>
            <div class="inner-wrap">
                <form action="admin/sanpham/them" method="post" enctype="multipart/form-data">
                                <label>Tên</label>
                                    <input type="text" name="txtten" id="txtten" />
                                <label>Nhóm Sản Phẩm</label>
                                    <select name="loaisp" id="loaisp">
                                        <option value="">----Chon nhom sanpham----</option>
                                        @foreach($loaisanpham as $loaisp)
                                        <option value="{{    $loaisp->ID_loaisp}}">{{    $loaisp->Ten_loaisp}}</option>
                                        @endforeach
                                    </select>
                                <label>Mô tả</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="mota"></textarea>
                                <label>Kích thước</label>
                                    <select name="size">
                                        <option value="M">M</option>
                                        <option value="S">S</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XX">XX</option>
                                    </select>
                                <label>Giá</label>
                                    <input type="text" name="gia" id="gia" />
                                <label>Giá khuyến mãi</label>
                                    <input type="text" name="giakm" id="giakm" />
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh" class="form-control" placeholder="Please Enter Category Name" onchange="inputImage(this)" />
                                <img name="img" src="#" id="img" />
                                <label>
                                    <input type="submit" name="btnthem" id="btnthem" value="Thêm" />
                                    <input type="submit" name="btnthoat" id="btnthoat" value="Bỏ Qua" />
                                </label>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                </form>
                </div>
            </div>
        </div>
        </div>
        @endsection
        @section('script')
        <script>
            function inputImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img')
                                .show()
                                .attr('src', e.target.result)
                                .width(150)
                                .height(200)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        @endsection
