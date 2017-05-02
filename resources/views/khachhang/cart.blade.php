
<style>
    .qty {
        width: 20px;
        height: 25px;
        text-align: center;
    }

    input.qtyplus {
        width: 25px;
        height: 25px;
    }

    input.qtyminus {
        width: 25px;
        height: 25px;
    }
</style>
@extends('layout.index')
@section('content')
<div id="content">
    <h1 class="title">Gio hang</h1>
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
    <div>
        <table border="1" id="myTable">
                <tr>
                    <th class="col-sm-1">STT</th>
                    <th class="col-sm-2">Ten San pham</th>
                    <th class="col-sm-2">Gia</th>
                    <th class="col-sm-2"></th>
                    <th class="col-sm-2">Soluong</th>
                    <th class="col-sm-2"></th>
                    <th class="col-sm-2">Tong</th>
                    <th class="col-sm-1"></th>
                </tr>
                @foreach($content as $values)
                <tr>
                    <td>{{$values['id']}}</td>
                    <td>{{$values['tensp']}}</td>
                    <td class="gia">{{$values['gia']}}</td>
                    <td><input type='button' value='+' class='qtyplus' />
                    <td class="qty">{{$values['sl']}}</td>
                    <td><input type='button' value='-' class='qtyminus' /></td>                    
                    <td class="tong">{{$values['gia']*$values['sl']}}</td>
                    <td>
                        <a href="removecart/{{$values['id']}}">X</a>
                    </td>
                </tr>

                @endforeach
        </table>
        <table id="ttt" border="1">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Tien thanh toan</td>
                <td class="tongtien">{{$tongtien}}</td>
            </tr>
        </table>
        <div id="ccc"></div>
        
            <input type="button" value="Update Cart" name="myButton" class="myButton" />
        <div id="ketqua"></div>
</div>
    
@endsection
@section('script')
<script>
    /*
    function my(element) {
        var a = element.parentNode.parentNode.rowIndex-1;
        var k = document.getElementsByClassName('gia');
        var tong = document.getElementsByClassName('tong');
        var b = document.getElementsByClassName('qty');
        //var tongtien = document.getElementById('tongtien');
        for (var i = 0; i < b.length; i++) {
            if (a == i)
                b[i].innerHTML = parseInt(b[i].innerHTML) + 1;
                tong[i].innerHTML = k[i].innerHTML * b[i].innerHTML;
                
        }
        var bbb = 0;
        for (var j = 0; j < tong.length; j++) {
            bbb += parseInt(tong[j].innerHTML);
        }
        
        var ps = document.getElementById('tongtien');
        ps.innerHTML = bbb;
        //alert(document.getElementsByClassName('tongtien').innerHTML)
        //alert(bbb);
        
        //var email = new Array();
    }
    function my1(element) {
        var a = element.parentNode.parentNode.rowIndex-1;
        var k = document.getElementsByClassName('gia');
        var tong = document.getElementsByClassName('tong');
        var b = document.getElementsByClassName('qty');
        var tongtien = document.getElementById('tongtien');
        var bbb = 0;
        for (var i = 0; i < b.length; i++) {
            if (a == i)
                if (b[i].innerHTML > 1)
                    {
                    b[i].innerHTML = parseInt(b[i].innerHTML) - 1;
                    tong[i].innerHTML = k[i].innerHTML * b[i].innerHTML;
                }
                else
                    b[i].innerHTML = 1;
                    tong[i].innerHTML = k[i].innerHTML * b[i].innerHTML;
        }
        for (var j = 0; j < tong.length; j++) {
            bbb += parseInt(tong[j].innerHTML);
        }
        tongtien.innerHTML = bbb;
        
    }*/
</script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".qtyminus").click(function () {
                //alert('aaa');
                var soluong = $(this).closest("tr").find(".qty").text();
                var tong = $(this).closest('tr').find('.tong').text();
                var gia = $(this).closest('tr').find('.gia').text();
                if (soluong <= 1)
                    soluong = 1
                else
                    soluong = parseInt(soluong) - 1;
                tong = soluong * gia;
                $(this).closest('tr').find('.qty').html(soluong);
                $(this).closest('tr').find('.tong').html(tong);
                var tt = $('.tongtien').text(0);
                var sum = 0;
                $("#myTable").find('.tong').each(function () {
                    sum = parseInt($(this).text());
                    var tt = 0;
                    if ($('.tongtien').text != 0)
                        tt = parseInt($('.tongtien').text());
                    $('.tongtien').text(sum + tt);
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".qtyplus").click(function () {
                //alert('aaa');
                var soluong = $(this).closest("tr").find(".qty").text();
                var tong = $(this).closest('tr').find('.tong').text();
                var gia = $(this).closest('tr').find('.gia').text();
                if (soluong >= 5)
                    soluong = 5
                else
                    soluong = parseInt(soluong) + 1;
                tong = soluong * gia;
                $(this).closest('tr').find('.qty').html(soluong);
                $(this).closest('tr').find('.tong').html(tong);
                var tt = $('.tongtien').text(0);
                var sum = 0;
                $("#myTable").find('.tong').each(function () {
                    sum = parseInt($(this).text());
                    var tt = 0;
                    if ($('.tongtien').text != 0)
                        tt = parseInt($('.tongtien').text());
                    $('.tongtien').text(sum + tt);
                });
            });
        });
    </script>
    <script type="text/javascript">
        
        /*dua vao mang lay tat ca thong tin table
        $(document).ready(function () {
            $(".myButton").click(function () {
                var data = [];
                $('#myTable').find('tr').each(function (rowIndex, r) {
                    if (!this.rowIndex) return;
                    var cols = [];
                    //var colsum = colIndex - 1;
                    $(this).find('tr,td').each(function (colIndex, c) {
                        if (c.textContent != 'remove' && c.textContent != '' && c.textContent != '↵↵↵') {
                            cols.push($.trim(c.textContent));
                        }

                    });
                    data.push(cols);
                });
                alert(data);

            });
        });*/
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.myButton').click(function () {
                var data = [];
                $('#myTable').find('tr').each(function (rowIndex, r) {
                    if (!this.rowIndex) return;
                    var cols = [];
                    var id = $.trim($(this).find('td').eq(0).text());
                    var name = $.trim($(this).find('td').eq(1).text());
                    var gia = $.trim($(this).find('td').eq(2).text());
                    var sl = $.trim($(this).find('td').eq(4).text());
                    var tong = $.trim($(this).find('td').eq(6).text());
                    data.push({
                        'id': id,
                        'name': name,
                        'gia': gia,
                        'sl': sl,
                        'tong': tong
                    });
                    /*
                    //var colsum = colIndex - 1;
                    $(this).find('tr,td').each(function (colIndex, c) {
                        if (c.textContent != 'remove' && c.textContent != '' && c.textContent != '↵↵↵') {
                            cols.push($.trim(c.textContent));
                        }

                    });*/
                    //data.push(cols);
                });
                var a = 5;

                $.get("updatecart/{{$sessionID}}", { id: data }, function (data) {
                    //$('#ketqua').html(data);
                    window.location.href = "dathang";

                });
            });
        });
    </script>
@endsection