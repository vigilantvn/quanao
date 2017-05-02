
<style>
    .qty {
        width: 40px;
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
    <div id="">
        <table border="1" id="myTable">

            <tr>
                <td scope="col">STT</td>
                <td scope="col">Ten San pham</td>
                <td scope="col">Gia</td>
                <td scope="col">So luong</td>
                <td scope="col">Tong</td>
                <td scope="col"></td>
            </tr>
            @foreach($content as $values)
            <tr>
                <td>{{$values['id']}}</td>
                <td>{{$values['tensp']}}</td>
                <td><p class="gia">{{$values['gia']}}</p></td>
                <td>
                    <input type='button' value='-' class='qtyminus' id="qtyminus" field='quantity' onclick="my1(this)" />
                    <p class='qty'>{{$values['sl']}}</p>
                    <input type='button' value='+' class='qtyplus' id="qtyplus" field='quantity' onclick="my(this)" />
                </td>
                <td>
                    <p class="tong">{{$values['gia']*$values['sl']}}</p>
                </td>
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
                <td>
                    <p id="tongtien">{{$tongtien}}</p>
                </td>
            </tr>
        </table>
        <input type="button" value="myButton" name="myButton" id="myButton" />
        <div id="ccc"></div>
    </div>

    @endsection
    @section('script')
    <script>
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

    }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#myButton").click(function () {
                var b = [];
                $("#myTable tr").each(function () {
                    if (!this.rowIndex) return;
                    var cols = $("#myTable").find("tr:first td");
                    var row_m = this.rowIndex;
                    for (var i = 0; i < cols.length-1; i++) {
                        var a = this.cells[i].innerHTML;
                        //var c=new Array(1,2,4);
                        //alert(c);

                        var input_sl = "p class='qty'";
                        var input = "input type";
                        var rowCount = $("#myTable td").closest("tr").length;
                        //if (a.indexOf(input) != -1) {
                        /*if (a.indexOf(input) != -1) {
                            /*
                            var x = document.getElementsByClassName("qty");
                            for (var j = 0; j<rowCount-1; j++)
                            {
                            b.push(x[row_m - 1].innerHTML);
                            }


                        }*/
                        /*
                        if (a.indexOf(input_sl) != -1 || a.indexOf(input) != -1) {
                            var x = document.getElementsByClassName("qty");
                            for (var j = 0; j < rowCount - 1; j++) {
                                b.push(x[row_m - 1].innerHTML);
                            }
                        }*/
                        if(aaa){
                            ;
                        }
                        else {
                            b.push(this.cells[i].innerHTML);
                        }
                        //alert(b);

                    }

                });
                $("#ccc").html(b.join(","));
            });

        });


    </script>

    @endsection
