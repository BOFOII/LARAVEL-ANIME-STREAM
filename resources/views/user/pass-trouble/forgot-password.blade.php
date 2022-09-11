@extends('layouts.main-layout')
@section('content')
    <div class="sign section--full-bg" data-bg="img/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="{{ route('forgot.password') }}" method="POST" class="sign__form">
                            @csrf
                            <a href="index.html" class="sign__logo">
                                <img src="img/logo.svg" alt="">
                            </a>

                            <div class="sign__group">
                                <input name="email" type="text" class="sign__input" placeholder="Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="sign__btn" type="submit">{{ __('pages.btn_send') }}</button>

                            <span class="sign__text">We will send a password to your Email</span>
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
