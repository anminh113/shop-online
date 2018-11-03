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


<script>
    $('#delete').click(function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        console.log(link);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#008496',
            cancelButtonColor: '#EE093D',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'

        }).then((result) => {
            if (result.value) {
                window.location.href = link;
            }
        })
    });
</script>

<script >
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        console.log(form);
        swal({
            title: 'Xác nhận?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#008496',
            cancelButtonColor: '#EE093D',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    }
</script>