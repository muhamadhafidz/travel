<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TIDUNG KECIL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logotike.png') }}" rel="icon">


    <!--     Fonts and icons     -->
    @include('user.includes.font')
    <!-- CSS Files -->
    @stack('before-style')
    @include('user.includes.style')
    @stack('after-style')

</head>
<body>
    @include('user.includes.header')
    @yield('content')
    @include('user.includes.footer')

    @stack('before-script')
    @include('user.includes.script')
    @stack('after-script')
    @include('sweetalert::alert')
        
</body>

</html>
