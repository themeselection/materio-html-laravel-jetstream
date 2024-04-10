@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Forgot Password')

@section('page-style')
<!-- Page -->
@vite('resources/assets/vendor/scss/pages/page-auth.scss')
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <a href="{{url('/')}}" class="auth-cover-brand d-flex align-items-center gap-2">
    <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
    <span class="app-brand-text demo text-heading fw-semibold">{{config('variables.templateName')}}</span>
  </a>
  <!-- /Logo -->
  <div class="authentication-inner row m-0">

    <!-- /Left Section -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-5 pb-2">
      <div>
        <img src="{{asset('assets/img/illustrations/auth-cover-forgot-password-illustration-'.$configData['style'].'.png')}}" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-forgot-password-illustration-light.png" data-app-dark-img="illustrations/auth-cover-forgot-password-illustration-dark.png">
      </div>
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="tree" class="authentication-image-tree">
      <img src="{{asset('assets/img/illustrations/auth-cover-mask-'.$configData['style'].'.png')}}" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.png">
    </div>
    <!-- /Left Section -->

    <!-- Forgot Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <h4 class="mb-2">Forgot Password? 🔒</h4>
        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>

        @if (session('status'))
        <div class="mb-1 text-success">
          {{ session('status') }}
        </div>
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
          @csrf
          <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" autofocus>
            <label for="email">Email</label>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
        </form>
        <div class="text-center">
          @if (Route::has('login'))
          <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
            <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i>
            Back to login
          </a>
          @endif
        </div>
      </div>
    </div>
    <!-- /Forgot Password -->
  </div>
</div>
@endsection