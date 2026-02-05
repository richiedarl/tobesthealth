@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<style>
.about-card {
  background: #ffffff;
  border-radius: 18px;
  padding: 2.5rem;
  box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
}

.icon-wrap {
  width: 60px;
  height: 60px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
  font-size: 1.8rem;
}

.feature-card {
  background: #ffffff;
  border-radius: 16px;
  padding: 2rem 1.5rem;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  margin-bottom: 1.5rem;
}

.feature-card i {
  font-size: 2rem;
  color: #0d6efd;
  margin-bottom: 0.75rem;
}

.feature-card h5 {
  margin-bottom: 0.5rem;
}

</style>
<!-- Page Header -->
<div class="page-title light-background">
  <div class="container text-center">
    <h1 class="mb-2">About Tobest Healthcare Solutions</h1>
    <p class="text-muted">
      Connecting qualified healthcare professionals with trusted medical institutions
    </p>
  </div>
</div>

<!-- About Section -->
<section id="about" class="about section py-5">

  <div class="container">

    <!-- Intro -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-9 text-center" data-aos="fade-up">
        <i class="bi bi-hospital-fill mb-3"
           style="font-size: 3rem; color: #0d6efd;"></i>

        <h2 class="mb-3">
          A Modern Healthcare Recruitment Agency
        </h2>

        <p class="lead">
          Tobest Healthcare Solutions is a specialized recruitment agency helping
          hospitals, clinics, and healthcare facilities hire qualified doctors,
          nurses, and medical professionals — while enabling healthcare workers
          find opportunities that match their skills and career goals.
        </p>
      </div>
    </div>

    <!-- What We Do -->
    <div class="row gy-4 mb-5">

      <div class="col-lg-6" data-aos="fade-right">
        <div class="about-card h-100">
          <div class="icon-wrap bg-success-subtle">
            <i class="bi bi-person-badge-fill text-success"></i>
          </div>
          <h4>For Healthcare Professionals</h4>
          <p>
            We provide doctors, nurses, caregivers, and allied professionals
            with access to verified job opportunities across reputable
            healthcare institutions.
          </p>
          <ul class="list-unstyled mt-3">
            <li><i class="bi bi-check-circle-fill text-success"></i> Verified job listings</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Transparent hiring process</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Career growth opportunities</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="about-card h-100">
          <div class="icon-wrap bg-primary-subtle">
            <i class="bi bi-building-check text-primary"></i>
          </div>
          <h4>For Hospitals & Clinics</h4>
          <p>
            We help healthcare facilities hire skilled, screened, and
            qualified professionals efficiently — reducing hiring time
            and operational stress.
          </p>
          <ul class="list-unstyled mt-3">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Pre-screened candidates</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Faster recruitment cycles</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Reliable staffing solutions</li>
          </ul>
        </div>
      </div>

    </div>

    <!-- Why Choose Us -->
    <div class="row mb-5 text-center" data-aos="fade-up">
      <div class="col-12 mb-4">
        <h3>Why Choose Tobest Healthcare Solutions?</h3>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <i class="bi bi-shield-check"></i>
          <h5>Trust & Compliance</h5>
          <p>We follow ethical recruitment standards and healthcare compliance.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <i class="bi bi-clipboard-check"></i>
          <h5>Verified Applications</h5>
          <p>Every application and enquiry is reviewed for quality.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <i class="bi bi-clock-history"></i>
          <h5>Fast Turnaround</h5>
          <p>We help institutions fill roles quickly without compromise.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <i class="bi bi-heart-pulse"></i>
          <h5>Healthcare Focused</h5>
          <p>We recruit only healthcare professionals — nothing generic.</p>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="cta-section text-center mt-5" data-aos="zoom-in">
      <i class="bi bi-chat-square-dots-fill mb-3"
         style="font-size: 2.5rem; color: #198754;"></i>

      <h3>Ready to Get Started?</h3>
      <p class="mb-4">
        Whether you are a healthcare professional seeking opportunities
        or a facility hiring staff, we’re here to help.
      </p>

      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('user.jobs.index') }}" class="btn btn-success btn-lg">
          View Job Openings
        </a>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
          Hire Healthcare Staff
        </a>
      </div>
    </div>

  </div>

</section>

@endsection
