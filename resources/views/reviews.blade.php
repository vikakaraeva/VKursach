@extends('shapka')

@section('title') Отзывы @endsection

@section('content') 
       
       

   @if(isset($user))
   <div class="ost1">Оставьте отзыв о заказе</div>
       <div class="content">
           
           <div class="send">
               <form method="post" action="{{route('reviews')}}" id="review">
                   @csrf
                   <div class="ost2">Оцените продукт</div>
                   <div class="rating" >
                       <input type="radio" class="rating" id="star5" name="rating" value="5" /><label for="star5"></label>
                       <input type="radio" class="rating" id="star4" name="rating" value="4" /><label for="star4"></label>
                       <input type="radio" class="rating" id="star3" name="rating" value="3" /><label for="star3"></label>
                       <input type="radio" class="rating" id="star2" name="rating" value="2" /><label for="star2"></label>
                       <input type="radio" class="rating" id="star1" name="rating" value="1" /><label for="star1"></label>
                   </div>


                  <textarea name="message" cols="7" rows="5" placeholder="Введите отзыв о товаре" required></textarea>

                   

                    <button class="log4" type="submit" name="show_more">Отправить отзыв</button>
               </form>
           </div>
       </div>
   @else
       <div align="center" style="margin-top: 20px; margin-bottom: 20px"><a href="{{route('login')}}">Войдите в учетную запись, что бы оставить отзыв</a></div>
       
   @endif
   <div class="ost1">Наши отзывы</div>
   @if(isset($otzivi) || $otzivi !=[])
       @foreach($otzivi as $otz)
         
       <div class="reviews">
       
           <div class="review_text">
             
               <b>Имя:</b> {{$otz->name}} | <b>Дата:</b>  {{date('d.m.y',strtotime($otz->date))}} <b>Время:</b> {{date('H.i',strtotime($otz->date. '+3 hours'))}} | <b>Оценка:</b> {{$otz->rating}}/5
            
               <br><br>
               <b> Отзыв:</b> {{$otz->message}}<br> 
           </div>
       </div>
       @endforeach
   @endif

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

