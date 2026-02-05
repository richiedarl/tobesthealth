@extends('layouts.app')

@section('content')

<section id="services" class="services section py-5">

  <div class="container" data-aos="fade-up">

    <!-- Header -->
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <span class="section-subtitle text-primary fw-semibold d-block mb-2">
          Our Services
        </span>
        <h2 class="display-5 fw-bold mb-3">
          Healthcare Recruitment, Done Properly
        </h2>
        <p class="lead text-muted">
          We connect qualified healthcare professionals with trusted hospitals,
          clinics, and care providers.
        </p>
      </div>
    </div>

    <!-- Services Grid -->
    <div class="row gy-4">

      <!-- Service 01 -->
      <div class="col-lg-6" data-aos="fade-up">
        <div class="service-card h-100">
          <div class="service-icon bg-primary-subtle text-primary">
            <i class="bi bi-heart-pulse"></i>
          </div>

          <span class="service-badge">01</span>

          <h3>Healthcare Staff Recruitment</h3>
          <p>
            We help hospitals, clinics, and care homes recruit qualified,
            compliant, and ready-to-work healthcare professionals.
          </p>

          <ul class="service-list">
            <li><i class="bi bi-check-circle-fill"></i> Nurses, carers & support staff</li>
            <li><i class="bi bi-check-circle-fill"></i> Full compliance checks</li>
            <li><i class="bi bi-check-circle-fill"></i> Fast & reliable placement</li>
          </ul>

          <a href="{{ route('contact') }}" class="btn btn-primary mt-auto">
            Hire Staff <i class="bi bi-arrow-right-short ms-1"></i>
          </a>
        </div>
      </div>

      <!-- Service 02 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card h-100">
          <div class="service-icon bg-success-subtle text-success">
            <i class="bi bi-briefcase-medical"></i>
          </div>

          <span class="service-badge">02</span>

          <h3>Healthcare Jobs & Placement</h3>
          <p>
            We support healthcare professionals in finding roles that match
            their skills, availability, and career goals.
          </p>

          <ul class="service-list">
            <li><i class="bi bi-check-circle-fill"></i> Permanent & flexible roles</li>
            <li><i class="bi bi-check-circle-fill"></i> Transparent pay structure</li>
            <li><i class="bi bi-check-circle-fill"></i> Career support & guidance</li>
          </ul>

          <a href="{{ route('user.jobs.index') }}" class="btn btn-success mt-auto">
            Find a Job <i class="bi bi-arrow-right-short ms-1"></i>
          </a>
        </div>
      </div>

      <!-- Service 03 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card h-100">
          <div class="service-icon bg-warning-subtle text-warning">
            <i class="bi bi-alarm"></i>
          </div>

          <span class="service-badge">03</span>

          <h3>Temporary & Emergency Cover</h3>
          <p>
            Rapid staffing solutions for urgent shifts, short-term cover,
            nights, and last-minute requirements.
          </p>

          <ul class="service-list">
            <li><i class="bi bi-check-circle-fill"></i> 24/7 availability</li>
            <li><i class="bi bi-check-circle-fill"></i> Verified professionals</li>
            <li><i class="bi bi-check-circle-fill"></i> Immediate deployment</li>
          </ul>

          <a href="{{ route('contact') }}" class="btn btn-warning text-dark mt-auto">
            Request Cover <i class="bi bi-arrow-right-short ms-1"></i>
          </a>
        </div>
      </div>

      <!-- Service 04 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card h-100">
          <div class="service-icon bg-info-subtle text-info">
            <i class="bi bi-graph-up"></i>
          </div>

          <span class="service-badge">04</span>

          <h3>Workforce Planning & Support</h3>
          <p>
            Long-term recruitment partnerships that help healthcare providers
            scale safely and sustainably.
          </p>

          <ul class="service-list">
            <li><i class="bi bi-check-circle-fill"></i> Staffing strategy</li>
            <li><i class="bi bi-check-circle-fill"></i> Compliance guidance</li>
            <li><i class="bi bi-check-circle-fill"></i> Ongoing recruitment support</li>
          </ul>

          <a href="{{ route('contact') }}" class="btn btn-info text-white mt-auto">
            Speak to an Expert <i class="bi bi-arrow-right-short ms-1"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- CTA -->
    <div class="row mt-5">
      <div class="col-12">
        <div class="cta-box text-center">
          <i class="bi bi-shield-check display-4 text-white mb-3"></i>
          <h3 class="fw-bold text-white mb-3">
            Trusted by Healthcare Professionals & Providers
          </h3>
          <p class="text-white-50 mb-4">
            Whether you're hiring staff or applying for roles,
            Tobest Healthcare Solutions is your trusted partner.
          </p>
          <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            Get Started Today
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<style>
.services {
  background: linear-gradient(135deg, #f8fafc, #ffffff);
}

.section-subtitle {
  letter-spacing: 1px;
  font-size: 0.85rem;
}

.service-card {
  background: #ffffff;
  border-radius: 20px;
  padding: 2.5rem;
  box-shadow: 0 18px 45px rgba(0,0,0,0.08);
  display: flex;
  flex-direction: column;
  position: relative;
  transition: all 0.35s ease;
}

.service-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 30px 60px rgba(0,0,0,0.12);
}

.service-icon {
  width: 70px;
  height: 70px;
  border-radius: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  margin-bottom: 1.5rem;
}

.service-badge {
  position: absolute;
  top: 25px;
  right: 25px;
  font-weight: 700;
  opacity: 0.15;
  font-size: 2rem;
}

.service-list {
  list-style: none;
  padding: 0;
  margin: 1.5rem 0;
}

.service-list li {
  margin-bottom: 0.5rem;
  display: flex;
  gap: 0.5rem;
}

.service-list i {
  color: #198754;
}

.cta-box {
  background: linear-gradient(135deg, #0d6efd, #198754);
  border-radius: 22px;
  padding: 4rem 2rem;
  box-shadow: 0 30px 70px rgba(0,0,0,0.15);
}
</style>

@endsection
