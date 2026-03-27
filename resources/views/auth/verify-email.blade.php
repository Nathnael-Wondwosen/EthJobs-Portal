@extends('frontend.layouts.master')


{{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}" alt="joblist">
            </div>
        </div>
    </div>
</div> --}}
<div class="text-center" style="margin-top: 100px;">

    <p class="font-medium mb-2" width="100%">{{ __('Thanks for signing up!') }}</p>
    <i class="fas fa-check-circle fa-5x text-green-500 mb-4" style="opacity: 0.5; color:green" size="10px"></i>
    <p>{{ __('Before getting started, could you please verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we\'ll be happy to send you another.') }}
    </p>

</div>


@if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
@endif

<div class="text-center">


    <div class="mt-4 flex items-center justify-center">
        <form method="POST" action="{{ route('verification.send') }}" class="mr-4">
            @csrf
            <x-primary-button class="btn btn-default btn-shadow">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>
