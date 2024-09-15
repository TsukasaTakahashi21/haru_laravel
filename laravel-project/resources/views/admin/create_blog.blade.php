@extends('layouts.admin_layout')

@section('title', 'ブログ作成')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create_blog.css') }}">
@endsection

@section('content')
@if ($errors->any())
<div class="error-message">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<h2 class="section-title">ブログ作成</h2>

<section class="create-blog">
  <form action="{{ route('admin_blog.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" name="image" id="image" class="form-input" required>
    </div>

    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" class="form-input" value="" required>
    </div>

    <div class="form-group">
      <label for="content">Content:</label>
      <input type="content" name="content" id="content" class="form-input" value="" required>
    </div>
    <button type="submit" class="submit-button">作成</button>
  </form>
</section>
@endsection