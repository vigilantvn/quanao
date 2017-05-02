@extends('admin.layout.index')
@section('content')
<div id="content">
    <div id="them">
        <h1 class="title">Them San Pham</h1>
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
        <form action="admin/nhomsanpham/them" method="post" enctype="multipart/form-data">
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
                <!--
                <tr>
                    <td>
                        <label>Ten-Tomtat</label>&nbsp;
                    </td>
                    <td>
                        <label>
                            <input type="text" name="txttentomtat" id="txttentomtat" />
                        </label>
                    </td>
                </tr>
                                    -->
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