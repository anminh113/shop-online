<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset(' ')}}">

    @include('user/head')
    @yield('head')
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

</head>

<body>
    <div class="super_container">
       
        @include('user/header')
        
        @yield('content')
  
       
       

        @include('user/footer')
      
     

    </div>
    {{-- footer --}}
    @include('user/footerjs')
    @yield('footer')
</body>

</html>