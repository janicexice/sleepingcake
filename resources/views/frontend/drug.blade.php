@extends('frontend.layouts.master') 

@section('title', 'Drugs')

@section('nav_drugs', 'active')

@section('content')
<!-- Content Start -->
@foreach($drugs as $drug)
  <section class="page-section my-5 p-5">
    <div class="container">
      <div class="drug-item">
        <div class="drug-item-title d-flex">
          <div class="bg-faded p-5 d-flex rounded @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">{{ $drug->generic_name }}</span>
              <span class="section-heading-lower">{{ $drug->name }}</span>
            </h2>
          </div>
        </div>
        <img class="drug-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{ asset('/uploads/drug/' . $drug->image) }}" alt="">
        <div class="drug-item-description d-flex @if($loop->index % 2 == 0) mr-auto @else ml-auto @endif">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              {!! $drug->uses !!}
            </p>
            <p class="mb-0">
              {!! $drug->description !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
<!-- Content End -->
@endsection