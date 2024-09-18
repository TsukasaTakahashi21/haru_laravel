@extends('layouts.admin_layout')

@section('title', 'ブログ一覧')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/blog_lists.css') }}">
@endsection

@section('content')
<section class="blogs-filter">
  <h2 class="section-title">ブログ一覧 ~Haru.便り~</h2>
</section>

<section class="blog-lists">
  @foreach ($blogs as $blog)
  <div class="blog-item">
    @if ($blog->image)
    <div class="blog-image">
      <img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}">
    </div>
    @endif
    <div class="blog-content-container">
      <h3 class="blog-title">{{ $blog->title }}</h3>
      <p class="blog-content">{{ Str::limit($blog->content, 30, '...') }}</p>
      <p class="blog-date">{{ $blog->created_at->format('Y年m月d日 H:i') }}</p>
      <a href="{{ route('admin_blog.detail', ['id' => $blog->id]) }}" class="detail-link">記事詳細へ ></a>
    </div>
  </div>
  @endforeach
</section>

<div class="pagination">
  <a href="">前へ</a>
  <span>1</span>
  <a href="">2</a>
  <a href="">3</a>
  <a href="">次へ</a>
</div>
@endsection