@extends('frontend.layouts.master') 

@section('title', 'Living Healthy')

@section('nav_health', 'active')

@section('content')
<!-- Content Start -->
@foreach($health as $way)
  <section class="page-section my-5 p-5">
    <div class="container">
      <div class="health-way">
        <div class="health-way-title d-flex">
          <div class="bg-faded p-5 d-flex rounded @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif">
            <h2 class="section-heading mb-0">
              <!-- <span class="section-heading-upper">{{ $way->subtitle }}</span> 沒有副標了-->
              <span class="section-heading-lower">{{ $way->ways }}</span>
            </h2>
          </div>
        </div>
        <img class="health-way-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{ asset('/uploads/health/' . $way->image) }}" alt="">
        <div class="health-way-description d-flex @if($loop->index % 2 == 0) mr-auto @else ml-auto @endif">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              {!! $way->description !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
<!-- Content End -->
@endsection