@extends('layouts.admin_layout')

@section('title', 'ブログ詳細ページ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/blog_detail.css') }}">
@endsection

@section('content')
<section class="blog-container">
    <div class="blog-img">
      @if ($blog->image)
      <img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}">
      @endif
    </div>
    <div class="blog-content">
      <h3 class="blog-title">{{ $blog->title }}</h3>
      <p class="blog-content">{{ $blog->content }}</p>
      <p class="blog-date">{{ $blog->created_at->format('Y年m月d日 H:i') }}</p>
    </div>
</section>
@endsection