<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="{{asset('css/style_tovar.css')}}" />
    <title>Добавление товара</title>
</head>
<body>

    <form action="{{route('catalog_izm_post')}}" method="post" enctype="multipart/form-data">
        @csrf

        @foreach($row as $row)
            <input type="hidden" name="id" value="{{$row->id}}">
            <input type="text" name="title" value="{{$row->title}}" placeholder="Название товара" required>
            
            <center><img width="200" height="200" src="{{asset('storage/'.$row->img)}}" alt=""></center><br>
            <label>Изменить изображение</label>
            <input type="file" name="img" value="{{$row->img}}">
            <select name="category" required>
                <option disabled>Категория товара</option>
                <option value="{{$row->category_id_category}}" selected>{{$row->name_category}}</option>
                @foreach($category as $cat)
                    @if($row->name_category != $cat->name_category)
                        <option value="{{$cat->id_category}}">{{$cat->name_category}}</option>
                    @endif
                @endforeach
            </select>
            <input type="text" placeholder="Цена" value="{{$row->price}}" name="price" maxlength="5" required>
        @endforeach
        <input type="submit" value="Изменить">

          <a href="{{route('catalog_adm')}}"><input type="submit" value="К товарам"></a>

    </form>
 
</body>
</html>
