@php
use Illuminate\Support\Facades\Route;
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Reset Password')

@section('page-style')
<!-- Page -->
@vite('resources/assets/vendor/scss/pages/page-auth.scss')
@endsection

@section('content')
<div class="position-relative">
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
          <img src="{{asset('assets/img/illustrations/auth-cover-reset-password-illustration-'.$configData['style'].'.png')}}" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-reset-password-illustration-light.png" data-app-dark-img="illustrations/auth-cover-reset-password-illustration-dark.png">
        </div>
        <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="tree" class="authentication-image-tree">
        <img src="{{asset('assets/img/illustrations/auth-cover-mask-'.$configData['style'].'.png')}}" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.png">
      </div>
      <!-- /Left Section -->

      <!-- Reset Password -->
      <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
        <div class="w-px-400 mx-auto pt-5 pt-lg-0">
          <h4 class="mb-2">Reset Password 🔒</h4>
          <p class="mb-4">Your new password must be different from previously used passwords</p>
        <form id="formAuthentication" class="mb-3" action="{{ route('password.update') }}" method="POST">
          @csrf
          <input type="hidden" name="token" value="{{ $request->route('token') }}">

          <div class="form-floating form-floating-outline mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" autofocus value="{{Request()->email}}" readonly />
            <label for="email">Email</label>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <div class="input-group input-group-merge @error('password') is-invalid @enderror">
              <div class="form-floating form-floating-outline">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autofocus/>
                <label for="password">New Password</label>
              </div>
              <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <div class="input-group input-group-merge">
              <div class="form-floating form-floating-outline">
                <input type="password" id="confirm-password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <label for="confirm-password">Confirm Password</label>
              </div>
              <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
            </div>
          </div>

          <button type="submit" class="btn btn-primary d-grid w-100 mb-3">Set new password</button>
          <div class="text-center">
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
              <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i>
              Back to login
            </a>
            @endif
          </div>
        </form>
        </div>
      </div>
      <!-- /Reset Password -->
    </div>
  </div>
</div>
@endsection
