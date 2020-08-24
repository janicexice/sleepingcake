@extends('frontend.layouts.master') 

@section('title', 'Supplements')

@section('nav_supplements', 'active')

@section('content')
<!-- Content Start -->
@foreach($supplements as $supplement)
  <section class="page-section my-5 p-5">
    <div class="container">
      <div class="supplement-item">
        <div class="supplement-item-title d-flex">
          <div class="bg-faded p-5 d-flex rounded @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif">
            <h2 class="section-heading mb-0">

              <span class="section-heading-lower">{{ $supplement->name }}</span>
            </h2>
          </div>
        </div>
        <img class="supplement-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{ asset('/uploads/supplement/' . $supplement->image) }}" alt="">
        <div class="supplement-item-description d-flex @if($loop->index % 2 == 0) mr-auto @else ml-auto @endif">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              {!! $supplement->description !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
<!-- Content End -->
@endsection