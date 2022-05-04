

    <!-- footer -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footercol1">
                    <h3>Download Our app</h3>
                    <p>Download our app for android and ios</p>
                    <div class="applogo">
                        <img src="/images/gp.png">
                        <img src="/images/ap.png">
                    </div>
                </div>
                <div class="footercol2">
                    <img src="/images/logo.jpeg">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, numquam.</p>
                </div>
                <div class="footercol3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Return Policy</li>
                        <li>Blog Post</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footercol4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022- Nature On My Plate</p>
        </div>
    </div>

    <!-- JS for toggle menu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
            else{
                MenuItems.style.maxHeight = "0px";
            }
        } 
    </script>
</body>
</html>