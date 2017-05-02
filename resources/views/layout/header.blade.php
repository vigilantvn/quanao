<div id="header">
    <div class="logo"></div>
    <div class="shopping">
        <a href="cartsp">Your Shopping Cart</a>
        <span>Cart : 
            @if(Session::has('cart'))
                {{count(Session::get('cart'))}}
            @else
                {{'0'}}    
            @endif
        </span>
        <!--<span>Cost:$100</span>-->
    </div>

    <div id="menu">
        <ul>
            <li><a href="trangchu">Trang chủ</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">The Store</a></li>
            <li><a href="lienhe">Liên Hệ</a></li>
            <li><a href="#">My Account</a></li>
        </ul>
    </div>
</div>