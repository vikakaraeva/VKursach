@extends('shapka')

@section('title') Оформление заказа  @endsection

@section('content') 


    @if(!isset($user))
        <div align="center" style="margin-top: 20px; margin-bottom: 20px"><a href="{{route('login')}}">Войдите в учетную запись, что бы сделать заказ</a></div>
    @endif
    @if(!isset($tovar))
        <div align="center" style="margin-top: 20px; margin-bottom: 20px"><a href="{{route('catalog')}}">Прежде чем оформить заказ, выберите что хотели бы заказать из каталога</a></div>
    @else
        <form action="{{route('zakaz')}}" method="post" required>
            @csrf
          @foreach($tovar as $tv)
          <br>
          <div class="product-card">
              <input type="hidden" name="id_tovara" value="{{$tv->id}}">

              <div class="product-details">
                  <h3 class="product-title">{{$tv->title}}</h3><br>
                  <center><img  width="250" height="250" src="{{asset('storage/'.$tv->img)}}" alt="Товар"></center><br>
                  <h5 class="product-price">Цена: {{$tv->price}}₽</h5>
              </div>
          </div>
         @endforeach

            <label>Тип доставки</label>
            <select style="margin-bottom: 10px"  name="type_delivery" required >
                <option disabled selected >Выберите тип доставки</option>
                <option>Доставка (рассчитывается индивидуально) </option>
                <option>Самовывоз</option>
            </select>

            <label>Ваши пожелания</label>
            <input type="pozh" name="pozhelaniya" placeholder="Введите ваши пожелания" cols="30" rows="10" required>

            <button class="log7" type="submit" name="show_more">Отправить</button>
        </form>

    @endif

    <h3>Рекомендуем попробовать</h3>
    <div class="row">
      <div class="column">
        <img src="img/12.png" alt="Снег">
        <figcaption>Торт клубника-карамель</figcaption>
      </div>
      <div class="column">
        <img src="img/13.png" alt="Лес">
        <figcaption>Пирожок с картофелем</figcaption>
      </div>
      <div class="column">
        <img src="img/14.png" alt="Горы">
        <figcaption>Торт с малиной и <br>
голубикой</figcaption>
      </div>
      <div class="column">
        <img src="img/15.png" alt="Горы">
        <figcaption>Эклер в шоколаде</figcaption>
      </div>
      <div class="column">
        <img src="img/16.png" alt="Горы">
        <figcaption>Степка растрепка<br>
песочный</figcaption>
      </div>
    </div>
     <div class="row">
      <div class="column">
        <img src="img/17.png" alt="Снег">
        <figcaption>Ватрушка с творогом<br>
 и изюмом
</figcaption>
      </div>
      <div class="column">
        <img src="img/18.png" alt="Лес">
        <figcaption>Торт медовик <br>
карамельный

</figcaption>
      </div>
      <div class="column">
        <img src="img/19.png" alt="Горы">
        <figcaption>Чизкейк карамель-банан</figcaption>
      </div>
      <div class="column">
        <img src="img/20.png" alt="Горы">
        <figcaption>Чизкейк с малиной

</figcaption>
      </div>
      <div class="column">
        <img src="img/21.png" alt="Горы">
        <figcaption>Пирожное из шоколада<br>
и карамели</figcaption>
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
