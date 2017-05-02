@extends('admin.layout.index')
@section('content')
<div id="content">
    <div id="them">
        <h1 class="title">Them San Pham</h1>
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
        <form action="admin/sanpham/them" method="post" enctype="multipart/form-data">
            <table width="700" border="1">
                <tr>
                    <td>
                        <label>Ten</label>
                    </td>
                    <td>
                        <label>
                            <input type="text" name="txtten" id="txtten" />
                        </label>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Nhom San Pham</label>&nbsp;
                    </td>
                    <td>
                        <label>
                            <select name="loaisp" id="loaisp">
                                <option value="">----Chon nhom sanpham----</option>
                                @foreach($loaisanpham as $loaisp)
                                    <option value="{{    $loaisp->ID_loaisp}}">{{    $loaisp->Ten_loaisp}}</option>
                                @endforeach
                                
                            </select>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mo Ta</label>
                    </td>
                    <td>
                        <label>
                            <textarea id="demo" class="form-control ckeditor" rows="3" name="mota"></textarea>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Kich thuoc</label>
                    </td>
                    <td>
                        <label>
                            <select name="size">
                                <option value="M">M</option>
                                <option value="S">S</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XX">XX</option>
                            </select>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Gia</label>
                    </td>
                    <td>
                        <label>
                            <input type="text" name="gia" id="gia" />
                        </label>
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label>Gia khuyen mai</label>
                    </td>
                    <td>
                        <label>
                            <input type="text" name="giakm" id="giakm" />
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Hinh Anh</label>
                        
                    </td>
                    <td>
                        <input type="file" name="hinh" class="form-control" placeholder="Please Enter Category Name" onchange="inputImage(this)" />
                        <img name="img" src="#" id="img" />
                    </td>
                </tr>                
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <label>
                            <input type="submit" name="btnthem" id="btnthem" value="Them" />
                            <input type="submit" name="btnthoat" id="btnthoat" value="BoQua" />
                        </label>

                    </td>
                </tr>
            </table>
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
        </form>
    </div>
</div>
@endsection
@section('script')
   <script>
        function  inputImage(input){
            if(input.files && input.files[0])
            {
                var reader=new FileReader();
                reader.onload=function(e){
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