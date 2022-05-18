@extends('layouts.app')

@section('content')
<div class="wrapper">
    @if($data_dash->is_video??'1' == 1)
    <div class="frame-container">
        <iframe title="Gojek - The Flow" frameborder="0" allow="autoplay; encrypted-media;" allowfullscreen
            data-player-status="playing" data-ll-status="loaded" scrolling="no" height="100%" width="100%"
            allowtransparency="true"
            src="https://www.youtube.com/embed/{{$data_dash->file??'VV9BZC7-Ss8'}}?enablejsapi=1&version=3&controls=0&rel=0&autoplay=1&loop=1&mute=1&playlist={{$data_dash->file??'VV9BZC7-Ss8'}}&playsinline=1"
            id="ytplayer-58a818">
        </iframe>
    </div>
    @else
    <img style="display:block; width:100%; height:100%; object-fit: contain;" src="{{$data->file??''}}" alt="data 404">
    @endif
</div>
<!-- Content section 1-->
@foreach($data_content as $dc)
@if($dc->pages->name == 'campus')
<section id="company" class="text-light bg-dark">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 {{ $loop->index%2==0?'order-lg-2':'' }}">
                <div class="p-5"><img class="img-fluid rounded-circle" src="{{$dc->image}}" alt="..." /></div>
            </div>
            <div class="col-lg-6 {{ $loop->index%2==0?'order-lg-1':'' }}">
                <div class="p-5">
                    <h2 class="display-4">{{$dc->title}}</h2>
                    <p>{{$dc->description}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endforeach

<div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($data_conte as $dc)
        @if($dc->pages->name??'' != '')
        <div class="carousel-item {{ $loop->index==0?'active':'' }}">
            <img src="{{$dc->image}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$dc->title}}</h5>
                <p>{{$dc->description}}</p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" tabindex="-1"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="sr-only">Next</span>
        <span class="carousel-control-next-icon" aria-hidden="true" tabindex="-1"></span>
    </a>
</div>

<!--Section: Contact v.2-->
<div class="bg-dark" id="help" style="padding-top: 10%; padding-bottom:15%">
    <section class="container-xxl text-light">
        <h2 class="h1-responsive font-weight-bold text-center">Kontak Kami</h2>
        <p class="text-center w-responsive mx-auto mb-5">{{ $data_contact->description }}</p>
        <div class="row">
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2"
                                    class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>{{ $data_contact->location }}</p>
                    </li>
                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>{{ $data_contact->number }}</p>
                    </li>
                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>{{ $data_contact->email }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>

<style>
    .wrapper {
        overflow: hidden;
        max-width: 100%;
    }

    .frame-container {
        pointer-events: none;
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 */
        padding-top: 25px;
        width: 300%;
        /* enlarge beyond browser width */
        left: -100%;
        /* center */
    }

    .frame-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    #carouselExampleControls img {
        width:100%;
        height: 70vh;
    }
</style>
@endsection
