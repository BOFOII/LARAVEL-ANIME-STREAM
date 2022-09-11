@extends('layouts.main-layout')
@section('content')
    <div class="sign section--full-bg" data-bg="img/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="{{ route('update.password') }}" method="POST" class="sign__form">
                            <a href="index.html" class="sign__logo">
                                <img src="img/logo.svg" alt="">
                            </a>
                            @csrf
                            <input type="text" name="token" value="{{ $token }}" class="d-none">

                            <div class="sign__group">
                                <input name="email" type="text" class="sign__input" placeholder="Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="sign__group">
                                <input name="password" type="password" class="sign__input" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="sign__group">
                                <input name="password_confirmation" type="password" class="sign__input" placeholder="Password Confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="sign__btn" type="submit">{{ __('pages.btn_send') }}</button>
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
