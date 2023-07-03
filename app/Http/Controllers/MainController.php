<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $user = DB::table('user')
                ->where('id_user', '=', $_SESSION['id'])
                ->get();


            if(count($user)==0)  //  Из-за бага с присвоением к $_SESSION['id'] значения
                return view('index');

            return view('index', ['user' => $user]);
        }

        return view('index');
    }


     public function cabinet(Request $rq)
    {
        if(!isset($_POST) || $_POST == []){

            $zakaz = DB::table('order')
                ->select(
                    'order.id_order',
                    'order.date',
                    'order.pozhelaniya',
                    'order.type_delivery',
                    'catalog.title',
                    'catalog.price')
                ->join('catalog','id','=','catalog_id')
                ->where('user_id_user','=',$_SESSION['id'])
                ->get();

            $user = DB::table('user')
                ->where('id_user','=',$_SESSION['id'])
                ->get();

            return view ('cabinet', ['user'=> $user,'order'=>$zakaz]);
        } else {

            if(isset($rq['post'])){

                $id = $rq->input('id');

                if($rq['avatar'] != null)
                    $avatar = $rq->file('avatar')->store('user','public');

                DB::table('user')
                    ->where('id_user','=',$id)
                    ->update([
                        'avatar'=>$avatar
                    ]);

                return redirect()->route('cabinet');

            }

            if(isset($rq['delete'])){
                $id = $rq->input('id');

                DB::table('user')
                    ->where('id_user','=',$id)
                    ->update([
                        'avatar'=>''
                    ]);

                return redirect()->route('cabinet');
            }

        }

    }


    public function reviews(Request $rq)
    {
        if(isset($_POST) && $_POST!=[]){  //обработка запроса
            $values = $rq->all(); //из переменной выбираем все ее атрибуты

            $user_name = DB::table('user')
                ->where('id_user','=',$_SESSION['id'])
                ->get();

            foreach ($user_name as $user){
                $name = $user->name;
                $email = $user->email;
            }

            DB::table('otzivi') //добавление в бд
                ->insert([
                    'name' => $name,
                    'email'=>$email,
                    'date'=>date('Y-m-d H:i'),
                    'rating'=>$values['rating'],
                    'message'=>$values['message']
                ]);

            return redirect()->route('reviews'); //вывод на страницу
        } else {
            $user = null;

            if(isset($_SESSION['id']) || $_SESSION['id'] != []){
                $user = DB::table('user')
                    ->where('id_user', '=', $_SESSION['id'])
                    ->get();
            }

            $otzivi = DB::table('otzivi')
                ->get();

            if($user == null) {
                return view('reviews',['otzivi'=>$otzivi]);
            } else if(count($user) == 0){
                 return view('reviews',['otzivi'=>$otzivi]);
            };


            if(count($user) == 0)
                return view('reviews',['otzivi'=>$otzivi]);

            return view('reviews',['user'=>$user,'otzivi'=>$otzivi]);


        }
    }

    public function catalog(Request $rq)
    {
        if(!isset($_POST) || $_POST ==[]){

            $user = null;

            if(isset($_SESSION['id']) || $_SESSION['id'] != []){
                $user = DB::table('user')
                    ->where('id_user', '=', $_SESSION['id'])
                    ->get();
            }

            $tort = DB::table('catalog')
                ->where('category_id_category', '=', '1')
                ->get();

            $vipechka = DB::table('catalog')
                ->where('category_id_category', '=', '2')
                ->get();

            $pir = DB::table('catalog')
                ->where('category_id_category', '=', '3')
                ->get();

            $nap = DB::table('catalog')
                ->where('category_id_category', '=', '4')
                ->get();


            if($user == null) {
               return view('catalog',['tort' => $tort, 'vipechka' => $vipechka, 'pir' => $pir, 'nap' => $nap]);
            } else if(count($user) == 0){
                return view('catalog',['tort' => $tort, 'vipechka' => $vipechka, 'pir' => $pir, 'nap' => $nap]);
            }
            return view('catalog', ['user'=>$user,'tort' => $tort, 'vipechka' => $vipechka, 'pir' => $pir, 'nap' => $nap]);


        } else{
            if(!isset($_SESSION['id']) || $_SESSION['id'] == [])
                return view('errors/login_errors',['login'=>true]);

            $tv = $rq->all();

            $tovar = DB::table('catalog')
                ->where('id','=',$tv['id_tovara'])
                ->get();

            $user = DB::table('user')
                    ->where('id_user', '=', $_SESSION['id'])
                    ->get();

            return view('zakaz',['tovar'=>$tovar,'user'=>$user]);
        }
    }


    public function zakaz(Request $rq){
        if(!isset($_POST) || $_POST == []){
            $user = null;

            if(isset($_SESSION['id']) || $_SESSION['id'] != []){
                $user = DB::table('user')
                    ->where('id_user', '=', $_SESSION['id'])
                    ->get();

                if(count($user)==0)
                    return view('zakaz');

                return view('zakaz',['user'=>$user]);
            } else
                return view('zakaz');

        } else {
            $order = $rq->all();

            DB::table('order')
                ->insert([
                    'catalog_id'=>$order['id_tovara'],
                    'user_id_user'=>$_SESSION['id'],
                    'date'=>date('y-m-d'),
                    'pozhelaniya'=>$order['pozhelaniya'],
                    'type_delivery'=>$order['type_delivery']
                ]);

            return redirect()->route('cabinet');
        }
    }
}
