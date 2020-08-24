@extends('frontend.layouts.master') 

@section('title', 'Drugs Introduction')

@section('nav_drugs_introduction', 'active')

@section('content')
<!-- Content Start -->
@foreach($drug_introduction as $drug)
  <section class="page-section">
    <div class="content">
      <div class="main-content">
        <div class="item-title">
          <div class="bg-faded p-5 d-flex rounded @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif">
            <h2 class="section-heading">
              <span class="section-heading-name">藥名：{{ $drug->name }}</span><br>
              <span class="section-heading-generic_name">學名：{{ $drug->generic_name }}</span>
            </h2>
          </div>
        </div>
        <h1 class="section-article">
        <div class="drug-img">
        <img class="img" src="{{ asset('/uploads/drugs/drug_introduction/' . $drug->image) }}" alt=""></div>
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
      </h1>
      </div>
    </div>
  </section>
@endforeach
<!-- Content End -->
@endsection