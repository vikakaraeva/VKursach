@extends('shapka')

@section('title') Личный кабинет @endsection

@section('content')
 @if(isset($user))
  @foreach($user as $us)
  <br>
 <div class="cont">
  <div class="user-info">
    <div class="greeting">Здравствуйте, {{$us->fam}} {{$us->name}} {{$us->otch}}!</div>
    <div class="order-number"><b>Ваши данные:</b></div>
    <div class="info"><b>Телефон:</b> {{$us->phone_number}}</div>
    <div class="info"><b>Почта: </b>{{$us->email}}</div>
      @if($us->avatar != "")
          <div class="info"><br><img width="250" height="250" src="{{asset('storage/'.$us->avatar)}}" alt="Профиль"></div>
          <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$us->id_user}}">
              <button class="add-button" name="delete" type="submit">Удалить фото</button>
          </form>
      @else
        <div class="info">Изображение профиля: отсутствует</div>
          <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$us->id_user}}"><br>
              <input class="knops2" type="file" name="avatar"> 
              <button class="add-button" name="post" type="submit">Добавить фото</button>
          </form>
      @endif

    <div class="knops"><a href="{{'leave'}}">Выход из аккаунта</a></div>
     </div>
  @endforeach

 <div class="order-i">
    <div class="headin">Информация о заказах:</div>
    @foreach($order as $order)
    <div class="orders">
      <div class="order-number"><b>Заказ № {{$order->id_order}}</b></div>
      <div class="order-date"><b>Дата создания:</b> {{$order->date}}</div>
      <div class="order-wishes"><b>Пожелания:</b> {{$order->pozhelaniya}}</div>
      <div class="order-delivery"><b>Тип доставки:</b> {{$order->type_delivery}}
      </div>
    </div>
    @endforeach
  </div>
</div>

 @endif

@endsection

