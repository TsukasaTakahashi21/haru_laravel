@extends('layouts.admin_layout')

@section('title', 'ブログ編集')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create_blog.css') }}">
@endsection

@section('content')
<h2 class="section-title">ブログ編集</h2>

<section class="edit-blog">
  <form action="{{ route('admin_blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      @if ($blog->image)
      <div class="blog-edit-image-container">
        <img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-edit-image">
      </div>
      @endif
      <label for="image">画像:</label>
      <input type="file" name="image" id="image" class="form-input">
    </div>

    <div class="form-group">
  <label for="category">カテゴリー:</label>
  <select name="categories[]" id="category">
    <option value="" disabled>カテゴリを選択してください</option>
    @foreach ($categories as $category)
      <option value="{{ $category->id }}"
        @if($blog->categories->pluck('id')->contains($category->id)) selected @endif>
        {{ $category->name }}
      </option>
    @endforeach
  </select>
</div>


    <div class="form-group">
      <label for="title">タイトル:</label>
      <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="form-input" required>
    </div>

    <div class="form-group">
      <label for="content">内容:</label>
      <textarea name="content" id="content" class="form-input" required>{{ old('content', $blog->content) }}</textarea>
    </div>

    <button type="submit" class="submit-button">更新</button>
  </form>
</section>
@endsection
