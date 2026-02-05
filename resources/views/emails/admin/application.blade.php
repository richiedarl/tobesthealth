@extends('layouts.app')

@section('content')
<!-- Services Section -->
<section id="services" class="services section py-5">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    
    <!-- Section Header -->
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <span class="section-subtitle text-primary fw-semibold d-block mb-2">Our Solutions</span>
        <h2 class="section-title display-5 fw-bold mb-3">Comprehensive Healthcare Staffing Services</h2>
        <p class="lead text-muted">Connecting exceptional care professionals with healthcare providers who need them most</p>
      </div>
    </div>

    <div class="row gy-4 gx-5">

      <!-- Service 01 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card card border-0 shadow-lg h-100 overflow-hidden hover-lift">
          <div class="row g-0 h-100">
            <div class="col-md-6 position-relative">
              <div class="service-image-wrapper h-100">
                <img src="assets/img/healthcare/nurse-team.webp" alt="Healthcare Staff Recruitment" class="img-fluid h-100 w-100 object-fit-cover">
                <div class="image-overlay bg-gradient-primary"></div>
                <div class="service-icon-wrapper">
                  <i class="bi bi-heart-pulse text-white fs-1"></i>
                </div>
                <div class="service-number-badge">01</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body p-4 p-xl-5 d-flex flex-column h-100">
                <div class="service-content flex-grow-1">
                  <h3 class="card-title fw-bold mb-3">Healthcare Staff Recruitment</h3>
                  <p class="card-text text-secondary mb-4">
                    We connect hospitals, care homes, and private clients with qualified, vetted healthcare professionals ready to work.
                  </p>
                  <ul class="service-features list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Registered Nurses & Carers</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Background & Compliance Checks</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Fast Placement Process</li>
                  </ul>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-hover-effect align-self-start mt-auto">
                  Hire Staff <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Service 01 -->

      <!-- Service 02 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
        <div class="service-card card border-0 shadow-lg h-100 overflow-hidden hover-lift">
          <div class="row g-0 h-100">
            <div class="col-md-6 order-md-2 position-relative">
              <div class="service-image-wrapper h-100">
                <img src="assets/img/healthcare/caregiver-patient.webp" alt="Care Jobs" class="img-fluid h-100 w-100 object-fit-cover">
                <div class="image-overlay bg-gradient-success"></div>
                <div class="service-icon-wrapper">
                  <i class="bi bi-briefcase-medical text-white fs-1"></i>
                </div>
                <div class="service-number-badge">02</div>
              </div>
            </div>
            <div class="col-md-6 order-md-1">
              <div class="card-body p-4 p-xl-5 d-flex flex-column h-100">
                <div class="service-content flex-grow-1">
                  <h3 class="card-title fw-bold mb-3">Care Jobs & Placement</h3>
                  <p class="card-text text-secondary mb-4">
                    Find rewarding healthcare jobs that match your skills, experience, availability, and preferred care setting.
                  </p>
                  <ul class="service-features list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Flexible & Permanent Roles</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Fair & Transparent Pay</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Career Growth Support</li>
                  </ul>
                </div>
                <a href="{{ route('user.jobs.index') }}" class="btn btn-success btn-hover-effect align-self-start mt-auto">
                  Find a Job <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Service 02 -->

      <!-- Service 03 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card card border-0 shadow-lg h-100 overflow-hidden hover-lift">
          <div class="row g-0 h-100">
            <div class="col-md-6 position-relative">
              <div class="service-image-wrapper h-100">
                <img src="assets/img/healthcare/emergency-care.webp" alt="Emergency Healthcare Staffing" class="img-fluid h-100 w-100 object-fit-cover">
                <div class="image-overlay bg-gradient-warning"></div>
                <div class="service-icon-wrapper">
                  <i class="bi bi-alarm text-white fs-1"></i>
                </div>
                <div class="service-number-badge">03</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body p-4 p-xl-5 d-flex flex-column h-100">
                <div class="service-content flex-grow-1">
                  <h3 class="card-title fw-bold mb-3">Temporary & Emergency Cover</h3>
                  <p class="card-text text-secondary mb-4">
                    Rapid-response staffing for emergencies, short-term cover, night shifts, and last-minute staffing needs.
                  </p>
                  <ul class="service-features list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>24/7 Availability</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Verified Professionals</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Immediate Deployment</li>
                  </ul>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-warning text-dark btn-hover-effect align-self-start mt-auto">
                  Request Cover <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Service 03 -->

      <!-- Service 04 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="350">
        <div class="service-card card border-0 shadow-lg h-100 overflow-hidden hover-lift">
          <div class="row g-0 h-100">
            <div class="col-md-6 order-md-2 position-relative">
              <div class="service-image-wrapper h-100">
                <img src="assets/img/healthcare/healthcare-management.webp" alt="Healthcare Workforce Planning" class="img-fluid h-100 w-100 object-fit-cover">
                <div class="image-overlay bg-gradient-info"></div>
                <div class="service-icon-wrapper">
                  <i class="bi bi-graph-up text-white fs-1"></i>
                </div>
                <div class="service-number-badge">04</div>
              </div>
            </div>
            <div class="col-md-6 order-md-1">
              <div class="card-body p-4 p-xl-5 d-flex flex-column h-100">
                <div class="service-content flex-grow-1">
                  <h3 class="card-title fw-bold mb-3">Workforce Planning & Support</h3>
                  <p class="card-text text-secondary mb-4">
                    We help healthcare providers plan, scale, and maintain reliable staffing without compromising care quality.
                  </p>
                  <ul class="service-features list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-2"></i>Staffing Strategy</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-2"></i>Compliance Guidance</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-2"></i>Long-Term Partnerships</li>
                  </ul>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-info text-white btn-hover-effect align-self-start mt-auto">
                  Speak to an Expert <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Service 04 -->

    </div>

    <!-- Stats & CTA Section -->
    <div class="row mt-6 pt-5">
      <div class="col-12" data-aos="fade-up" data-aos-delay="400">
        <div class="cta-section bg-gradient-primary rounded-4 p-5 text-white shadow-lg">
          <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <div class="cta-content">
                <h3 class="display-6 fw-bold mb-3">Supporting Care. Empowering Professionals.</h3>
                <p class="lead mb-4 opacity-90">
                  Whether you're hiring healthcare staff or searching for your next role, we're here to make the process simple, fast, and reliable.
                </p>
                <div class="cta-buttons d-flex flex-wrap gap-3">
                  <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                    Contact Us Today <i class="bi bi-arrow-right ms-2"></i>
                  </a>
                  <a href="tel:+1234567890" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                    <i class="bi bi-telephone me-2"></i> Call Now
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="cta-stats">
                <div class="row g-4">
                  <div class="col-12">
                    <div class="stat-item text-center p-3 bg-white bg-opacity-10 rounded-3">
                      <div class="stat-number display-4 fw-bold mb-1">1,000+</div>
                      <div class="stat-label opacity-90">Healthcare Professionals</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="stat-item text-center p-3 bg-white bg-opacity-10 rounded-3">
                      <div class="stat-number display-4 fw-bold mb-1">200+</div>
                      <div class="stat-label opacity-90">Partner Care Providers</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="stat-item text-center p-3 bg-white bg-opacity-10 rounded-3">
                      <div class="stat-number display-4 fw-bold mb-1">24/7</div>
                      <div class="stat-label opacity-90">Staffing Support</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- /Services Section -->

<style>
  .services {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
  }
  
  .section-subtitle {
    letter-spacing: 1px;
    font-size: 0.9rem;
  }
  
  .service-card {
    border-radius: 1rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
  }
  
  .service-image-wrapper {
    position: relative;
    min-height: 300px;
  }
  
  .image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.7;
    transition: opacity 0.3s ease;
  }
  
  .service-card:hover .image-overlay {
    opacity: 0.8;
  }
  
  .service-icon-wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
  }
  
  .service-number-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: rgba(255,255,255,0.95);
    color: #333;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: bold;
    z-index: 2;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }
  
  .service-features li {
    padding: 5px 0;
  }
  
  .btn-hover-effect {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }
  
  .btn-hover-effect:hover {
    padding-right: 2rem;
    padding-left: 1.5rem;
  }
  
  .btn-hover-effect i {
    transition: transform 0.3s ease;
  }
  
  .btn-hover-effect:hover i {
    transform: translateX(5px);
  }
  
  .cta-section {
    position: relative;
    overflow: hidden;
  }
  
  .cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    opacity: 0.3;
    z-index: 1;
  }
  
  .cta-content, .cta-stats {
    position: relative;
    z-index: 2;
  }
  
  .stat-item {
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
  }
  
  .stat-item:hover {
    background: rgba(255,255,255,0.15) !important;
    transform: translateY(-5px);
  }
  
  @media (max-width: 768px) {
    .service-image-wrapper {
      min-height: 250px;
    }
    
    .cta-section {
      padding: 2rem !important;
    }
    
    .stat-number {
      font-size: 2.5rem !important;
    }
  }
</style>

@endsection