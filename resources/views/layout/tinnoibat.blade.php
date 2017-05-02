<div id="noibat">
    <div id="imgnoibat">
        <img src="html-shop/shop/slide1.jpg" width="460" height="202" />
    </div>
    <div id="logonoibat">
        <div class="w3-content w3-section" style="max-width:500px">
            <img class="mySlides w3-animate-fading" src="html-shop/shop/slide1.jpg" style="width:500px;height:202px">
            <img class="mySlides w3-animate-fading" src="html-shop/shop/slide1.jpg" style="width:500px;height:202px">
            <img class="mySlides w3-animate-fading" src="html-shop/shop/slide1.jpg" style="width:500px;height:202px">
            <img class="mySlides w3-animate-fading" src="html-shop/shop/slide1.jpg" style="width:500px;height:202px">
        </div>
        <script>
                    var myIndex = 0;
                    carousel();

                    function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        myIndex++;
                        if (myIndex > x.length) { myIndex = 1 }
                        x[myIndex - 1].style.display = "block";
                        setTimeout(carousel, 9000);
                    }
        </script>
    </div>

</div>