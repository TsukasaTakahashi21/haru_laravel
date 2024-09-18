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
    <p class="blog-date">{{ $blog->created_at->format('Y年m月d日') }}</p>
    <div class="blog-actions">
      <a href="{{ route('admin_blog.edit', $blog) }}" class="edit-button">編集</a>

      <form action="{{ route('admin_blog.destroy', $blog) }}" method="post" class="delete-form">
        @csrf 
        @method('DELETE')
        <button type="submit" class="delete-button">削除</button>
      </form>
    </div>
  </div>
</section>

<section class="comments">
  <div class="comment-post">
    <h4 class="comment-title">この投稿にコメント</h4>
    <form action="{{ route('comments.store', $blog->id) }}" method="post" class="comment-form">
      @csrf
      <div class="form-group">
        <label for="author">名前</label>
        <input type="text" name="author" id="author" required>
      </div>
      <div class="form-group">
        <label for="content">コメント</label>
        <textarea name="content" id="content" required></textarea>
      </div>
      <button type="submit">送信</button>
    </form>
  </div>

  <div class="comment-lists">
    <h4 class="comment-title">コメント一覧</h4>
    <ul class="comment-item">
      @forelse ($blog->comments as $comment)
      <li>
        <div class="comment-header">
          <p class="commenter-name">{{ $comment->author }}</p>
          <div class="comment-actions">
            <span class="comment-date">{{ $comment->created_at->format('Y年m月d日') }}</span>
            <form action="{{ route('comments.destroy', $comment) }}" method="post" class="delete-form">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete-button">削除</button>
            </form>
          </div>
        </div>
        <p class="comment-content">{{ $comment->content }}</p>
      </li>
      @empty
      <li>コメントはまだありません。</li>
      @endforelse
    </ul>
  </div>
</section>

@endsection