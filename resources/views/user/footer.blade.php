<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                            <div class="logo">
                                    <a href="index.html">
                                        <div class="img_logo">
                                            <img src="source/user/images/primary_transparent.png">
                                        </div>
                                    </a>
                                </div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">+38 068 005 3570</div>
                    <div class="footer_contact_text">
                        <p>17 Princess Road, London</p>
                        <p>Grester London NW18JR, UK</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Danh mục</div>
                    <ul class="footer_list">
                        <li><a href="#">Computers & Laptops</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Smartphones & Tablets</a></li>
                        <li><a href="#">TV & Audio</a></li>
                    </ul>
                   x1
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                         Copyright &copy;  All rights reserved 
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="source/user/images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="source/user/images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="source/user/images/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="source/user/images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('flag'))
<button class="form-control"  id="test" onclick="myAlertTop_warning()" style="display: none;">{{Session::get('message')}}</button>

<script>
    var test1 = '{{Session::get('message')}}';
    if (test1 != '') {
    setTimeout(function() {
        document.getElementById('test').click();
    }, 100);
    }
</script>
<script>
        iziToast.settings({
          timeout: 3000,
          resetOnHover: true,
          transitionIn: 'flipInX',
          transitionOut: 'flipOutX',
          position: 'bottomRight',
          theme: 'light',
        });
      </script>
<script>
    function myAlertTop_warning() {
        iziToast.{{Session::get('flag')}} ({
        title: '{{Session::get('title')}}',
        message: '{{Session::get('message')}}',
        });
    }
</script>
@endif	