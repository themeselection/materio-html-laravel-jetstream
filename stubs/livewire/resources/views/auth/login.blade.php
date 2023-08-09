@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
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
        <img src="{{asset('assets/img/illustrations/auth-cover-login-illustration-'.$configData['style'].'.png')}}" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-login-illustration-light.png" data-app-dark-img="illustrations/auth-cover-login-illustration-dark.png">
      </div>
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="tree" class="authentication-image-tree">
      <img src="{{asset('assets/img/illustrations/auth-cover-mask-'.$configData['style'].'.png')}}" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.png">
    </div>
    <!-- /Left Section -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
      <div class="w-px-400 mx-auto pt-5 pt-lg-0">
        <h4 class="mb-2">Welcome to {{config('variables.templateName')}}! 👋</h4>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>

        @if (session('status'))
          <div class="alert alert-success mb-1 rounded-0" role="alert">
            <div class="alert-body">
              {{ session('status') }}
            </div>
          </div>
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="Enter your email" autofocus value="{{ old('email') }}">
            <label for="login-email">Email</label>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <div class="form-password-toggle">
              <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="login-password">Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <span class="fw-medium">{{ $message }}</span>
                </span>
              @enderror
            </div>
          </div>
          <div class="mb-3 d-flex justify-content-between flex-wrap">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label me-2" for="remember-me">
                Remember Me
              </label>
            </div>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="float-end mb-1">
                <span>Forgot Password?</span>
              </a>
            @endif
          </div>
          <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </form>

        <p class="text-center mt-2">
          <span>New on our platform?</span>
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>Create an account</span>
          </a>
          @endif
        </p>

        <div class="divider my-4">
          <div class="divider-text">or</div>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-facebook">
            <i class="tf-icons mdi mdi-24px mdi-facebook"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-twitter">
            <i class="tf-icons mdi mdi-24px mdi-twitter"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
            <i class="tf-icons mdi mdi-24px mdi-github"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
            <i class="tf-icons mdi mdi-24px mdi-google"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
@endsection