<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="{{asset('css/style_tovar.css')}}" />
       <!--шрифт Arsenal-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arsenal&display=swap"/>
    <title>Добавление товара</title>
</head>
<body>
 <div class="cont">
  <div class="order-i">
    <div class="headin">Информация о заказах:</div>
    @foreach($order as $order)
    <div class="orders">
      <div class="order-number"><b>Заказ № {{$order->id_order}}</b></div>
      <div class="order-number"><b>ID пользователя: {{$order->user_id_user}}</b></div>
      <div class="order-date"><b>ID товара: </b> {{$order->catalog_id}}</div>
      <div class="order-date"><b>Дата создания:</b> {{$order->date}}</div>
      <div class="order-wishes"><b>Пожелания:</b> {{$order->pozhelaniya}}</div>
      <div class="order-delivery"><b>Тип доставки:</b> {{$order->type_delivery}}
      </div>
    </div>
    @endforeach
  </div>
  
  <div class="user-info">
    <form action="" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="title" placeholder="Название товара" required>
      <input type="file" name="img">
      <select name="category" required>
          <option disabled selected>Категория товара</option>
          @foreach($category as $cat)
          <option value="{{$cat->id_category}}">{{$cat->name_category}}</option>
          @endforeach
      </select>
      <input type="text" placeholder="Цена" name="price" maxlength="5" required>
      <center><input type="submit" value="Создать товар"></center>
    </form>
  </div>
</div>

</body>
</html>
