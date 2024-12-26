<!DOCTYPE html><html lang="en" data-bs-theme="light" data-pwa="true">
<!-- Mirrored from cartzilla.createx.studio/home-electronics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Sep 2024 06:26:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dimmo Interface</title>

    <title>@yield('title')</title>
    @include('client.layout.partials.css')
    @include('client.layout.partials.js')
  </head>
  <!-- Body -->
  <body>
    @include('client.layout.partials.header')
    <!-- Page content -->
    <main class="content-wrapper">
      @yield('content')
    </main>
    <!-- Page footer -->
    @include('client.layout.partials.footer')
    <!-- Vendor scripts -->
    @include('client.layout.partials.js')
</body>
</html>
