@extends('frontend.layouts.master') 

@section('title', 'Vitamins')

@section('nav_supplements_vitamins', 'active')

@section('content')
<!-- Content Start -->
@foreach($vitamins as $vitamin)
  <section class="page-section">
    <div class="content">
      <div class="main-content">
        <div class="item-title">
          <div class="bg-faded p-5 d-flex rounded @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif">
            <h2 class="section-heading">

              <span class="section-heading-lower">◆{{ $vitamin->name }}</span>
            </h2>
          </div>
        </div>
        <img class="img" src="{{ asset('/uploads/supplements/vitamins/' . $vitamin->image) }}" alt="">
        <div class="item-description d-flex @if($loop->index % 2 == 0) mr-auto @else ml-auto @endif">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              {!! $vitamin->description !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
<!-- Content End -->
@endsection