<link rel="stylesheet" href="{{asset('css/style_logreg.css')}}" />
@extends('shapka')

@section('title') Вход  @endsection

@section('content')
<br>
<br>

     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <center><li>Некоторые поля были не заполнены</li></center>
        </ul>
    </div>
    @endif

    @if(isset($login_count))
    <div class="alert alert-danger">
        <ul>
             <center><li>Неверный логин или пароль</li></center>
        </ul>
    </div>
    @endif

    @if(isset($login))
        <div class="alert alert-danger">
        <ul>
            <center><li>Войдите в аккаунт, что бы оформить заказ</li></center>
        </ul>
    </div>
    @endif
   

    <!-- Форма авторизации -->
    <form action="{{route('login')}}" method="post">
        @csrf
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин" required>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <button class="log5" type="submit" name="show_more">Войти</button><br>
        <a href="{{route('register')}}" class="reg">Регистрация</a>
    </form> 
    <br><br><br><br><br><br><br>


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

