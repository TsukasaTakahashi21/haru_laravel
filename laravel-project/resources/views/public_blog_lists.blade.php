@extends('layouts.user_layout')

@section('title', 'ブログ一覧')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/blog_lists.css') }}">
@endsection

@section('content')
<section class="blogs">
<div class="inner">
  <h2 class="section-title">ブログ一覧 ~Haru.便り~</h2>
  <section class="blogs-filter">
    <form action="{{ route('public_blog_lists') }}" method="get" class="filter-form">
      <div class="form-group">
        <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}" placeholder="キーワード...">
      </div>

      <div class="form-group">
        <select name="category" id="category">
          <option value="">カテゴリ-</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <select name="order" id="order">
          <option value="newest" {{ request('order') == 'newest' ? 'selected' : '' }}>新しい順</option>
          <option value="oldest" {{ request('order') == 'oldest' ? 'selected' : '' }}>古い順</option>
        </select>
      </div>

      <button type="submit" class="filter-button">検索</button>
      <a href="{{ route('public_blog_lists') }}" class="filter-button">全て</a>
    </form>
  </section>

  <!-- ブログ一覧 -->
  <section class="blog-lists">
    @foreach ($blogs as $blog)
    <div class="blog-item">
      @if ($blog->image)
      <div class="blog-image">
        <img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}">
        <div class="blog-category">
          <span class="category">{{ $blog->categories->first()->name }}</span>
        </div>
      </div>
      @endif
      <div class="blog-content-container">
        <h3 class="blog-title">{{ $blog->title }}</h3>
        <p class="blog-content">{{ Str::limit($blog->content, 30, '...') }}</p>
        <p class="blog-date">{{ $blog->created_at->format('Y年m月d日') }}</p>
        <a href="{{ route('public_blog_detail', ['id' => $blog->id]) }}" class="detail-link">記事詳細へ ></a>
      </div>
    </div>
    @endforeach
  </section>
</div>
</section>

@endsection