@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Confirm Password')

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
        <img src="{{asset('assets/img/illustrations/auth-cover-verify-email-illustration-'.$configData['style'].'.png')}}" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-verify-email-illustration-light.png" data-app-dark-img="illustrations/auth-cover-verify-email-illustration-dark.png">
      </div>
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="tree" class="authentication-image-tree">
      <img src="{{asset('assets/img/illustrations/auth-cover-mask-'.$configData['style'].'.png')}}" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.png">
    </div>
    <!-- /Left Section -->

    <!-- Confirm Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
      <div class="w-px-400 mx-auto pt-5 pt-lg-0">
        <h4 class="mb-2">Confirm Password? 🔒</h4>
        <p class="mb-4">Please confirm your password before continuing.</p>
        <form id="twoStepsForm" class="mb-3" action="{{ route('password.confirm') }}" method="POST">
          @csrf
          <div class="mb-3">
            <div class="form-password-toggle">
              <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <label for="password">Password</label>
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
          <button type="submit" class="btn btn-primary d-grid w-100">Confirm Password</button>
        </form>
      </div>
    </div>
    <!-- /Confirm Password -->
  </div>
</div>
@endsection