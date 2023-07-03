<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="shortcut icon" href="{{asset('img/tortik1.png')}}" type="image/x-icon">
  <!--подключение css-->
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/style_reviews.css')}}" />

  <!--подключение к плагину-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
  <!--шрифт Alex Brush-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet"/>
  <!--шрифт Arsenal-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arsenal&display=swap"/>
  <title> @yield('title')</title>
</head>
<body>
    <!--индикатор прогрузки-->
  <div class="fix">
    <div class="progress-container">
      <div class="progress-bar" id="myBar"></div>
    </div>
  </div>
   <!--скролл-->
    <div class="go-top"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="60" viewBox="0 0 24 24">
      <path fill="currentColor" d="M12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0 2c5.52 0 10-4.48 10-10S17.52 2 12 2S2 6.48 2 12s4.48 10 10 10zm-1-10v4h2v-4h3l-4-4l-4 4h3z" />
    </svg></div>
    @if(isset($user))
        @if(isset($order))
            @foreach($user as $us)
                <div class="knopki">
                    <div class="kn"><a href="https://t.me/yummycake31" target="_blank"><img src="{{asset('img/tg.svg')}}" alt="телеграм"></a></div>
                    <div class="kn"><a href="tel:+1234567890"><img src="{{asset('img/phone.svg')}}" alt="телефон"></a></div>
                    <div class="kn"><a href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJWHcxrrbdNhGVvCcplqdFxmKZtthCDhMnCNZmzxvNwJDPkxfrCtKqdzbRrBDqhmnPhg"><img src="{{asset('img/mail.svg')}}" alt="почта"></a></div>


                    <a href="{{route('cabinet')}}"><div class="knop2">{{$us->fam}} {{$us->name}} {{$us->otch}}</div></a>

                    <div class="for">
                        <input type="text" id="text-to-find" class="but" placeholder="Поиск по сайту">
                        <input type="button" class="but1" onclick="javascript: FindOnPage('text-to-find'); return false;" />
                    </div>
                </div>

                <hr>

                <header class="header">
                    <div class="container header-container">
                        <div class="text">Yummy-cake</div>

                        <ul class="menu">
                            <font size="5">
                                <a href="{{route('index')}}"><b>Главная</b></a>
                                @if($us->type_user != 'Администратор')
                                    <a href="{{route('catalog')}}"><b>Каталог</b></a>
                                @else
                                    <a href="{{route('catalog_adm')}}"><b>Каталог</b></a>
                                @endif
                                <a href="{{route('reviews')}}"><b>Отзывы</b></a>
                                <a href="{{route('zakaz')}}"><b>Оформить заказ</b></a>
                            </font>
                        </ul>
                    </div>
                </header>
            @endforeach
        @else
            @foreach($user as $us)
                <!--шапка-->
                <div class="knopki">
                    <div class="kn"><a href="https://t.me/yummycake31" target="_blank"><img src="{{asset('img/tg.svg')}}" alt="телеграм"></a></div>
                    <div class="kn"><a href="tel:+1234567890"><img src="{{asset('img/phone.svg')}}" alt="телефон"></a></div>
                    <div class="kn"><a href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJWHcxrrbdNhGVvCcplqdFxmKZtthCDhMnCNZmzxvNwJDPkxfrCtKqdzbRrBDqhmnPhg"><img src="{{asset('img/mail.svg')}}" alt="почта"></a></div>

                    <a href="{{route('cabinet')}}"><div class="knop2">{{$us->fam}} {{$us->name}} {{$us->otch}}</div></a>

                    <div class="for">
                        <input type="text" id="text-to-find" class="but" placeholder="Поиск по сайту">
                        <input type="button" class="but1" onclick="javascript: FindOnPage('text-to-find'); return false;" />
                    </div>
                </div>

                <hr>

                <header class="header">
                    <div class="container header-container">
                        <div class="text">Yummy-cake</div>

                        <ul class="menu">
                            <font size="5">
                                <a href="{{route('index')}}"><b>Главная</b></a>
                                @if($us->type_user != 'Администратор')
                                    <a href="{{route('catalog')}}"><b>Каталог</b></a>
                                @else
                                    <a href="{{route('catalog_adm')}}"><b>Каталог</b></a>
                                @endif
                                <a href="{{route('reviews')}}"><b>Отзывы</b></a>
                                <a href="{{route('zakaz')}}"><b>Оформить заказ</b></a>
                            </font>
                        </ul>
                    </div>
                </header>
            @endforeach
        @endif
    @else
    <div class="knopki">
      <div class="kn"><a href="https://t.me/yummycake31" target="_blank"><img src="{{asset('img/tg.svg')}}" alt="телеграм"></a></div>
      <div class="kn"><a href="tel:+1234567890"><img src="{{asset('img/phone.svg')}}" alt="телефон"></a></div>
      <div class="kn"><a href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJWHcxrrbdNhGVvCcplqdFxmKZtthCDhMnCNZmzxvNwJDPkxfrCtKqdzbRrBDqhmnPhg"><img src="{{asset('img/mail.svg')}}" alt="почта"></a></div>

      <div class="kn2"><a href="{{route('login')}} "><img src="{{asset('img/vhod.svg')}}" alt="вход"></a></div> {{-- vhod.php --}}

      <div class="for">
        <input type="text" id="text-to-find" class="but" placeholder="Поиск по сайту">
        <input type="button" class="but1" onclick="javascript: FindOnPage('text-to-find'); return false;" />
      </div>
    </div>
    <div class="hr"></div>
  <header class="header">
    <div class="container header-container">
      <div class="text">Yummy-cake</div>

      <ul class="menu">
        <font size="5">
          <a href="{{route('index')}}"><b>Главная</b></a>
          <a href="{{route('catalog')}}"><b>Каталог</b></a>
          <a href="{{route('reviews')}}"><b>Отзывы</b></a>
          <a href="{{route('zakaz')}}"><b>Оформить заказ</b></a>
        </font>
      </ul>
    </div>
  </header>

  @endif

  @yield('content')
   <!--подключение js-->
  <script src="{{asset('js/karta.js')}}"></script>
  <script src="{{asset('js/swiper.min.js')}}"></script>
  <script src="{{asset('js/slider.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
