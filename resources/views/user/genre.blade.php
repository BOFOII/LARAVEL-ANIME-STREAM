@extends('layouts.main-layout')
@section('header')
    @include('components.header.header-static')
@endsection
@section('content')
@include('components.hero')
    <div class="catalog catalog--list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section__title">{{ __('pages.genre_title') }}</h2>
                            <p class="section__text">{!! __('pages.genre_title') !!}</p>
                        </div>
                    </div>
                    <div class="row row--grid">
                        <div class="col categories">
                            @foreach ($genre_list as $genre)
                                <a href="{{ route('view.anime-by-genre', ['genre' => str_replace('/', '', $genre['id'])]) }}"
                                    class="categories__item">{{ $genre['genre_name'] }}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    @include('components.footer')
@endsection
