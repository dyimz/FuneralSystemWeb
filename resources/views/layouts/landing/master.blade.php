<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-wide " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="front-pages">

  
  @include('layouts.landing.header')

<body>
  <script src="../../assets/vendor/js/dropdown-hover.js"></script>
  <script src="../../assets/vendor/js/mega-dropdown.js"></script>
  @yield('header')
  @include('layouts.landing.navbar')

  <div data-bs-spy="scroll" class="scrollspy-example">

    @yield('content')

  </div>



  @include('layouts.landing.footer')

    
  @yield('script')
  @include('layouts.landing.script')
  
</body>

</html>


