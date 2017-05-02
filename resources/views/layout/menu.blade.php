<div id="right_menu">
    <div class="filter">
        <h2>Tìm kiếm</h2>
        <div id="box-search">
            <form action="" method="post">
                Từ khóa:
                <input type="text" name="txserach" class="search_field" />
                <br />
                <input type="submit" name="Filter" value="Tìm kiếm" class="button_field" />
            </form>
        </div>
    </div>
    <div class="menu_sp">
        @foreach($nhomsanpham as $nsp)
        @if(count($nsp->to_loaisanpham)>0)
        <h2>{{$nsp->Ten_nhomsp}}</h2>
        <ul class="loaisanpham">
            <!--Load cai function trong model ten la nhomsanpham-->
            @foreach($nsp->to_loaisanpham as $lsp)
                
                <li>
<a href="{{$lsp->ID_loaisp}}/{{$lsp->Ten_loaisp_tomtat}}.html">{{$lsp->Ten_loaisp}}</a></li>
                
            @endforeach
        </ul>
        @endif
        @endforeach        
    </div>
</div>


