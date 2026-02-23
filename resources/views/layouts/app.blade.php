<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ================== CORE META ================== -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tobest Health care</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- ЁЯЪл DISABLE DARK MODE GLOBALLY -->
  <meta name="color-scheme" content="light only">
  <meta name="supported-color-schemes" content="light">

  <!-- ================== FAVICONS ================== -->
  <link rel="icon" href="{{ asset('logo.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">

  @stack('styles')
  <!-- =============
===== EARLY DARK MODE KILL (CRITICAL) ================== -->
  <style id="dark-mode-kill">
    html {
      color-scheme: light !important;
      -webkit-color-scheme: light !important;
    }

    @media (prefers-color-scheme: dark) {
      html, body {
        -webkit-filter: none !important;
        filter: none !important;
        forced-color-adjust: none !important;
      }
    }
  </style>

  <!-- ================== SAMSUNG BROWSER REINFORCEMENT ================== -->
  <script>
    (function () {
      var ua = navigator.userAgent || '';
      if (ua.indexOf('SamsungBrowser') !== -1) {
        document.documentElement.style.colorScheme = 'light';
        document.documentElement.style.setProperty('-webkit-color-scheme', 'light');
      }
    })();
  </script>

  <!-- ================== FONTS ================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

  <!-- ================== VENDOR CSS ================== -->
  <link rel="preload" href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}"></noscript>

  <link rel="preload" href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"></noscript>

  <link rel="preload" href="{{ asset('fe/assets/vendor/aos/aos.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/aos/aos.css') }}"></noscript>

  <link rel="preload" href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}"></noscript>

  <!-- ================== MAIN CSS ================== -->
  <link rel="preload"
        href="{{ asset('fe/assets/css/main.css') }}?v={{ filemtime(public_path('fe/assets/css/main.css')) }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet"
          href="{{ asset('fe/assets/css/main.css') }}?v={{ filemtime(public_path('fe/assets/css/main.css')) }}">
  </noscript>

  <!-- ================== PLUGINS ================== -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>

  <!-- Select2 -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- =======================================================
  Tobest Health care
  ======================================================== -->
</head>

<body class="starter-page-page">
    
<div id="samsung-dark-warning" style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    background:#ffcc00;
    color:#000;
    text-align:center;
    padding:12px 10px;
    font-family:Arial,sans-serif;
    z-index:9999;
    box-shadow:0 2px 6px rgba(0,0,0,0.2);
    transform: translateY(-100%);
    transition: transform 0.4s ease;
">
    ⚠️ This website does not support your browser's enhanced dark mode. For the best experience, please turn off Samsung's system dark mode or switch to a different browser.
    <button id="close-samsung-warning" style="
        margin-left:10px;
        background:#000;
        color:#fff;
        border:none;
        padding:2px 8px;
        border-radius:3px;
        cursor:pointer;
        font-size:12px;
    ">Dismiss</button>
</div>

<script>
/*
 * Samsung Browser Forced Dark Mode Warning
 * Samsung does NOT expose forced dark mode to JS
 * So we warn unconditionally on Samsung Browser
 */
(function () {
    var ua = navigator.userAgent || '';

    // Detect Samsung Browser
    if (ua.indexOf('SamsungBrowser') !== -1) {
        var warning = document.getElementById('samsung-dark-warning');
        if (!warning) return;

        warning.style.display = 'block';

        // Slide-down animation
        setTimeout(function () {
            warning.style.transform = 'translateY(0)';
        }, 50);

        // Dismiss button (temporary per page load)
        var closeBtn = document.getElementById('close-samsung-warning');
        closeBtn.addEventListener('click', function () {
            warning.style.transform = 'translateY(-100%)';
            setTimeout(function () {
                warning.style.display = 'none';
            }, 400);
        });
    }
})();
</script>



  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center logo-wrapper">
    <img src="{{ asset('logo.png') }}" alt="site logo" class="logo-img">
</a>


      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/jobs">Jobs</a></li>
          <li><a href="/services">Services</a></li>
        
          <li><a href="/contact">Contact</a></li>
                    <li class="dropdown"><a href="#"><span>Register</span>
                       <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('register.nurse') }}">Nurses</a></li>
              <li><a href="{{ route('register.hca') }}">Healthworkers</a></li>

            </ul>
          </li>
          

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>


  <main class="main">
@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

    <!-- Page Title -->
@yield('content')  

  </main>


@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: @json(session('success')),
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: @json(session('error')),
    });
</script>
@endif

    <footer id="footer" class="footer accent-background">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-about">
         <a href="/" class="logo d-flex align-items-center logo-wrapper">
    <img src="{{ asset('logo.png') }}" alt="site logo" class="logo-img">
</a>
        <p>
          ToBest Health Care Solutions is committed to providing compassionate, reliable, and professional healthcare staffing and support services tailored to individuals, families, and healthcare providers.
        </p>
        <div class="social-links d-flex mt-4">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><a href="#">Healthcare Staffing</a></li>
          <li><a href="#">Home Care Support</a></li>
          <li><a href="#">Hospital Assistance</a></li>
          <li><a href="#">Caregiver Placement</a></li>
          <li><a href="#">24/7 Care Services</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
  <h4>Contact Us</h4>

  <p><strong>ToBest Health Care Solutions</strong></p>

  <p>
    <strong>UK HQ:</strong><br>
    45-47 Norman Street,<br>
    Huddersfield,<br>
    HD2 2UE,<br>
    United Kingdom
  </p>

  <p class="mt-3">
    <strong>Nigeria (Aba Branch):</strong><br>
    Aba, Abia State,<br>
    Nigeria
  </p>

  <p class="mt-4">
    <strong>Phone:</strong><br>
    <span>0330 133 1162</span>
  </p>

  <p>
    <strong>Email:</strong><br>
    <span>info@tobesthealthcaresolutions.co.uk</span>
  </p>
</div>


    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>
      ┬й <span>Copyright</span>
      <strong class="px-1 sitename">ToBest Health Care Solutions</strong>
      <span>All Rights Reserved</span>
    </p>

  </div>

</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

<script>
/* ЁЯЫбя╕П Final Samsung Browser safety net */
document.documentElement.style.setProperty('color-scheme', 'light');
document.documentElement.style.setProperty('-webkit-color-scheme', 'light');
</script>

<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Any",
        allowClear: true,
        width: 'resolve'
    });
});
</script>

@stack('scripts')
  <!-- Vendor JS Files -->
  <script src="{{ asset('fe/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('fe/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('fe/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('fe/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('fe/assets/js/main.js')}}"></script>

</body>

</html>