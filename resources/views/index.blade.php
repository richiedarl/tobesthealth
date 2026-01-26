<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Tobest Health care</title>
  <meta name="description" content="TobestHealthcare exists for job recruitment">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('logo.png')}}" rel="icon">
  <link href="{{ asset('logo.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('fe/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('fe/assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
Tobest Health care
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{ asset('logo.png') }}" style="width: 100px; height: auto;"m alt="site logo">
        {{-- <svg class="my-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="bgCarrier" stroke-width="0"></g>
          <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="iconCarrier">
            <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M4 22V9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M20 9.5V13.5M20 22V17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z" stroke="currentColor" stroke-width="1.5"></path>
          </g>
        </svg> --}}
        {{-- <h1 class="sitename">ToBestHealthcare</h1> --}}
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="properties.html">Jobs</a></li>
          <li><a href="services.html">Services</a></li>
        
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

 <!-- Hero Section -->
<section id="hero" class="hero section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="hero-wrapper">
      <div class="row g-4">

        <div class="col-lg-7">
          <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
            <div class="content-header">
              <span class="hero-label">
                <i class="bi bi-house-heart"></i>
                Trusted Care Staffing
              </span>
              <h1>Reliable Healthcare Professionals When You Need Them Most</h1>
              <p>
                Tobest Healthcare Solutions connects care homes, hospitals, and private clients with compassionate,
                fully vetted healthcare professionals. Nurse-led recruitment you can trust.
              </p>
            </div>

            <div class="search-container" data-aos="fade-up" data-aos-delay="300">
  <div class="search-header">
    <h3>Hire Staff or Find Care Jobs</h3>
    <p>Whether you are a care provider or a healthcare professional, we are here to help</p>
  </div>

  <form action="" class="property-search-form">

    <!-- Audience Selector -->
    <div class="search-grid">
      <div class="search-field">
        <label for="search-purpose" class="field-label">I am looking to</label>
        <select id="search-purpose" name="purpose" required>
          <option value="">Select an option</option>
          <option value="hire">Hire Healthcare Staff</option>
          <option value="job">Find a Care Job</option>
        </select>
        <i class="bi bi-people field-icon"></i>
      </div>

      <div class="search-field">
        <label for="search-location" class="field-label">Location</label>
        <input
          type="text"
          id="search-location"
          name="location"
          placeholder="Enter city or care setting"
          required
        >
        <i class="bi bi-geo-alt field-icon"></i>
      </div>

      <div class="search-field">
        <label for="search-role" class="field-label">Role / Staff Type</label>
        <select id="search-role" name="role" required>
          <option value="">All Roles</option>
          <option value="care-assistant">Care Assistant</option>
          <option value="support-worker">Support Worker</option>
          <option value="nurse">Registered Nurse</option>
          <option value="doctor">Doctor</option>
        </select>
        <i class="bi bi-briefcase field-icon"></i>
      </div>

      <div class="search-field">
        <label for="search-service" class="field-label">Service / Employment Type</label>
        <select id="search-service" name="service_type">
          <option value="">Any</option>
          <option value="temporary">Temporary</option>
          <option value="permanent">Permanent</option>
          <option value="night">Night Shifts</option>
          <option value="day">Day Shifts</option>
          <option value="emergency">Emergency Cover</option>
        </select>
        <i class="bi bi-clock field-icon"></i>
      </div>

      <div class="search-field">
        <label for="search-setting" class="field-label">Care Setting</label>
        <select id="search-setting" name="care_setting">
          <option value="">Any</option>
          <option value="care-home">Care Home</option>
          <option value="hospital">Hospital</option>
          <option value="residential">Residential Home</option>
          <option value="home-care">Client’s Own Home</option>
        </select>
        <i class="bi bi-house-heart field-icon"></i>
      </div>
    </div>

    <button type="submit" class="search-btn">
      <i class="bi bi-search"></i>
      <span>Search Opportunities</span>
    </button>
  </form>
</div>


            <div class="achievement-grid" data-aos="fade-up" data-aos-delay="400">
              <div class="achievement-item">
                <div class="achievement-number">
                  <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>+
                </div>
                <span class="achievement-text">Healthcare Professionals</span>
              </div>
              <div class="achievement-item">
                <div class="achievement-number">
                  <span data-purecounter-start="0" data-purecounter-end="40" data-purecounter-duration="1" class="purecounter"></span>+
                </div>
                <span class="achievement-text">Care Partners</span>
              </div>
              <div class="achievement-item">
                <div class="achievement-number">
                  <span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="1" class="purecounter"></span>%
                </div>
                <span class="achievement-text">Client Satisfaction</span>
              </div>
            </div>
          </div>
        </div><!-- End Hero Content -->

        <div class="col-lg-5">
          <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
            <div class="visual-container">
              <div class="featured-property">
                <img src="{{ asset('fe/assets/img/healthcare/image1.jpg') }}" alt="Healthcare Staffing" class="img-fluid">
                <div class="property-info">
                  <div class="property-price">24/7 Staff Availability</div>
                  <div class="property-details">
                    <span><i class="bi bi-geo-alt"></i> Nationwide Coverage</span>
                    <span><i class="bi bi-house"></i> Hospitals & Care Homes</span>
                  </div>
                </div>
              </div>

              <div class="overlay-images">
                <div class="overlay-img overlay-1">
                  <img src="{{ asset('fe/assets/img/healthcare/imagelaptop.jpg') }}" alt="Care Environment" class="img-fluid">
                </div>
                <div class="overlay-img overlay-2">
                  <img src="{{ asset('fe/assets/img/healthcare/images.jpg') }}" alt="Professional Care" class="img-fluid">
                </div>
              </div>

              <div class="agent-card">
                <div class="agent-profile">
                  <img src="{{ asset('fe/assets/img/healthcare/agent-7.webp')}}" alt="Care Consultant" class="agent-photo">
                  <div class="agent-info">
                    <h4>Senior Care Consultant</h4>
                    <p>Nurse-Led Recruitment</p>
                    <div class="agent-rating">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <span class="rating-text">Trusted by Care Providers</span>
                    </div>
                  </div>
                </div>
                <button class="contact-agent-btn">
                  <i class="bi bi-chat-dots"></i>
                </button>
              </div>
            </div>
          </div>
        </div><!-- End Hero Visual -->

      </div>
    </div>

  </div>

</section><!-- /Hero Section -->

<!-- Home About Section -->
<section id="home-about" class="home-about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
        <div class="image-gallery">
          <div class="primary-image">
            <img src="assets/img/real-estate/property-exterior-1.webp" alt="Healthcare Professionals" class="img-fluid">
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
            <img src="assets/img/real-estate/property-interior-4.webp" alt="Quality Care" class="img-fluid">
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
            <a href="about.html" class="btn-cta">
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

   <!-- Featured Staffing Section -->
<section id="featured-properties" class="featured-properties section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Care Solutions</h2>
    <p>Reliable, compassionate healthcare professionals matched to the right care environments</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      <div class="col-lg-8">

        <div class="featured-property-main" data-aos="zoom-in" data-aos-delay="200">
          <div class="property-hero">
            <img src="assets/img/healthcare/care-team.webp" alt="Healthcare Staffing" class="img-fluid">
            <div class="property-overlay">
              <div class="property-badge-main premium">Nurse-Led</div>
              <div class="property-stats">
                <div class="stat-item">
                  <i class="bi bi-heart-pulse"></i>
                  <span>Qualified Staff</span>
                </div>
                <div class="stat-item">
                  <i class="bi bi-clock-fill"></i>
                  <span>24/7 Coverage</span>
                </div>
                <div class="stat-item">
                  <i class="bi bi-shield-check"></i>
                  <span>Fully Vetted</span>
                </div>
              </div>
            </div>
          </div>
          <div class="property-hero-content">
            <div class="property-header">
              <div class="property-info">
                <h2><a href="#">Comprehensive Healthcare Staffing</a></h2>
                <div class="property-address">
                  <i class="bi bi-geo-alt-fill"></i>
                  <span>Care Homes, Hospitals & Home Care</span>
                </div>
              </div>
              <div class="property-price-main">UK-Wide</div>
            </div>
            <p class="property-description">
              Nurse-led recruitment delivering dependable care assistants, nurses, and doctors to support
              safe, dignified, and high-quality care across all settings.
            </p>
            <div class="property-actions-main">
              <a href="contact.html" class="btn-primary-custom">Request Staff</a>
              <a href="services.html" class="btn-outline-custom">Our Services</a>
              <div class="property-listing-info">
                <span class="listing-status for-sale">Available Now</span>
                <span class="listing-date">Fast Placement</span>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="properties-sidebar">

          <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="300">
            <div class="sidebar-property-image">
              <img src="assets/img/healthcare/support-workers.webp" alt="Support Workers" class="img-fluid">
              <div class="sidebar-property-badge hot">In Demand</div>
            </div>
            <div class="sidebar-property-content">
              <h4><a href="#">Care Assistants & Support Workers</a></h4>
              <div class="sidebar-location">
                <i class="bi bi-hospital"></i>
                <span>Residential & Home Care</span>
              </div>
              <div class="sidebar-specs">
                <span><i class="bi bi-check2-circle"></i> Trained</span>
                <span><i class="bi bi-check2-circle"></i> Compassionate</span>
                <span><i class="bi bi-check2-circle"></i> Reliable</span>
              </div>
              <div class="sidebar-price-row">
                <div class="sidebar-price">Flexible Cover</div>
                <a href="contact.html" class="sidebar-btn">Enquire</a>
              </div>
            </div>
          </div>

          <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="400">
            <div class="sidebar-property-image">
              <img src="assets/img/healthcare/nurses.webp" alt="Registered Nurses" class="img-fluid">
              <div class="sidebar-property-badge new">Trusted</div>
            </div>
            <div class="sidebar-property-content">
              <h4><a href="#">Registered Nurses & Doctors</a></h4>
              <div class="sidebar-location">
                <i class="bi bi-clipboard2-pulse"></i>
                <span>Hospitals & Clinical Settings</span>
              </div>
              <div class="sidebar-specs">
                <span><i class="bi bi-award"></i> Experienced</span>
                <span><i class="bi bi-shield"></i> Compliant</span>
                <span><i class="bi bi-people"></i> Patient-Focused</span>
              </div>
              <div class="sidebar-price-row">
                <div class="sidebar-price">On-Demand</div>
                <a href="contact.html" class="sidebar-btn">Enquire</a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</section>

<!-- Featured Services Section -->
<section id="featured-services" class="featured-services section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Our Healthcare Services</h2>
    <p>Professional staffing solutions designed to support quality care delivery</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4">

      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-person-check"></i>
          </div>
          <div class="service-info">
            <h3><a href="#">Care & Support Staffing</a></h3>
            <p>Reliable care assistants and support workers carefully matched to your care environment.</p>
            <ul class="service-highlights">
              <li><i class="bi bi-check-circle-fill"></i> Fully Vetted Staff</li>
              <li><i class="bi bi-check-circle-fill"></i> Flexible Cover</li>
              <li><i class="bi bi-check-circle-fill"></i> Person-Centred Care</li>
            </ul>
            <a href="services.html" class="service-link">
              <span>Learn More</span>
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
          <div class="service-visual">
            <img src="assets/img/healthcare/care-home.webp" class="img-fluid" alt="Care Staffing" loading="lazy">
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-heart-pulse-fill"></i>
          </div>
          <div class="service-info">
            <h3><a href="#">Nursing & Clinical Cover</a></h3>
            <p>Experienced nurses and doctors providing safe, compliant, and professional clinical support.</p>
            <ul class="service-highlights">
              <li><i class="bi bi-check-circle-fill"></i> Registered Professionals</li>
              <li><i class="bi bi-check-circle-fill"></i> Emergency & Long-Term Cover</li>
              <li><i class="bi bi-check-circle-fill"></i> Nurse-Led Oversight</li>
            </ul>
            <a href="services.html" class="service-link">
              <span>Learn More</span>
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
          <div class="service-visual">
            <img src="assets/img/healthcare/hospital-team.webp" class="img-fluid" alt="Nursing Services" loading="lazy">
          </div>
        </div>
      </div>

    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="600">
      <a href="services.html" class="btn-view-all">
        <span>View All Services</span>
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>

</section>

    <!-- Featured Services Section -->
    <!-- Featured Staffing Section -->
<section id="featured-properties" class="featured-properties section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Care Solutions</h2>
    <p>Reliable, compassionate healthcare professionals matched to the right care environments</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      <div class="col-lg-8">

        <div class="featured-property-main" data-aos="zoom-in" data-aos-delay="200">
          <div class="property-hero">
            <img src="assets/img/healthcare/care-team.webp" alt="Healthcare Staffing" class="img-fluid">
            <div class="property-overlay">
              <div class="property-badge-main premium">Nurse-Led</div>
              <div class="property-stats">
                <div class="stat-item">
                  <i class="bi bi-heart-pulse"></i>
                  <span>Qualified Staff</span>
                </div>
                <div class="stat-item">
                  <i class="bi bi-clock-fill"></i>
                  <span>24/7 Coverage</span>
                </div>
                <div class="stat-item">
                  <i class="bi bi-shield-check"></i>
                  <span>Fully Vetted</span>
                </div>
              </div>
            </div>
          </div>
          <div class="property-hero-content">
            <div class="property-header">
              <div class="property-info">
                <h2><a href="#">Comprehensive Healthcare Staffing</a></h2>
                <div class="property-address">
                  <i class="bi bi-geo-alt-fill"></i>
                  <span>Care Homes, Hospitals & Home Care</span>
                </div>
              </div>
              <div class="property-price-main">UK-Wide</div>
            </div>
            <p class="property-description">
              Nurse-led recruitment delivering dependable care assistants, nurses, and doctors to support
              safe, dignified, and high-quality care across all settings.
            </p>
            <div class="property-actions-main">
              <a href="contact.html" class="btn-primary-custom">Request Staff</a>
              <a href="services.html" class="btn-outline-custom">Our Services</a>
              <div class="property-listing-info">
                <span class="listing-status for-sale">Available Now</span>
                <span class="listing-date">Fast Placement</span>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="properties-sidebar">

          <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="300">
            <div class="sidebar-property-image">
              <img src="assets/img/healthcare/support-workers.webp" alt="Support Workers" class="img-fluid">
              <div class="sidebar-property-badge hot">In Demand</div>
            </div>
            <div class="sidebar-property-content">
              <h4><a href="#">Care Assistants & Support Workers</a></h4>
              <div class="sidebar-location">
                <i class="bi bi-hospital"></i>
                <span>Residential & Home Care</span>
              </div>
              <div class="sidebar-specs">
                <span><i class="bi bi-check2-circle"></i> Trained</span>
                <span><i class="bi bi-check2-circle"></i> Compassionate</span>
                <span><i class="bi bi-check2-circle"></i> Reliable</span>
              </div>
              <div class="sidebar-price-row">
                <div class="sidebar-price">Flexible Cover</div>
                <a href="contact.html" class="sidebar-btn">Enquire</a>
              </div>
            </div>
          </div>

          <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="400">
            <div class="sidebar-property-image">
              <img src="assets/img/healthcare/nurses.webp" alt="Registered Nurses" class="img-fluid">
              <div class="sidebar-property-badge new">Trusted</div>
            </div>
            <div class="sidebar-property-content">
              <h4><a href="#">Registered Nurses & Doctors</a></h4>
              <div class="sidebar-location">
                <i class="bi bi-clipboard2-pulse"></i>
                <span>Hospitals & Clinical Settings</span>
              </div>
              <div class="sidebar-specs">
                <span><i class="bi bi-award"></i> Experienced</span>
                <span><i class="bi bi-shield"></i> Compliant</span>
                <span><i class="bi bi-people"></i> Patient-Focused</span>
              </div>
              <div class="sidebar-price-row">
                <div class="sidebar-price">On-Demand</div>
                <a href="contact.html" class="sidebar-btn">Enquire</a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</section>

<!-- Featured Healthcare Workers Section -->
<section id="featured-agents" class="featured-agents section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Healthcare Workers</h2>
    <p>Experienced, compassionate professionals ready to support your care needs</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 justify-content-center">

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="featured-agent">
          <div class="agent-wrapper">
            <div class="agent-photo">
              <img src="assets/img/healthcare/worker-1.webp" alt="Healthcare Worker" class="img-fluid">
              <span class="achievement-badge">Senior</span>
            </div>
            <div class="agent-details">
              <h4>Amelia Johnson</h4>
              <span class="position">Registered Nurse</span>
              <div class="location-info">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Hospital & Clinical Care</span>
              </div>
              <div class="expertise-tags">
                <span class="tag">Acute Care</span>
                <span class="tag">Patient Safety</span>
              </div>
              <a href="contact.html" class="view-profile">Hire Them</a>
            </div>
          </div>
        </div>
      </div><!-- End Healthcare Worker -->

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="featured-agent">
          <div class="agent-wrapper">
            <div class="agent-photo">
              <img src="assets/img/healthcare/worker-2.webp" alt="Healthcare Worker" class="img-fluid">
              <span class="achievement-badge expert">Expert</span>
            </div>
            <div class="agent-details">
              <h4>Daniel Brooks</h4>
              <span class="position">Support Worker</span>
              <div class="location-info">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Residential & Home Care</span>
              </div>
              <div class="expertise-tags">
                <span class="tag">Personal Care</span>
                <span class="tag">Mobility Support</span>
              </div>
              <a href="contact.html" class="view-profile">Hire Them</a>
            </div>
          </div>
        </div>
      </div><!-- End Healthcare Worker -->

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="featured-agent">
          <div class="agent-wrapper">
            <div class="agent-photo">
              <img src="assets/img/healthcare/worker-3.webp" alt="Healthcare Worker" class="img-fluid">
              <span class="achievement-badge rising">Trusted</span>
            </div>
            <div class="agent-details">
              <h4>Sophia Clarke</h4>
              <span class="position">Healthcare Assistant</span>
              <div class="location-info">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Care Homes</span>
              </div>
              <div class="expertise-tags">
                <span class="tag">Elderly Care</span>
                <span class="tag">Companionship</span>
              </div>
              <a href="contact.html" class="view-profile">Hire Them</a>
            </div>
          </div>
        </div>
      </div><!-- End Healthcare Worker -->

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="featured-agent">
          <div class="agent-wrapper">
            <div class="agent-photo">
              <img src="assets/img/healthcare/worker-4.webp" alt="Healthcare Worker" class="img-fluid">
              <span class="achievement-badge veteran">Veteran</span>
            </div>
            <div class="agent-details">
              <h4>Michael Turner</h4>
              <span class="position">Doctor</span>
              <div class="location-info">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Clinical & Emergency Care</span>
              </div>
              <div class="expertise-tags">
                <span class="tag">Diagnosis</span>
                <span class="tag">Treatment Planning</span>
              </div>
              <a href="contact.html" class="view-profile">Hire Them</a>
            </div>
          </div>
        </div>
      </div><!-- End Healthcare Worker -->

    </div>

  </div>

</section><!-- /Featured Healthcare Workers Section -->

<!-- Featured Job Postings Section -->
<section id="testimonials" class="testimonials section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Job Postings</h2>
    <p>Current healthcare opportunities available through Tobest Healthcare Solutions</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="testimonial-grid">

      <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="100">
        <div class="testimonial-card">
          <div class="testimonial-header">
            <div class="testimonial-image">
              <img src="assets/img/healthcare/job-nurse.webp" class="img-fluid" alt="Registered Nurse Role">
            </div>
            <div class="testimonial-meta">
              <h3>Registered Nurse</h3>
              <h4>Hospital Setting</h4>
              <div class="company-logo">
                <i class="bi bi-heart-pulse"></i>
              </div>
            </div>
          </div>
          <div class="testimonial-body">
            <p>We are seeking experienced registered nurses to provide high-quality clinical care in hospital environments.</p>
          </div>
        </div>
      </div>

      <div class="testimonial-item featured" data-aos="zoom-in" data-aos-delay="200">
        <div class="testimonial-card">
          <div class="testimonial-header">
            <div class="testimonial-image">
              <img src="assets/img/healthcare/job-support.webp" class="img-fluid" alt="Support Worker Role">
            </div>
            <div class="testimonial-meta">
              <h3>Support Worker</h3>
              <h4>Residential Care</h4>
              <div class="company-logo">
                <i class="bi bi-people-fill"></i>
              </div>
            </div>
          </div>
          <div class="testimonial-body">
            <p>Support individuals with daily living activities while promoting dignity, independence, and wellbeing.</p>
          </div>
        </div>
      </div>

      <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
        <div class="testimonial-card">
          <div class="testimonial-header">
            <div class="testimonial-image">
              <img src="assets/img/healthcare/job-care.webp" class="img-fluid" alt="Care Assistant Role">
            </div>
            <div class="testimonial-meta">
              <h3>Care Assistant</h3>
              <h4>Home Care</h4>
              <div class="company-logo">
                <i class="bi bi-house-heart"></i>
              </div>
            </div>
          </div>
          <div class="testimonial-body">
            <p>Provide compassionate one-to-one care for clients in their own homes, ensuring comfort and safety.</p>
          </div>
        </div>
      </div>

      <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
        <div class="testimonial-card">
          <div class="testimonial-header">
            <div class="testimonial-image">
              <img src="assets/img/healthcare/job-doctor.webp" class="img-fluid" alt="Doctor Role">
            </div>
            <div class="testimonial-meta">
              <h3>Doctor</h3>
              <h4>Clinical Services</h4>
              <div class="company-logo">
                <i class="bi bi-clipboard2-pulse"></i>
              </div>
            </div>
          </div>
          <div class="testimonial-body">
            <p>Deliver expert medical assessment and treatment while working within a multidisciplinary team.</p>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Featured Job Postings Section -->

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
            <a href="#" class="btn btn-primary me-3">Learn More About Us</a>
            <a href="#" class="btn btn-outline-primary">Request Staffing Support</a>
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
                <img src="assets/img/person/person-f-3.webp" alt="Client" class="author-image me-3">
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
            <a href="#" class="btn btn-primary">Get in Touch</a>
            <a href="#" class="btn btn-outline">Request a Consultation</a>
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
        <a href="index.html" class="logo d-flex align-items-center">
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
        <p>ToBest Health Care Solutions</p>
        <p>Abuja, Nigeria</p>
        <p class="mt-4">
          <strong>Phone:</strong> <span>+234 XXX XXX XXXX</span>
        </p>
        <p>
          <strong>Email:</strong> <span>info@tobesthealthcaresolutions.com</span>
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