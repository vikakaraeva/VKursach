<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TovarController extends Controller
{
    public function tovar(Request $rq){
        if(!isset($_POST) || $_POST == []){

            $category = DB::table('category')
                ->get();
            $order = DB::table('order')
                ->get();

            return view('tovar/tovar',['category'=>$category,'order'=>$order]);

        } else {
            $params = $rq->all();

            $img = $rq->file('img')->store('img_tovar','public');

            DB::table('catalog')
                ->insert([
                    'title'=>$params['title'],
                    'img'=>$img,
                    'category_id_category'=>$params['category'],
                    'price'=>$params['price']
                ]);

            $row = DB::table('catalog')
                ->get(); //получить таблицу

            dd($row);
        }

    }

    public function izm(Request $rq){

        $id = $rq->input('id_tovara');

        $row = DB::table('catalog')
            ->select('catalog.*','category.name_category')
            ->join('category','catalog.category_id_category','=','category.id_category')
            ->where('catalog.id','=',$id)
            ->get();
        $category = DB::table('category')
            ->get();
        return view('tovar/izm',['category'=>$category,'row'=>$row]);
    }

    public function izm_post(Request $rq){
        $row = $rq->all();


        if($rq['img'] != null){
            $avatar = $rq->file('img')->store('img_tovar','public');

            DB::table('catalog')
                ->where('id','=',$row['id'])
                ->update([
                    'title'=>$row['title'],
                    'img'=>$avatar,
                    'category_id_category'=>$row['category'],
                    'price'=>$row['price']
                ]);
        } else {
            DB::table('catalog')
                ->where('id','=',$row['id'])
                ->update([
                    'title'=>$row['title'],
                    'category_id_category'=>$row['category'],
                    'price'=>$row['price']
                ]);
        }




        return redirect()->route('catalog_adm');
    }

    public function catalog(Request $rq){

        if(!isset($_POST) || $_POST == []){

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

            $user = DB::table('user')
                ->where('id_user','=',$_SESSION['id'])
                ->get();

            return view('tovar/catalog_admin', ['user'=>$user,'tort' => $tort, 'vipechka' => $vipechka, 'pir' => $pir, 'nap' => $nap]);
            
        } else {
            if (isset($rq['delete'])){
                $id = $rq->input('id_tovara');

                DB::table('catalog')
                    ->delete($id);

                return redirect()->route('catalog_adm');
            }
        }
    }
}


