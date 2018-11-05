
<!-- END MAIN -->
<div class="clearfix"></div>
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/iziToast.min.js') }}"></script>

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
          timeout: 5000,
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
<footer>
    <div class="container-fluid">
        <p class="copyright">&copy; 2017 <a href="#" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
    </div>
</footer>

<script >
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        console.log(form);
        swal({
            title: 'Xác nhận?',
            text: "Bạn có muốn thực hiện hành động này",
            type: 'warning',
            position: 'top',
            showCancelButton: true,
            showLoaderOnConfirm: true,
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