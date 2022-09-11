@extends('layouts.main-layout')
@section('header')
    @include('components.header.header-hidden')
@endsection
@section('content')
    <!-- details -->
    <section class="section section--head section--head-fixed section--gradient section--details-bg">
        <div class="section__bg" data-bg="{{ $detai_anime['thumb'] }}"></div>
        <div class="container">
            <!-- article -->
            <div class="article">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <!-- article content -->
                        <div class="article__content">
                            <h1>{{ $watch_anime['title'] }}</h1>

                            <ul class="list">
                                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                    </svg> {{ $detai_anime['score'] }}</li>
                                <li>{{ end($detai_anime['genre_list'])['genre_name'] }}</li>
                                <li>{{ $detai_anime['release_date'] }}</li>
                                <li>{{ $detai_anime['duration'] }}</li>
                            </ul>

                            <p>{{ $detai_anime['synopsis'] }}</p>
                        </div>
                        <!-- end article content -->
                    </div>

                    <!-- video player -->
                    <div class="col-12 col-xl-8">
                        <div class="plyr"
                            id="player">
                            <div class="plyr__video-wrapper plyr__video-embed" style="padding-bottom: 56.25%;">
                                <iframe
                                        height="100%"
                                        width="100%"
                                        src="{{ $watch_anime['link_stream_720'] }}"
                                        allowfullscreen="" allow="autoplay,fullscreen"></iframe>
                            </div>
                        </div>

                        <div class="article__actions article__actions--details">
                            <div class="article__download">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z" />
                                </svg>
                                Download:
                                @foreach ($watch_anime['link_donwload'] as $key => $link_download)
                                <a href="{{ $key }}"
                                onclick="
                                event.preventDefault();
                                Array.from(document.querySelectorAll('div.link_donwload')).map(el => {
                                    document.getElementById(el.id).classList.add('d-none');
                                })
                                document.getElementById(this.getAttribute('href')).classList.remove('d-none');"
                                download="#">{{ $link_download['quality'] }}</a>
                                @endforeach
                            </div>

                            <!-- add .active class -->
                            <button class="article__favorites" type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                        d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z">
                                    </path>
                                </svg> Add to favorites</button>
                                @if (array_key_exists('low_quality', $watch_anime['link_donwload']))
                                    <div class="link_donwload categories d-none" id="low_quality">
                                        @foreach ($watch_anime['link_donwload']['low_quality']['download_links'] as $download_link)
                                            <a href="{{ $download_link['link'] }}" class="categories__item">{{ $download_link['host'] }}</a>
                                        @endforeach
                                    </div>
                                @endif
                                @if (array_key_exists('medium_quality', $watch_anime['link_donwload']))
                                    <div class="link_donwload categories d-none" id="medium_quality">
                                        @foreach ($watch_anime['link_donwload']['medium_quality']['download_links'] as $download_link)
                                            <a href="{{ $download_link['link'] }}" class="categories__item">{{ $download_link['host'] }}</a>
                                        @endforeach
                                    </div>
                                @endif
                                @if (array_key_exists('high_quality', $watch_anime['link_donwload']))
                                    <div class="link_donwload categories d-none" id="high_quality">
                                        @foreach ($watch_anime['link_donwload']['high_quality']['download_links'] as $download_link)
                                            <a href="{{ $download_link['link'] }}" class="categories__item">{{ $download_link['host'] }}</a>
                                        @endforeach
                                    </div>
                                @endif
                        </div>
                    </div>
                    <!-- end video player -->

                    <!-- series -->
                    <div class="col-12">
                        <div class="series-wrap">
                            <h3 class="series-wrap__title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z" />
                                </svg> Season ini</h3>
                            <div class="section__carousel-wrap">
                                <div class="section__series owl-carousel" id="series">
                                    @foreach ($detai_anime['episode_list'] as $episode)
                                        <div class="series">
                                            <a href="{{ route('view.watch-anime', [
                                                'slug' => $detai_anime['anime_id'],
                                                'slug_eps' => str_replace('episode/', '', $episode['id']),
                                            ]) }}"
                                                class="series__cover">
                                                <img src="{{ $detai_anime['thumb'] }}" alt="">
                                                <span>
                                                    <svg width="22" height="22" viewBox="0 0 22 22"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg> {{ $detai_anime['duration'] }}
                                                </span>
                                            </a>
                                            <h3 class="series__title"><a
                                                    href="{{ route('view.watch-anime', [
                                                        'slug' => $detai_anime['anime_id'],
                                                        'slug_eps' => str_replace('episode/', '', $episode['id']),
                                                    ]) }}">{{ $episode['title'] }}</a>
                                            </h3>
                                        </div>
                                    @endforeach
                                </div>

                                <button class="section__nav section__nav--series section__nav--prev" data-nav="#series"
                                    type="button"><svg width="17" height="15" viewBox="0 0 17 15"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <button class="section__nav section__nav--series section__nav--next" data-nav="#series"
                                    type="button"><svg width="17" height="15" viewBox="0 0 17 15"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 7.72559L0.75 7.72559" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </div>
                    </div>
                    <!-- end series -->

                    <div class="col-12 col-xl-8">
                        <!-- categories -->
                        <div class="categories">
                            <h3 class="categories__title">Genres</h3>
                            @foreach ($detai_anime['genre_list'] as $genre)
                                <a href="{{ route('view.anime-by-genre', ['genre' => $genre['genre_id']]) }}" class="categories__item">{{ $genre['genre_name'] }}</a>
                            @endforeach
                        </div>
                        <!-- end categories -->

                        <!-- share -->
                        <div class="share">
                            <h3 class="share__title">Share</h3>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}" target="blank" class="share__link share__link--fb"><svg width="9" height="17"
                                    viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.56341 16.8197V8.65888H7.81615L8.11468 5.84663H5.56341L5.56724 4.43907C5.56724 3.70559 5.63693 3.31257 6.69042 3.31257H8.09873V0.5H5.84568C3.1394 0.5 2.18686 1.86425 2.18686 4.15848V5.84695H0.499939V8.6592H2.18686V16.8197H5.56341Z" />
                                </svg> share</a>
                            <a href="https://twitter.com/intent/tweet?text={{ request()->url() }}" target="blank" class="share__link share__link--tw"><svg width="16" height="12"
                                    viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.55075 3.19219L7.58223 3.71122L7.05762 3.64767C5.14804 3.40404 3.47978 2.57782 2.06334 1.1902L1.37085 0.501686L1.19248 1.01013C0.814766 2.14353 1.05609 3.34048 1.843 4.14552C2.26269 4.5904 2.16826 4.65396 1.4443 4.38914C1.19248 4.3044 0.972149 4.24085 0.951164 4.27263C0.877719 4.34677 1.12953 5.31069 1.32888 5.69202C1.60168 6.22165 2.15777 6.74068 2.76631 7.04787L3.28043 7.2915L2.67188 7.30209C2.08432 7.30209 2.06334 7.31268 2.12629 7.53512C2.33613 8.22364 3.16502 8.95452 4.08833 9.2723L4.73884 9.49474L4.17227 9.8337C3.33289 10.321 2.34663 10.5964 1.36036 10.6175C0.888211 10.6281 0.5 10.6705 0.5 10.7023C0.5 10.8082 1.78005 11.4014 2.52499 11.6344C4.75983 12.3229 7.41435 12.0264 9.40787 10.8506C10.8243 10.0138 12.2408 8.35075 12.9018 6.74068C13.2585 5.88269 13.6152 4.315 13.6152 3.56293C13.6152 3.07567 13.6467 3.01212 14.2343 2.42953C14.5805 2.09056 14.9058 1.71983 14.9687 1.6139C15.0737 1.41264 15.0632 1.41264 14.5281 1.59272C13.6362 1.91049 13.5103 1.86812 13.951 1.39146C14.2762 1.0525 14.6645 0.438131 14.6645 0.258058C14.6645 0.22628 14.5071 0.279243 14.3287 0.374576C14.1398 0.480501 13.7202 0.639389 13.4054 0.734722L12.8388 0.914795L12.3247 0.565241C12.0414 0.374576 11.6427 0.162725 11.4329 0.0991699C10.8978 -0.0491255 10.0794 -0.0279404 9.59673 0.14154C8.2852 0.618204 7.45632 1.84694 7.55075 3.19219Z" />
                                </svg> tweet</a>
                        </div>
                        <!-- end share -->
                    </div>
                </div>
            </div>
            <!-- end article -->
        </div>
    </section>
    <!-- end details -->
@endsection
@section('footer')
    @include('components.footer')
@endsection
