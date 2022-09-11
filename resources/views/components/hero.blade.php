<div class="home home--static">
    <div class="home__carousel owl-carousel" id="flixtv-hero">
        <div class="home__card">
            <a href="{{ route('view.watch-anime', ['slug' => 'youkoso-jitsuryoku-shijou-shugi-no-kyoushitsu-e-subtitle-indonesia']) }}">
                <img src="{{ asset('img/hero/classroom-of-the-elite-season-2-mendapat-informasi-tanggal-rilis.jpg') }}" alt="">
            </a>
        </div>

        <div class="home__card">
            <a href="{{ route('view.watch-anime', ['slug' => 'kanojo-no-okarishimasu-s2-sub-indo']) }}">
                <img src="{{ asset('img/hero/pacar-sewaan.jpg') }}" alt="">
            </a>
        </div>

        <div class="home__card">
            <a href="{{ route('view.watch-anime', ['slug' => 'spy-family-sub-indo']) }}">
                <img src="{{ asset('img/hero/spyxfamily.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <button class="home__nav home__nav--prev" data-nav="#flixtv-hero" type="button"></button>
    <button class="home__nav home__nav--next" data-nav="#flixtv-hero" type="button"></button>
</div>
