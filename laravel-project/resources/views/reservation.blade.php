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
          window.location.href = '/reservation-page?date=' + info.event.startStr;
        }
      },
      eventContent: function(info) {
        return {
          html: '<span>' + info.event.title + '</span>'
        };
      }
    });

    calendar.render();
  });
</script>
@endsection