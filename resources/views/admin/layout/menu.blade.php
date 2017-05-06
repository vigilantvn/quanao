<div id="left_menu">
    <div class="brand">Quần Áo-
        @if(\Illuminate\Support\Facades\Auth::user())
        Xin chào:{{Auth::user()->name}}
        @endif
    </div>
    <div class="cap1" tabindex="1">Nhóm Sản Phẩm<span class="arrow-down"></span></div>
    <div class="cap2">
        <span class="arrow-next"></span><a href="admin/nhomsanpham/danhsach">Danh Sách Nhóm Sản Phẩm</a>
        <span class="arrow-next"></span><a href="admin/nhomsanpham/them">Thêm Nhóm Sản Phẩm</a>
    </div>
    <div class="cap1" tabindex="1">Loại Sản Phẩm<span class="arrow-down"></span></div>
    <div class="cap2">
        <span class="arrow-next"></span><a href="admin/loaisanpham/danhsach">Danh Sách Loại Sản Phẩm</a>
        <span class="arrow-next"></span><a href="admin/loaisanpham/them">Thêm Loại Sản Phẩm</a>
    </div>
    <div class="cap1" tabindex="1">Sản Phẩm<span class="arrow-down"></span></div>
    <div class="cap2">
        <span class="arrow-next"></span><a href="admin/sanpham/danhsach">Danh Sách Sản Phẩm</a>
        <span class="arrow-next"></span><a href="admin/sanpham/them">Thêm Sản Phẩm</a>
    </div>
    <div class="cap1" tabindex="1">Users<span class="arrow-down"></span></div>
    <div class="cap2">
        <span class="arrow-next"></span><a href="admin/login/danhsach">Danh Sách User</a>
        <span class="arrow-next"></span><a href="admin/login/them">Thêm Người dùng</a>
    </div>
    <div class="cap1" tabindex="1">Đơn Hàng<span class="arrow-down"></span></div>
    <div class="cap2">
        <span class="arrow-next"></span><a href="admin/donhang/danhsach">Danh Sách User</a>
    </div>
    <div class="cap1" tabindex="1">Trạng thái<span class="arrow-down"></span></div>
    <div class="cap2">
        <span class="arrow-next"></span><a href="admin/login/logout">Thoát</a>

        
    </div>
</div>