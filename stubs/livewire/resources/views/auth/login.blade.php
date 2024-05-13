@php
use Illuminate\Support\Facades\Route;
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
  @vite('resources/assets/vendor/scss/pages/page-auth.scss')
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <a href="{{url('/')}}" class="auth-cover-brand d-flex align-items-center gap-3">
    <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
    <span class="app-brand-text demo text-heading fw-semibold">{{ config('variables.templateName') }}</span>
  </a>
  <!-- /Logo -->
  <div class="authentication-inner row m-0">
    <!-- /Left Section -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
      <div>
        <img src="{{asset('assets/img/illustrations/auth-cover-login-illustration-'.$configData['style'].'.png')}}" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-login-illustration-light.png" data-app-dark-img="illustrations/auth-cover-login-illustration-dark.png">
      </div>
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="tree" class="authentication-image-tree z-n1">
      <img src="{{asset('assets/img/illustrations/auth-cover-mask-'.$configData['style'].'.png')}}" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" height="362" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.png">
    </div>
    <!-- /Left Section -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-12 py-4">
      <div class="w-px-400 mx-auto pt-5 pt-lg-0">
        <h4 class="mb-1">Welcome to {{config('variables.templateName')}}! 👋🏻</h4>
        <p class="mb-5">Please sign-in to your account and start the adventure</p>

        @if (session('status'))
          <div class="alert alert-success mb-3 rounded-0" role="alert">
            <div class="alert-body">
              {{ session('status') }}
            </div>
          </div>
        @endif

        <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="form-floating form-floating-outline mb-5">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="Enter your email" autofocus value="{{ old('email') }}">
            <label for="login-email">Email</label>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
            @enderror
          </div>
          <div class="mb-5">
            <div class="form-password-toggle">
              <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="login-password">Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <span class="fw-medium">{{ $message }}</span>
                </span>
              @enderror
            </div>
          </div>
          <div class="mb-5 d-flex justify-content-between flex-wrap py-2">
            <div class="form-check mb-0">
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
          <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
        </form>

        <p class="text-center">
          <span>New on our platform?</span>
          @if (Route::has('register'))
            <a href="{{ route('register') }}">
              <span>Create an account</span>
            </a>
          @endif
        </p>

        <div class="divider my-5">
          <div class="divider-text">or</div>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-facebook">
            <i class="tf-icons ri-facebook-fill ri-24px"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-twitter">
            <i class="tf-icons ri-twitter-fill ri-24px"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
            <i class="tf-icons ri-github-fill ri-24px"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
            <i class="tf-icons ri-google-fill ri-24px"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
@endsection