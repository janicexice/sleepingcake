@extends('frontend.layouts.master') 
@section('title', 'SLEEPING CAKE。✧゜+.゜') 
@section('nav_home', 'active') 
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Content -->
	<div class="content clearfix">
		<!-- Main content -->
		<div class="index-content">
			<br>
			<div class="main-title">
			<h1 class="home-post-title"><span>「</span>　　幫助您一夜好眠的友善網站。　<span>」</span></h1>
			</div>
			<br>
			 <div><img class="intro-img" src="{{ asset('/uploads/home/' . $home->image) }}" alt=""><br>
			 	<a href='https://www.freepik.com/photos/home'>Home photo created by lifeforstock - www.freepik.com</a>
			 
			</div>
			 <br>
			<div class="introduce">
				  {!! $home->content_1 !!}<br>{!! $home->content_2 !!}<br><br>
			</div>		
		</div>
	</div>
</div>
<!-- Content End -->
@endsection