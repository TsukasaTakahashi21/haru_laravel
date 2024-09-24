@extends('layouts.user_layout')

@section('title', 'お部屋')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/room.css') }}">
@endsection

@section('content')
<section class="rooms">
  <div class="inner">
    <h2 class="section-title">お部屋と景観</h2>
    <div class="room-gallery">
      <img src="images/house1.jpg" alt="">
      <img src="images/house2.jpg" alt="">
      <img src="images/house3.webp" alt="">
      <img src="images/house4.webp" alt="">
      <img src="images/house5.webp" alt="">
      <img src="images/house6.webp" alt="">
      <img src="images/house7.webp" alt="">
      <img src="images/house9.webp" alt="">
      <img src="images/house8.jpg" alt="">
      <img src="images/house10.webp" alt="">
      <img src="images/house11.webp" alt="">
    </div>
  </div>
</section>
@endsection
