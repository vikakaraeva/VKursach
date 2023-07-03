

<link rel="stylesheet" href="{{asset('css/style_logreg.css')}}" />
@extends('shapka')

@section('title') Регистрация  @endsection

@section('content')
<br>
<br>
 @if(isset($login_err) && $login_err == true)
        <div class="alert alert-danger">
            <ul>
                <center><li>Логин {{$login}} уже существует</li></center>
            </ul>
        </div>
    @endif

    @if(isset($reg_err) && $reg_err == true)
        <div class="alert alert-danger">
            <ul>
                <center><li>Пароли не совпадают</li></center>
            </ul>
        </div>
    @endif

   
    <!-- Форма регистрации -->
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Фамилия</label>
        <input type="text" required name="fam" placeholder="Введите фамилию">
        <label>Имя</label>
        <input type="text" required name="name" placeholder="Введите имя">
        <label>Отчество</label>
        <input type="text" required name="otch" placeholder="Введите отчество">
        <label>Логин</label>
        <input type="text" required name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" required name="email" placeholder="Введите адрес своей почты">
        <label>Телефон</label>
        <input type="text" required name="phone_number" placeholder="Введите телефон">
        <label>Изображение профиля</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" required name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" required name="password_confirm" placeholder="Подтвердите пароль">
        <button class="log6" type="submit" name="register-btn">Регистрация</button><br>
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