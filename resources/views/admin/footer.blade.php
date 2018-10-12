
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
<footer>
    <div class="container-fluid">
        <p class="copyright">&copy; 2017 <a href="#" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
    </div>
</footer>