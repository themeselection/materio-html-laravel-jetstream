@php
use Illuminate\Support\Facades\Route;
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Two Steps Verifications')

@section('page-style')
@vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <a href="{{ url('/') }}" class="auth-cover-brand d-flex align-items-center gap-3">
    <span class="app-brand-logo demo">@include('_partials.macros')</span>
    <span class="app-brand-text demo text-heading fw-semibold">{{ config('variables.templateName') }}</span>
  </a>
  <!-- /Logo -->
  <div class="authentication-inner row m-0">
    <!-- /Left Section -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
      <div>
        <img
          src="{{ asset('assets/img/illustrations/auth-cover-two-steps-illustration-' . $configData['theme'] . '.png') }}"
          class="authentication-image-model d-none d-lg-block" alt="auth-model"
          data-app-light-img="illustrations/auth-cover-two-steps-illustration-light.png"
          data-app-dark-img="illustrations/auth-cover-two-steps-illustration-dark.png" />
      </div>
      <img src="{{ asset('assets/img/illustrations/tree-2.png') }}" alt="tree" class="authentication-image-tree z-n1" />
      <img src="{{ asset('assets/img/illustrations/auth-cover-mask-' . $configData['theme'] . '.png') }}"
        class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" height="362" alt="triangle-bg"
        data-app-light-img="illustrations/auth-cover-mask-light.png"
        data-app-dark-img="illustrations/auth-cover-mask-dark.png" />
    </div>
    <!-- /Left Section -->

    <!-- Two Steps Verification -->
    <div
      class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
      <div class="w-px-400 mx-auto pt-12 pt-lg-0">
        <h4 class="mb-1">Two Step Verification 💬</h4>
        <div x-data="{ recovery: false }">
          <div class="text-start mb-5" x-show="! recovery">
            Please confirm access to your account by entering the authentication code provided by your authenticator
            application.
          </div>
          <div class="text-start mb-5" x-show="recovery">
            Please confirm access to your account by entering one of your emergency recovery codes.
          </div>
          <x-validation-errors class="mb-1" />
          <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf
            <div class="mb-5" x-show="! recovery">
              <x-label class="form-label" value="{{ __('Code') }}" />
              <x-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" inputmode="numeric"
                name="code" autofocus x-ref="code" autocomplete="one-time-code" />
              <x-input-error for="code"></x-input-error>
            </div>
            <div class="mb-5" x-show="recovery">
              <x-label class="form-label" value="{{ __('Recovery Code') }}" />
              <x-input class="{{ $errors->has('recovery_code') ? 'is-invalid' : '' }}" type="text" name="recovery_code"
                x-ref="recovery_code" autocomplete="one-time-code" />
              <x-input-error for="recovery_code"></x-input-error>
            </div>
            <div class="d-flex justify-content-end gap-2">
              <div x-show="! recovery" x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus()})">
                <button type="button" class="btn btn-outline-secondary">Use a recovery code</button>
              </div>
              <div x-cloak x-show="recovery" x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })">
                <button type="button" class="btn btn-outline-secondary">Use an authentication
                  code</button>
              </div>
              <x-button class="px-3">Log in</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Two Steps Verification -->
  </div>
</div>
@endsection