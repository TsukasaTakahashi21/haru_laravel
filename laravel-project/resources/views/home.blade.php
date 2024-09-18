@extends('layouts.user_layout')

@section('title', 'ホームページ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<section class="top-section">
  <img src="{{ asset('images/top.webp') }}" alt="豊島の風景" class="top-image">
</section>
<section class="about-haru-section">
  <div class="inner">
    <div class="top-message">
      <h2 class="section-title">島のお宿 Haru.について</h2>
      <div class="about-description">
        <p>瀬戸内海の穏やかな景色に包まれるHaru.</p>
        <p>豊島の自然と共に過ごす特別な時間を、広々とした一棟貸しの宿でお楽しみください。</p>
        <p>日常を忘れ、自然の中で新たな発見を見つけてみませんか？</p>
      </div>
    </div>

    <div class="about-haru-content">
      <div class="about-haru-image-wrapper">
        <img src="{{ asset('images/house1.jpg') }}" alt="宿の外観" class="about-haru-image">
      </div>
      <div class="about-haru-text">
        <h3>お部屋</h3>
        <div class="detail-description">
          <p>海と山に囲まれた豊かな自然の中、</p>
          <p>ゆったりと流れる時間を楽しめる古民家宿Haru。</p>
          <p>2階建ての広い空間で、一棟貸しならではの特別な滞在体験</p>
          <p>Haru.でしか味わえない、特別な時間をお過ごしください。</p>
        </div>
        <a href="{{ route('haru') }}" class="detail-link">もっと見る ></a>
      </div>
    </div>
</section>

<section class="about-teshima-section">
  <div class="inner">
    <div class="top-message">
      <h2 class="section-title">豊島について</h2>
      <div class="about-description">
        <p>豊島は香川県の瀬戸内海に浮かぶ島で、豊かな自然と独特の景観を誇ります。</p>
        <p>古くから漁業や農業が盛んな地域で、近年では瀬戸内国際芸術祭の開催地としても知られています。</p>
        <p>地域の伝統と現代アートが融合する魅力的な場所です。</p>
      </div>
    </div>

    <div class="about-teshima-content">
      <div class="about-teshima-image-wrapper">
        <img src="{{ asset('images/teshima.jpg') }}" alt="豊島の風景" class="about-teshima-image">
      </div>
      <div class="about-teshima-text">
        <h3>自然とアートが調和する島</h3>
        <div class="detail-description">
          <p>豊島は、自然の豊かさとアートの創造性が交差する特別な島です。</p>
          <p>瀬戸内国際芸術祭ではアートの島として知られ、数々の展示品やアート作品が点在しています。</p>
          <p>美しい風景と共に、新たな発見と感動を求めて、豊島の魅力を存分に楽しんでください。</p>
        </div>
        <a href="https://teshima-navi.jp/" class="detail-link">詳しくはこちら ></a>
      </div>
    </div>
  </div>
</section>

<section class="about-blog-section">
  <div class="inner">
    <h3 class="section-title">ブログ ~Haru.便り~</h3>
    <div class="blog-posts-wrapper">
      @foreach ($latestBlogs as $blog)
      <a href="{{ route('public_blog_detail', ['id' => $blog->id]) }}" class="blog-link">
        <article class="blog-post">
          @if ($blog->image)
          <img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-image">
          @endif
          <h3 class="blog-title">{{ $blog->title }}</h3>
          <p class="blog-content">{{ Str::limit($blog->content, 15, '...') }}</p>
          <span class="blog-category">{{ $blog->categories->first()->name }}</span>
        </article>
      </a>
      @endforeach
    </div>
    <a href="{{ route('public_blog_lists') }}" class="detail-link">ブログ一覧へ ></a>
  </div>
</section>
@endsection