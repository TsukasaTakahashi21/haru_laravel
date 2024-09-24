@extends('layouts.user_layout')

@section('title', 'Haru')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/haru.css') }}">
@endsection

@section('content')
<section class="top-section">
  <img src="{{ asset('images/top.webp') }}" alt="豊島の風景" class="top-image">
</section>

<section class="about-haru">
  <div class="inner">
    <h2 class="section-title">島のお宿 Haru.について</h2>
    <p>瀬戸内海の穏やかな景色に包まれるHaru。<br>豊島の自然と共に過ごす特別な時間を、広々とした一棟貸しの宿でお楽しみください。<br>日常を忘れ、自然の中で新たな発見を見つけてみませんか？</p>
  </div>
</section>

<section class="rooms">
  <div class="inner">
    <h2 class="section-title">お部屋</h2>
    <div class="room-photos">
      <img src="{{  asset('images/house1.jpg') }}" alt="">
      <img src="{{  asset('images/house2.jpg') }}" alt="">
      <img src="{{  asset('images/house3.webp') }}" alt="">
      <img src="{{  asset('images/house8.jpg') }}" alt="">
      <img src="{{  asset('images/house5.webp') }}" alt="">
    </div>
    <a href="{{ route('room') }}" class="detail-link">全ての写真を表示 ></a>
  </div>
</section>

<section class="services">
  <div class="inner">
    <h3 class="section-title">サービス内容</h3>
    <div class="service-list">
      <!-- アメニティー -->
      <div class="service-item" data-modal="amenities-modal">
        <div class="icon">
          <i class="fas fa-bath"></i>
        </div>
        <h4 class="service-title">アメニティー</h4>
        <p class="service-content">詳しくはこちら▼</p>
      </div>
      <!--モーダル -->
      <div id="amenities-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h4>アメニティー</h4>
          <p>歯ブラシ、カミソリ、ボディタオル、スキンケア用品、シャンプー、ボディソープ等を完備しております。</p>
        </div>
      </div>

      <!-- Wi-Fi -->
      <div class="service-item" data-modal="wifi-modal">
        <div class="icon">
          <i class="fas fa-wifi"></i>
        </div>
        <h4 class="service-title">無料Wi-Fi</h4>
        <p class="service-content">詳しくはこちら▼</p>
      </div>
      <!-- モーダル -->
      <div id="wifi-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h4>無料Wi-Fi</h4>
          <p>館内全域で高速Wi-Fiが利用可能です。リモートワークにも最適です。</p>
        </div>
      </div>


      <!-- 朝食サービス -->
      <div class="service-item" data-modal="breakfast-modal">
        <div class="icon">
          <i class="fas fa-utensils"></i>
        </div>
        <h4 class="service-title">朝食サービス</h4>
        <p class="service-content">詳しくはこちら▼</p>
      </div>
      <!--モーダル -->
      <div id="breakfast-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h4>朝食サービス</h4>
          <p>当宿では朝食のみ（￥800）でご提供しております。ご希望があればご予約時にお伝えください。</p>
        </div>
      </div>

      <!-- 館内設備 -->
      <div class="service-item" data-modal="facility-modal">
        <div class="icon">
          <i class="fas fa-building"></i>
        </div>
        <h4 class="service-title">館内設備</h4>
        <p class="service-content">詳しくはこちら▼</p>
      </div>
      <!--モーダル -->
      <div id="facility-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h4>館内設備</h4>
          <p>キッチン・リビング・トイレ・洗面台・洗濯機（無料）</p>
        </div>
      </div>


      <!-- 部屋設備 -->
      <div class="service-item" data-modal="room-modal">
        <div class="icon">
          <i class="fas fa-bed"></i>
        </div>
        <h4 class="service-title">部屋設備</h4>
        <p class="service-content">詳しくはこちら▼</p>
      </div>
      <!--モーダル -->
      <div id="room-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h4>部屋設備</h4>
          <p>電子レンジ・トースター・電気ケトル・お皿などの食器・布団・ソファーなど</p>
        </div>
      </div>

      <!-- 自炊 -->
      <div class="service-item" data-modal="cooking-modal">
        <div class="icon">
          <i class="fas fa-utensils"></i>
        </div>
        <h4 class="service-title">自炊</h4>
        <p class="service-content">詳しくはこちら▼</p>
      </div>
      <!--モーダル -->
      <div id="cooking-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h4>自炊</h4>
          <p>食材を持参して、宿にて自炊ができます。飲食店にてテイクアウトし宿で食べて頂く事も可能です。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact">
  <div class="inner">
    <h3 class="section-title">お問い合わせ</h3>
    <div class="contact-container">
      <div class="contact-info">
        <div class="contact-address">
          <p>住所 | 香川県小豆郡土庄町豊島唐櫃2488</p>
        </div>
        <div class="contact-email">
          <p>メール｜ haru.shimayado@gmail.com</p>
        </div>
        <div class="contact-sns">
          <p>instagram |</p>
          <a href="https://www.instagram.com/shimayado.haru/" target="_blank" class="sns-icon">
            <i class="fab fa-instagram"></i>
          </a>
          <p>Facebbook |</p>
          <a href="https://www.facebook.com/shiamyadoharu" target="_blank" class="sns-icon">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>

      <form action="" class="contact-form">
        <div class="form-group">
          <label for="first-name">Name</label>
          <input type="text" name="first-name" id="first-name" class="input-form">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="input-form">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" class="textarea-form"></textarea>
        </div>
        <button type="submit" class="submit-button">Send</button>
      </form>
    </div>
  </div>
</section>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3288.5692180048054!2d134.0969456!3d34.488450900000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35538b4b5eb6ce1d%3A0x78f65adedac94afb!2z44CSNzYxLTQ2NjIg6aaZ5bed55yM5bCP6LGG6YOh5Zyf5bqE55S66LGK5bO25ZSQ5quD77yS77yU77yY77yY!5e0!3m2!1sja!2sjp!4v1726580598204!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const serviceItems = document.querySelectorAll('.service-item');
    const modals = document.querySelectorAll('.modal');
    const closeButtons = document.querySelectorAll('.close');

    // モーダルを閉じる関数
    function closeAllModals() {
      modals.forEach(modal => {
        modal.style.display = 'none';
      });
    }

    // サービスアイテムをクリックしてモーダルを表示
    serviceItems.forEach(item => {
      item.addEventListener('click', function() {
        closeAllModals();
        const modalId = this.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.style.display = 'block';
        }
      });
    });

    //閉じるボタンをクリックして閉じる
    closeButtons.forEach(button => {
      button.addEventListener('click', function() {
        this.closest('.modal').style.display = 'none';
      });
    });

    //モーダル外をクリックしたら閉じる
    window.addEventListener('click', function(event) {
      modals.forEach(modal => {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });
  });
</script>

@endsection