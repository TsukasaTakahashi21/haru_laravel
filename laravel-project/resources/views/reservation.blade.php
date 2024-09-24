@extends('layouts.user_layout')

@section('title', '予約ページ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

@endsection

@section('content')
<section class="top-section">
  <img src="{{ asset('images/teshima5.jpg') }}" alt="豊島の風景" class="top-image">
</section>


<section class="reservation-calendar">
  <div class="inner">
    <h2 class="section-title">宿泊のご予約</h2>
    <div id="calendar"></div>
  </div>
</section>

<section class="booking-detail">
  <div class="inner">
    <h2 class="section-title">料金・予約について</h2>

    <div class="detail-group">
      <div class="detail-head">
        <p>基本料金</p>
      </div>
      <div class="detail-text">
        <p>25,000円 / 1室（税別）</p>
      </div>
    </div>

    <div class="detail-group">
      <div class="detail-head">
        <p>人数料金</p>
      </div>
      <div class="detail-text">
        <p>3名から追加料金・・・1名につき8,000円/泊（税別）</p>
        <p>小学生・・・4,000円 / 泊（税別）</p>
        <p>6歳以下（未就学児）・・・無料</p>
      </div>
    </div>

    <div class="detail-group">
      <div class="detail-head">
        <p>チェックイン</p>
      </div>
      <div class="detail-text">
        <p>15:00 ~</p>
      </div>
    </div>

    <div class="detail-group">
      <div class="detail-head">
        <p>チェックアウト</p>
      </div>
      <div class="detail-text">
        <p>~ 10:00</p>
      </div>
    </div>

    <div class="detail-group">
      <div class="detail-head">
        <p>支払い方法</p>
      </div>
      <div class="detail-text">
        <p>現金・PayPay</p>
      </div>
    </div>
  </div>
</section>

<div id="overlay" class="overlay"></div>
<div id="infoModal" class="modal">
  <div class="modal-content">
    <button id="closeModal" class="close-button">X</button>
    <h2 class="modal-title">宿のルールと注意事項</h2>
    <p class="modal-text">・夜間（pm２１：００～）は島の音に耳を傾け、なるべくお静かにお過ごしください。</p>
    <p class="modal-text">・全館禁煙です。指定場所での喫煙にご協力下さい（加熱式たばこも同様）</p>
    <p class="modal-text">・宿では蚊や虫などの対策を行っていますが、ご自身でも予防、対策を行ってきていただく事でより快適に過ごせるかと思います。</p>
    <p class="modal-text">・瀬戸内国際芸術祭の期間中は交通量も多く、島には高齢のドライバーも沢山います。交通マナーには十分に気を付けて観光して下さい。</p>
    <p class="modal-text">・島にはコンビニエンスストアはありません。また、ゆうちょ銀行、JAバンク以外のATMはございません。島内ではほとんどが現金決済になります。必要なものや現金は事前にご準備のうえ、ご来島ください。</p>
    <p class="modal-text">・ご宿泊のお客様以外の方の、施設内への立ち入りはお断りしています。</p>
    <p class="modal-text">・お客様の過失による施設の損傷・破損は実費請求させていただきます。また、鍵を紛失された場合も補償金をご負担いただきます。</p>
    <p class="modal-text">・急病の場合は島内には救急病院はございませんので、宇野もしくは高松の病院へ海上タクシーで実費にてお客様自身でご移動いただくこととなります。</p>

    <label>
      <input type="checkbox" id="confirm-check" required>確認しました
    </label>


    <div class="modal-buttons">
      <button id="airbnbButton" disabled>Airbnbからの予約はこちら</button>
      <button id="vacationStayButton" disabled>VacationSTAYからの予約はこちら</button>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/main.min.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: '/get-calendar-date',
      eventClick: function(info) {
        if (info.event.extendedProps.clickable) {
          showModal();
        }
      },
      eventContent: function(info) {
        return {
          html: '<span>' + info.event.title + '</span>'
        };
      }
    });

    calendar.render();

    function showModal() {
      const closeButton = document.getElementById('closeModal');
      const modal = document.getElementById('infoModal');
      const confirmCheck = document.getElementById('confirm-check');
      const airbnbButton = document.getElementById('airbnbButton');
      const vacationStayButton = document.getElementById('vacationStayButton');

      overlay.style.display = 'flex'; 
      modal.style.display = 'flex';

      closeButton.addEventListener('click',closeModal); 
      overlay.addEventListener('click', closeModal);


      confirmCheck.addEventListener('change', function() {
        if (confirmCheck.checked) {
          airbnbButton.disabled = false;
          vacationStayButton.disabled = false;
        } else {
          airbnbButton.disabled = true;
          vacationStayButton.disabled = true;
        }
      });

      airbnbButton.addEventListener('click', function() {
        window.location.href = 'https://www.airbnb.com/h/shimayado-haru';
      });

      vacationStayButton.addEventListener('click', function() {
        window.location.href = 'https://vacation-stay.jp/listings/266521';
      });

      function closeModal() {
        confirmCheck.checked = false;
        airbnbButton.disabled = true;
        vacationStayButton.disabled = true;

        modal.style.display = 'none';
        overlay.style.display = 'none'; 
      }
    }
  });
</script>
@endsection