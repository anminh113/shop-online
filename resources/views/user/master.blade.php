<!DOCTYPE html>
<html lang="en">

<head>
    @include('user/head')
    @yield('head')
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