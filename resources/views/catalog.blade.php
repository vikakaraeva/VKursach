<link rel="stylesheet" href="{{asset('css/style_in_catalog/style.css')}}">

@extends('shapka')

@section('title') Каталог  @endsection

@section('content')   

    <main class="main">
        <div class="catalog_page_content">
            <div class="catalog_navigation">
                <a href="#marmelad" color="#8D3123">Торты</a>
                <a href="#drinks">Выпечка</a>
                <a href="#cookie">Пирожные</a>
                <a href="#sweets">Напитки</a>
            </div>
            <div id="marmelad">
                <div class="pod">Торты</div>
                <div class="cards_container">
                    @foreach($tort as $tt)
                        <div class="catalog_item">
                            <div class="catalog_card">
                                <div class="card_picture">
                                    <img src="{{asset('storage/'.$tt->img)}}">
                                </div>
                                <div class="card_details">
                                    <div class="price">
                                        <h4>{{$tt->price}}₽</h4>
                                    </div>
                                    <div class="item_name">{{$tt->title}}</div>
                                  
                                    <div class="card_buttons">
                                        <form action="{{route('catalog')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_tovara" value="{{$tt->id}}">

                                         <div class="card_buttons">
                                         <button type="submit" class="add_to_cart" id="addToCartBtn" value="Заказать">Заказать</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="drinks">
                 <div class="pod">Выпечка</div>
                <div class="cards_container">
                    @foreach($vipechka as $vp)
                        <div class="catalog_item">
                            <div class="catalog_card">
                                <div class="card_picture">
                                    <img src="{{asset('storage/'.$vp->img)}}">
                                </div>
                                <div class="card_details">
                                    <div class="price">
                                        <h4>{{$vp->price}}₽</h4>
                                    </div>
                                    <div class="item_name">{{$vp->title}}</div>
                                  
                                    <div class="card_buttons">
                                        <form action="{{route('catalog')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_tovara" value="{{$vp->id}}">

                                        <div class="card_buttons">
                                         <button type="submit" class="add_to_cart" id="addToCartBtn" value="Заказать">Заказать</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="cookie">
                 <div class="pod">Пирожные</div>
                <div class="cards_container">
                    @foreach($pir as $pr)
                        <div class="catalog_item">
                            <div class="catalog_card">
                                <div class="card_picture">
                                    <img src="{{asset('storage/'.$pr->img)}}">
                                </div>
                                <div class="card_details">
                                    <div class="price">
                                        <h4>{{$pr->price}}₽</h4>
                                    </div>
                                    <div class="item_name">{{$pr->title}}</div>
                                    
                                    <div class="card_buttons">
                                        <form action="{{route('catalog')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_tovara" value="{{$pr->id}}">
                                            <div class="card_buttons">
                                         <button type="submit" class="add_to_cart" id="addToCartBtn" value="Заказать">Заказать</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="sweets">
                <div class="pod">Напитки</div>
                <div class="cards_container">
                    @foreach($nap as $nap)
                        <div class="catalog_item">
                            <div class="catalog_card">
                                <div class="card_picture">
                                    <img src="{{asset('storage/'.$nap->img)}}">
                                </div>
                                <div class="card_details">
                                    <div class="price">
                                        <h4>{{$nap->price}}₽</h4>
                                    </div>
                                    <div class="item_name">{{$nap->title}}</div>
                                   
                                    <div class="card_buttons">
                                        <form action="{{route('catalog')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_tovara" value="{{$nap->id}}">
                                           <div class="card_buttons">
                                         <button type="submit" class="add_to_cart" id="addToCartBtn" value="Заказать">Заказать</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>
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
