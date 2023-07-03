@extends('shapka')

@section('title') Главная  @endsection

@section('content')
 

  <!--анимация слайдера-->
  <div class="slider-container">
    <div class="slider-top">
      <div class="slider-buttons">
        <button class="swiper-button-prev"></button>
        <button class="swiper-button-next"></button>
      </div>
    </div>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide card">
          <img src="{{asset('img/1.png')}}" alt="image" class="swiper-lazy" />
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <div class="swiper-slide card">
          <img src="{{asset('img/2.png')}}" alt="image" class="swiper-lazy" />
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <div class="swiper-slide card">
          <img src="{{asset('img/3.png')}}" alt="image" class="swiper-lazy" />
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <div class="swiper-slide card">
          <img src="{{asset('img/4.png')}}" alt="image" class="swiper-lazy" />
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <div class="swiper-slide card">
          <img src="{{asset('img/5.png')}}" alt="image" class="swiper-lazy" />
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <div class="swiper-slide card">
          <img src="{{asset('img/6.png')}}" alt="image" class="swiper-lazy" />
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
      </div>
      <div class="swiper-pagination gg"></div>
    </div>
  </div>

  <div class="wrapper">
    <div class="block1">
      <h2>О нас</h2>
      <p>Yummy Cake была создана в 2021 году как светлая и уютная кондитерская. <br>Основателем и идейным вдохновителем заведения стала Новикова <br> Екатерина.<br>
        Отменное качество тортов, пирожных и выпечки придало кондитерской <br> популярность среди посетителей и их знакомых. </p>
    </div>

    <div class="block2">
      <center>
        <div class="unik"><b>Уникальное предложение!</b></div>
      </center> Бонусная карта, которая действует на <br> все заказы. После ее оформления, <br> возвращается 5% от суммы заказа в <br>виде бонусов. Впоследствии, можно <br> ими оплатить покупку. 1 бонус равен 1 <br> рублю.
    </div>
  </div>



  <!--карта сайта-->
  <h2>Наш адрес</h2>
  <center>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A1f632666944f73afdea84fc41b98d652a4c40ed2d44bdca369edafa17d68ad71&amp;source=constructor" width="1147" height="374" frameborder="0"></iframe>
  </center>

  <!--блок после карты-->
  <div class="log">
    <div class="log1"><a href=""><img src="{{asset('img/geo.svg')}}" alt="телеграм"></a></div>
    <div class="log2">ул. Профсоюзная, д.34, г.Кострома</div>
  </div>

  <div class="log">
    <div class="log1"><a href=""><img src="{{asset('img/phone2.svg')}}" alt="телеграм"></a></div>
    <div class="log2">+7 (984) 485 22 22</div>
    <button class="log3" type="button" name="show_more"><a href="{{route('catalog')}}">Оформить заказ</a></button>
  </div>

  <div class="log">
    <div class="log1"><a href=""><img src="{{asset('img/mail2.svg')}}" alt="телеграм"></a></div>
    <div class="log2">yummy-cake@gmail.com</div>
  </div>



  <h3>Рекомендуем попробовать</h3>
  <div class="row">
    <div class="column">
      <img src="{{asset('img/7.png')}}" alt="Снег">
      <figcaption>Пирожок с мясом</figcaption>
    </div>
    <div class="column">
      <img src="{{asset('img/8.png')}}" alt="Лес">
      <figcaption>Шоколадный торт</figcaption>
    </div>
    <div class="column">
      <img src="{{asset('img/9.png')}}" alt="Горы">
      <figcaption>Торт с вишней</figcaption>
    </div>
    <div class="column">
      <img src="{{asset('img/10.png')}}" alt="Горы">
      <figcaption>Трайфл шоколадный</figcaption>
    </div>
    <div class="column">
      <img src="{{asset('img/11.png')}}" alt="Горы">
      <figcaption>Степка растрепка</figcaption>
    </div>
  </div>
  <br />

  <!--подвал -->
  <footer>
    <ul class="menuu">
      <img src="{{asset('img/tortik1.png')}}" width="130" height="94" alt="image" />
      <li><a href="{{route('index')}}">Главная</a></li>
      <li><a href="{{route('catalog')}}">Каталог</a></li>
      <li><a href="{{route('reviews')}}">Отзывы</a></li>
      <li><a href="{{route('zakaz')}}">Оформить заказ</a></li>
      <img src="{{asset('img/tortik2.png')}}" alt="image" width="130" height="94" />
    </ul>
    <div class="pf">© Cайт разработан Караевой Викторией, 2023</div>
  </footer>

@endsection
