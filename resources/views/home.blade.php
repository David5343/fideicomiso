@extends('layouts.app')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            @isset($slider1)
            @if($slider1)
            <img src="{{asset(Storage::disk('public')->url($slider1->img))}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">                            
              <h5>{{$slider1->title}}</h5>
              <p>{{$slider1->text}}</p>
              @else
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>              
              @endif
              @endisset
            </div>
          </div>
          <div class="carousel-item">
            @isset($slider2)
            @if($slider2)
            <img src="{{asset(Storage::disk('public')->url($slider2->img))}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">                            
              <h5>{{$slider2->title}}</h5>
              <p>{{$slider2->text}}</p>
              @else
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>           
              @endif
              @endisset
            </div>
          </div>
          <div class="carousel-item">
            @isset($slider3)
            @if($slider3)
            <img src="{{asset(Storage::disk('public')->url($slider3->img))}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">                            
              <h5>{{$slider3->title}}</h5>
              <p>{{$slider3->text}}</p>
              @else
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>          
              @endif
              @endisset
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

@endsection
