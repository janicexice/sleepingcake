@extends('frontend.layouts.master') 

@section('title', 'Nutritions')

@section('nav_supplements_nutritions', 'active')

@section('content')
<!-- Content Start -->
@foreach($nutritions as $nutrition)
  <section class="page-section">
    <div class="content">
      <div class="main-content">
        <div class="item-title">
          <div class="bg-faded p-5 d-flex rounded @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif">
            <h2 class="section-heading">

              <span class="section-heading-lower">◆{{ $nutrition->name }}</span>
            </h2>
          </div>
        </div>
        <img class="img" src="{{ asset('/uploads/supplements/nutritions/' . $nutrition->image) }}" alt="">
        <div class="item-description d-flex @if($loop->index % 2 == 0) mr-auto @else ml-auto @endif">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              {!! $nutrition->description !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
<!-- Content End -->
@endsection