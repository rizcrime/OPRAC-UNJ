@extends('layouts.app')
@section('content')

<script src="{{ asset('splide/dist/js/splide.min.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<div class="wrapper">
    @if($data_dash->is_video??'1' == 1)
    <div class="frame-container">
        <iframe title="Gojek - The Flow" frameborder="0" allow="autoplay; encrypted-media;" allowfullscreen data-player-status="playing" data-ll-status="loaded" scrolling="no" height="100%" width="100%" allowtransparency="true" src="https://www.youtube.com/embed/{{$data_dash->file??'VV9BZC7-Ss8'}}?enablejsapi=1&version=3&controls=0&rel=0&autoplay=1&loop=1&mute=1&playlist={{$data_dash->file??'VV9BZC7-Ss8'}}&playsinline=1" id="ytplayer-58a818">
        </iframe>
    </div>
    @else

    <img style="display:block; width:100%; height:100%; object-fit: contain;" src="{{$data_dash->file??''}}" alt="{{$data_dash->file??''}}">
    @endif
</div>
<section class="page-section bg-warning" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Our Technology Make You Happy</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            @foreach($data_content as $dc)
            @if($dc->pages->name == 'introduce')
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="{{$dc->image}} fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">{{$dc->title}}</h3>
                    <p class="text-muted mb-0">{{$dc->description}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<section id="thumbnail-carousel" class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach($data_conte as $dc)
            @if($dc->name == 'gallery')
            @foreach($dc->contents as $dcc)
            <li class="splide__slide">
                <img class="img-rounded" src="{{$dcc->image}}" alt="No Image, 404 issue">
            </li>
            @endforeach
            @endif
            @endforeach
        </ul>
    </div>
</section>

<div class="footer-clean bg-success">
    <footer>
        <div class="container">
            <div class="row justify-content-center text-warning">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social">
                    <a href="#"><i class="icon ion-social-facebook"></i></a>
                    <a href="#"><i class="icon ion-social-twitter"></i></a>
                    <a href="#"><i class="icon ion-social-linkedin"></i></a>
                    <a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">{{ config('app.name', 'Laravel') }} © 2022</p>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection