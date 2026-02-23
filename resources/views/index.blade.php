<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ================== CORE META ================== -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index - Tobest Health care</title>
  <meta name="description" content="TobestHealthcare exists for job recruitment">
  <meta name="keywords" content="">

  <!-- 🚫 HARD DISABLE DARK MODE (ALL BROWSERS) -->
  <meta name="color-scheme" content="light only">
  <meta name="supported-color-schemes" content="light">

  <!-- ================== FAVICONS ================== -->
  <link rel="icon" href="{{ asset('logo.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">

  <!-- ================== EARLY DARK-MODE KILL (CRITICAL) ================== -->
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

  <!-- ================== SAMSUNG BROWSER DETECTION ================== -->
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

  <!-- ================== VENDOR CSS (CACHE-SAFE) ================== -->
  <link rel="preload"
        href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}"></noscript>

  <link rel="preload"
        href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"></noscript>

  <link rel="preload"
        href="{{ asset('fe/assets/vendor/aos/aos.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/aos/aos.css') }}"></noscript>

  <link rel="preload"
        href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}"></noscript>

  <!-- ================== MAIN CSS (CACHE-BUSTED) ================== -->
  <link rel="preload"
        href="{{ asset('fe/assets/css/main.css') }}?v={{ filemtime(public_path('fe/assets/css/main.css')) }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet"
          href="{{ asset('fe/assets/css/main.css') }}?v={{ filemtime(public_path('fe/assets/css/main.css')) }}">
  </noscript>

  <!-- ================== JS DEPENDENCIES ================== -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function () {
      $('.select2').select2({
        placeholder: "Any",
        tags: true,
        tokenSeparators: [','],
        width: 'resolve',
        allowClear: true
      });
    });
  </script>

  <!-- =======================================================
  Tobest Health care
  ======================================================== -->
</head>

<style>
.autocomplete-suggestions {
    border: 1px solid #ccc;
    max-height: 200px;
    overflow-y: auto;
    position: absolute;
    background: #fff;
    z-index: 9999;
    width: 100%;
}
.autocomplete-suggestion {
    padding: 8px;
    cursor: pointer;
}
.autocomplete-suggestion:hover {
    background-color: #f0f0f0;
}
</style>

<body class="index-page">
    <!-- Samsung Dark Mode Warning -->
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

<script>
/*
 * Forced Dark Mode Warning
 * Shows every visit if dark mode is active
 * Best placed immediately after <body>
 */
(function () {
    var ua = navigator.userAgent || '';
    var isSamsung = ua.indexOf('SamsungBrowser') !== -1;

    // Detect system/browser dark mode
    var darkModeActive =
        window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches;

    // Show warning if:
    // 1. Dark mode is active
    // 2. Browser is Samsung OR clearly forcing dark mode
    if (darkModeActive && isSamsung) {
        var warning = document.getElementById('samsung-dark-warning');
        if (!warning) return;

        warning.style.display = 'block';

        // Slide-down animation
        setTimeout(function () {
            warning.style.transform = 'translateY(0)';
        }, 50);

        // Dismiss button (temporary only)
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


<!-- Hero Section -->
<section id="hero" class="hero section py-5">
  <div class="container">
    <div class="row align-items-center g-5">

      <!-- LEFT: Content (STATIC) -->
      <div class="col-lg-6" data-aos="fade-up">
        <span class="hero-label mb-3 d-inline-block">
          <i class="bi bi-house-heart"></i> Trusted Care Staffing
        </span>

        <h1 class="fw-bold display-6 mb-3">
          Reliable Healthcare Professionals<br>
          When You Need Them Most
        </h1>

        <p class="lead text-muted mb-4">
          Tobest Healthcare Solutions connects care homes, hospitals, and private clients with
          compassionate, fully vetted healthcare professionals.
        </p>

        <div class="d-flex gap-4 mt-4">
          <div>
            <h3 class="fw-bold mb-0">250+</h3>
            <small class="text-muted">Healthcare Professionals</small>
          </div>
          <div>
            <h3 class="fw-bold mb-0">40+</h3>
            <small class="text-muted">Care Partners</small>
          </div>
          <div>
            <h3 class="fw-bold mb-0">98%</h3>
            <small class="text-muted">Client Satisfaction</small>
          </div>
        </div>
      </div>

      <!-- RIGHT: IMAGE SLIDER (ONLY IMAGES) -->
      <div class="col-lg-6" data-aos="fade-left">
        <div id="heroImageCarousel" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner rounded-4 shadow-sm overflow-hidden">

            <div class="carousel-item active">
              <img src="{{ asset('fe/assets/img/healthcare/image1.jpg') }}"
                   class="d-block w-100 hero-img"
                   alt="Healthcare Staffing">
            </div>

            <div class="carousel-item">
              <img src="{{ asset('fe/assets/img/healthcare/imagelaptop.jpg') }}"
                   class="d-block w-100 hero-img"
                   alt="Care Environment">
            </div>

            <div class="carousel-item">
              <img src="{{ asset('fe/assets/img/healthcare/images.jpg') }}"
                   class="d-block w-100 hero-img"
                   alt="Professional Care">
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</section>


<section class="search-section py-5 bg-light">
  <div class="container">
    <div class="search-container job-search">

      <div class="search-header text-center mb-4">
        <h3>Hire Staff or Find Care Jobs</h3>
        <p>Whether you are a care provider or a healthcare professional, we are here to help</p>
      </div>
<form method="GET" action="{{ route('user.jobs.index') }}" class="property-search-form">

  <div class="search-grid">

    {{-- Purpose --}}
    <div class="search-field">
      <label class="field-label">I am looking to</label>
      <select name="purpose" required>
        <option value="">Select</option>
        <option value="job">Find a Care Job</option>
        <option value="hire">Hire Healthcare Staff</option>
      </select>
    </div>

<div class="search-field">
    <label class="field-label">Location</label>
    <input type="text" id="location-input" name="location" placeholder="Type a location..." value="{{ request('location') }}" autocomplete="off" class="form-control">
    <div id="location-suggestions" class="autocomplete-suggestions"></div>
</div>


    {{-- Role --}}
    <div class="search-field">
      <label class="field-label">Role</label>
      <select name="role_id">
        <option value="">Any</option>
        @foreach($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </select>
    </div>

    {{-- Service Type --}}
    <div class="search-field">
      <label class="field-label">Service Type</label>
      <select name="service_type_id">
        <option value="">Any</option>
        @foreach($serviceTypes as $type)
          <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
      </select>
    </div>

    {{-- Care Setting --}}
    <div class="search-field">
      <label class="field-label">Care Setting</label>
      <select name="care_setting_id">
        <option value="">Any</option>
        @foreach($careSettings as $setting)
          <option value="{{ $setting->id }}">{{ $setting->name }}</option>
        @endforeach
      </select>
    </div>

  </div>

  <button type="submit" class="search-btn">
    <i class="bi bi-search"></i>
    Search Opportunities
  </button>

</form>
    </div>

  </div>
</section>


<!-- Home About Section -->
<section id="home-about" class="home-about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
        <div class="image-gallery">
          <div class="primary-image">
            <img src="{{ asset('fe/assets/img/healthcare/workers.jpeg') }}" alt="Healthcare Professionals" class="img-fluid">
            <div class="experience-badge">
              <div class="badge-content">
                <div class="number">
                  <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>+
                </div>
                <div class="text">Years<br>Clinical Experience</div>
              </div>
            </div>
          </div>
          <div class="secondary-image">
            <img src="{{asset('fe/assets/img/healthcare/quality-care.jpg')}}" alt="Quality Care" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
        <div class="content">
          <div class="section-header">
            <span class="section-label">About Tobest</span>
            <h2>Nurse-Led Healthcare Recruitment Built on Experience</h2>
          </div>

          <p>
            Tobest Healthcare Solutions was founded by a Registered Nurse with extensive frontline experience.
            We understand the realities of care delivery and the importance of placing skilled, compassionate
            professionals in the right environments.
          </p>

          <div class="achievements-list">
            <div class="achievement-item">
              <div class="achievement-icon">
                <i class="bi bi-house-door"></i>
              </div>
              <div class="achievement-content">
                <h4>
                  <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="2" class="purecounter"></span>+
                  Shifts Covered
                </h4>
                <p>Reliable staffing delivered with care</p>
              </div>
            </div>
            <div class="achievement-item">
              <div class="achievement-icon">
                <i class="bi bi-people"></i>
              </div>
              <div class="achievement-content">
                <h4>
                  <span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="1" class="purecounter"></span>%
                  Client Satisfaction
                </h4>
                <p>Trusted partnerships across the care sector</p>
              </div>
            </div>
          </div>

          <div class="action-section">
            <a href="/about" class="btn-cta">
              <span>Discover Our Story</span>
              <i class="bi bi-arrow-right"></i>
            </a>
            <div class="contact-info">
              <div class="contact-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="contact-details">
                <span>Contact us today</span>
                <strong>info@tobesthealthcaresolutions.co.uk</strong>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Home About Section -->



<section id="featured-services" class="featured-services section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Our Healthcare Services</h2>
    <p>Professional staffing solutions designed to support quality care delivery</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">

      {{-- Care & Support --}}
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="service-card icon-card">
          <div class="service-icon-xl bg-primary-soft">
            <i class="bi bi-people-fill"></i>
          </div>

          <div class="service-info">
            <h3>Care & Support Staffing</h3>
            <p>
              Reliable care assistants and support workers carefully matched to your care environment.
            </p>

            <ul class="service-highlights">
              <li><i class="bi bi-check-circle-fill"></i> Fully Vetted Staff</li>
              <li><i class="bi bi-check-circle-fill"></i> Flexible Cover</li>
              <li><i class="bi bi-check-circle-fill"></i> Person-Centred Care</li>
            </ul>

            <a href="/services" class="service-link">
              <span>Learn More</span>
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Nursing --}}
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="service-card icon-card">
          <div class="service-icon-xl bg-danger-soft">
            <i class="bi bi-heart-pulse-fill"></i>
          </div>

          <div class="service-info">
            <h3>Nursing & Clinical Cover</h3>
            <p>
              Experienced nurses and clinicians providing safe, compliant clinical support.
            </p>

            <ul class="service-highlights">
              <li><i class="bi bi-check-circle-fill"></i> Registered Professionals</li>
              <li><i class="bi bi-check-circle-fill"></i> Emergency & Long-Term Cover</li>
              <li><i class="bi bi-check-circle-fill"></i> Nurse-Led Oversight</li>
            </ul>

            <a href="/services" class="service-link">
              <span>Learn More</span>
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="600">
      <a href="/services" class="btn btn-primary px-4 py-2 rounded-pill">
        View All Services <i class="bi bi-arrow-right ms-1"></i>
      </a>
    </div>
  </div>

</section>

@if($featuredStaff->count() > 0)
<section id="featured-agents" class="featured-agents section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Healthcare Workers</h2>
    <p>Experienced, compassionate professionals ready to support your care needs</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">

      @foreach($featuredStaff as $index => $staff)
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
          <div class="featured-agent">
            <div class="agent-wrapper">
              <div class="agent-photo">
                <img src="{{ $staff->photo ? asset('storage/'.$staff->photo) : asset('fe/assets/img/healthcare/default.webp') }}"
                     alt="{{ $staff->full_name }}"
                     class="img-fluid">

                @if($staff->years_of_experience >= 10)
                    <span class="achievement-badge veteran">Veteran</span>
                @elseif($staff->years_of_experience >= 5)
                    <span class="achievement-badge expert">Expert</span>
                @else
                    <span class="achievement-badge rising">Rising</span>
                @endif
              </div>

              <div class="agent-details">
                <h4>{{ $staff->full_name }}</h4>
                <span class="position">{{ $staff->role }}</span>

                <div class="location-info">
                  <i class="bi bi-briefcase-fill"></i>
                  <span>{{ $staff->care_specialty ?? 'Healthcare Professional' }}</span>
                </div>

                @if(!empty($staff->skills))
                <div class="expertise-tags">
                    @foreach(array_slice($staff->skills, 0, 2) as $skill)
                        <span class="tag">{{ $skill }}</span>
                    @endforeach
                </div>
                @endif

                <a href="{{ route('staff.apply', $staff->id) }}" class="view-profile">
                    Hire Them
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>

</section>
@endif

@if ($featuredOffers->count() > 0)
  
<section id="job-postings" class="job-postings section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Job Postings</h2>
    <p>Current healthcare opportunities available through Tobest Healthcare Solutions</p>
  </div>

  <div class="container">
    <div class="row gy-4">

      @foreach($featuredOffers as $offer)
        <div class="col-lg-6" data-aos="fade-up">
          <div class="job-card">

            <div class="job-header">
              <span class="job-badge onsite">
                {{ $offer->serviceType->name ?? 'On-site' }}
              </span>

              <span class="job-salary">
                £{{ $offer->salary_range ?? 'Competitive' }}
              </span>
            </div>

            <h3 class="job-title">
              {{ $offer->title }}
            </h3>

            <p class="job-role">
              {{ $offer->careSetting->name ?? 'Healthcare Setting' }}
            </p>

            <ul class="job-details">
              <li><strong>Work Site:</strong> {{ $offer->serviceType->name ?? '—' }}</li>
              <li><strong>Contract:</strong> Agency / Permanent</li>
              <li><strong>Location:</strong> {{ $offer->location }}</li>
            </ul>

            <p class="job-description">
              {{ Str::limit(strip_tags($offer->description), 180) }}
            </p>

            <a href="{{ route('jobs.show', $offer->id) }}" class="job-cta">
              Apply for this role
            </a>

          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>
@endif

<!-- Why Us Section -->
<section id="why-us" class="why-us section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Why ToBest Health Care Solutions</h2>
    <p>Compassion-driven healthcare staffing and support you can trust</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="content">
          <h3>Why Choose ToBest Health Care Solutions?</h3>
          <p>
            We provide reliable, qualified, and compassionate healthcare professionals tailored to the unique needs of hospitals, care homes, and individuals. Our focus is simple: quality care, ethical staffing, and dependable support.
          </p>

          <div class="features-list">
            <div class="feature-item d-flex align-items-center mb-3">
              <div class="icon-wrapper me-3">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <div>
                <h5>Qualified Healthcare Professionals</h5>
                <p>Carefully screened nurses, caregivers, and support staff committed to excellence.</p>
              </div>
            </div>

            <div class="feature-item d-flex align-items-center mb-3">
              <div class="icon-wrapper me-3">
                <i class="bi bi-shield-check"></i>
              </div>
              <div>
                <h5>Compliance & Safety First</h5>
                <p>Strict adherence to healthcare standards, safeguarding policies, and best practices.</p>
              </div>
            </div>

            <div class="feature-item d-flex align-items-center mb-3">
              <div class="icon-wrapper me-3">
                <i class="bi bi-headset"></i>
              </div>
              <div>
                <h5>24/7 Staffing Support</h5>
                <p>Round-the-clock availability to respond to urgent staffing and care needs.</p>
              </div>
            </div>

            <div class="feature-item d-flex align-items-center mb-3">
              <div class="icon-wrapper me-3">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <div>
                <h5>Reliable & Responsive Service</h5>
                <p>Consistent delivery, fast placements, and ongoing support for long-term partnerships.</p>
              </div>
            </div>
          </div>

          <div class="cta-buttons mt-4">
            <a href="/about" class="btn btn-primary me-3">Learn More About Us</a>
            <a href="/contact" class="btn btn-outline-primary">Request Staffing Support</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="stats-section">
          <div class="row gy-4">
            <div class="col-md-6">
              <div class="stat-card text-center">
                <div class="stat-icon mb-3">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <div class="stat-number">
                  <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="2" class="purecounter"></span>+
                </div>
                <div class="stat-label">Patients Supported</div>
                <p>Providing compassionate care across homes, clinics, and facilities.</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="stat-card text-center">
                <div class="stat-icon mb-3">
                  <i class="bi bi-people"></i>
                </div>
                <div class="stat-number">
                  <span data-purecounter-start="0" data-purecounter-end="95" data-purecounter-duration="2" class="purecounter"></span>%
                </div>
                <div class="stat-label">Client Satisfaction</div>
                <p>Trusted by healthcare providers and families we serve.</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="stat-card text-center">
                <div class="stat-icon mb-3">
                  <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-number">
                  <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2" class="purecounter"></span>+
                </div>
                <div class="stat-label">Years Experience</div>
                <p>Years of hands-on experience in healthcare staffing and care delivery.</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="stat-card text-center">
                <div class="stat-icon mb-3">
                  <i class="bi bi-award"></i>
                </div>
                <div class="stat-number">
                  <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="2" class="purecounter"></span>+
                </div>
                <div class="stat-label">Care Professionals</div>
                <p>A growing team of trained and dedicated healthcare staff.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-preview mt-5">
            <div class="testimonial-card">
              <div class="quote-icon mb-2">
                <i class="bi bi-quote"></i>
              </div>
              <p>
                "ToBest Health Care Solutions provided compassionate and reliable caregivers when our family needed support the most. Their professionalism gave us peace of mind."
              </p>
              <div class="testimonial-author d-flex align-items-center mt-3">
                <img src="{{ asset('fe/assets/img/person/person-f-3.webp')}}" alt="Client" class="author-image me-3">
                <div>
                  <h6>Client Testimonial</h6>
                  <span>Family Care Support</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Why Us Section -->

<!-- Call To Action Section -->
<section class="call-to-action-1 call-to-action section" id="call-to-action">
  <div class="cta-bg" style="background-image: url('assets/img/healthcare/healthcare-bg.webp');"></div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8">

        <div class="cta-content text-center">
          <h2>Need Reliable Healthcare Support?</h2>
          <p>
            Whether you need qualified staff or compassionate care solutions, ToBest Health Care Solutions is ready to support you with professionalism and empathy.
          </p>

          <div class="cta-buttons">
            <a href="/contact" class="btn btn-primary">Get in Touch</a>
            <a href="/contact" class="btn btn-outline">Request a Consultation</a>
          </div>

          <div class="cta-features">
            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-telephone-fill"></i>
              <span>Free Consultation</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="250">
              <i class="bi bi-clock-fill"></i>
              <span>24/7 Availability</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-shield-check-fill"></i>
              <span>Trusted Care</span>
            </div>
          </div>

        </div><!-- End CTA Content -->

      </div>
    </div>

  </div>
</section><!-- /Call To Action Section -->


  </main>

  <footer id="footer" class="footer accent-background">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-about">
        <a href="/" class="logo d-flex align-items-center">
          <span class="sitename">ToBest Health Care Solutions</span>
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
    45–47 Norman Street,<br>
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
      © <span>Copyright</span>
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
/* 🛡️ Final Samsung Browser safety net */
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    const locations = @json($locations); // Laravel array of locations
    const input = document.getElementById('location-input');
    const suggestionBox = document.getElementById('location-suggestions');

    input.addEventListener('input', function() {
        const value = this.value.toLowerCase();
        suggestionBox.innerHTML = '';
        if (!value) return;

        const filtered = locations.filter(city => city.toLowerCase().includes(value));
        filtered.forEach(city => {
            const div = document.createElement('div');
            div.classList.add('autocomplete-suggestion');
            div.textContent = city;
            div.addEventListener('click', function() {
                input.value = city;
                suggestionBox.innerHTML = '';
            });
            suggestionBox.appendChild(div);
        });
    });

    // Close suggestions if clicked outside
    document.addEventListener('click', function(e) {
        if (e.target !== input) {
            suggestionBox.innerHTML = '';
        }
    });
});
</script>


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