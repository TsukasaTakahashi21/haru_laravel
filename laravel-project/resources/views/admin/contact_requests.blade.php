@extends('layouts.admin_layout')

@section('title', 'お問い合わせメール管理')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact_requests.css') }}">
@endsection

@section('content') 
<div class="container">
  <h1 class="title">お問い合わせ一覧</h1>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    
  <table class="table">
    <thead>
      <tr>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>メッセージ</th>
        <th>ステータス</th>
        <th>日時</th>
        <th>アクション</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($requests as $request)
      <tr>
        <td>{{ $request->name }}</td>
        <td>{{ $request->email }}</td>
        <td>{{ $request->message }}</td>
        <td>{{ $request->status }}</td>
        <td>{{ $request->created_at }}</td>
        <td>
          <form action="{{ route('admin.contactRequests.updateStatus', $request->id) }}" method="post">
            @csrf 
            <select name="status" id="status" onchange="this.form.submit()">
            <option value="unresolved" {{ $request->status == 'unresolved' ? 'selected' : '' }}>未対応</option>
            <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>対応中</option>
            <option value="resolved" {{ $request->status == 'resolved' ? 'selected' : '' }}>完了</option>
            </select>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection