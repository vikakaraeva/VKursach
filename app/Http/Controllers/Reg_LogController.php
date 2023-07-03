<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Reg_LogController extends Controller
{
    public function login(Request $rq)
    {
        if (!isset($_POST) || $_POST == [])

            return view('reg_log/login');
        else {
            $validate = $rq->validate([
                'login', 'password' => 'required'
            ]);

            $login = $rq->input('login');
            $password = $rq->input('password');

            $row = DB::table('user')
                ->where('login', '=', $login)
                ->where('password', '=', md5($password))
                ->get();

            if (count($row) == 0) //валидация
                return view('errors/login_errors',['login_count'=>true]);

            foreach ($row as $rw)
                $_SESSION['id'] = $rw->id_user;

            return redirect()->route('index');
        }
    }

    public function register(Request $rq)
    {
        if (!isset($_POST) || $_POST == [])
            return view('reg_log/register');
        else {
            $fam = $rq->input('fam');
            $name = $rq->input('name');
            $otch = $rq->input('otch');
            $email = $rq->input('email');
            $phone_number = $rq->input('phone_number');

            if($rq['avatar'] != null){
                $avatar = $rq->file('avatar')->store('user','public');
            }

            $login = $rq->input('login');
            $password = $rq->input('password');
            $password_confirm = $rq->input('password_confirm');

            $user = DB::table('user')
                ->where('login', '=', $login)
                ->get();

            if (count($user) != 1) {

                if ($password != $password_confirm)
                    return view('errors/reg_errors',[
                        'reg_err'=>true,
                        'fam'=>$fam,
                        'name'=>$name,
                        'otch'=>$otch,
                        'login'=>$login,
                        'email'=>$email,
                        'phone_number'=>$phone_number
                    ]);

                $name_arr = explode(' ', $name);

                if (isset($name_arr[1]) && $name_arr[1] == 'root') {
                    if(isset($avatar)){
                        DB::table('user')
                        ->insert([
                            'fam' => $fam,
                            'name' => $name_arr[0],
                            'otch' => $otch,
                            'phone_number' => $phone_number,
                            'email' => $email,
                            'type_user' => 'Администратор',
                            'avatar' => $avatar,
                            'login' => $login,
                            'password' => md5($password),
                        ]);
                    } else {
                        DB::table('user')
                        ->insert([
                            'fam' => $fam,
                            'name' => $name_arr[0],
                            'otch' => $otch,
                            'phone_number' => $phone_number,
                            'email' => $email,
                            'type_user' => 'Администратор',
                            'login' => $login,
                            'password' => md5($password),
                        ]);
                    }


                } else {
                    if(isset($avatar)){
                        DB::table('user')
                            ->insert([
                                'fam' => $fam,
                                'name' => $name,
                                'otch' => $otch,
                                'phone_number' => $phone_number,
                                'email' => $email,
                                'type_user' => 'Пользователь',
                                'avatar' => $avatar,
                                'login' => $login,
                                'password' => md5($password),
                        ]);
                    } else {
                        DB::table('user')
                            ->insert([
                                'fam' => $fam,
                                'name' => $name,
                                'otch' => $otch,
                                'phone_number' => $phone_number,
                                'email' => $email,
                                'type_user' => 'Пользователь',
                                'avatar' => null,
                                'login' => $login,
                                'password' => md5($password),
                        ]);
                    }
                }

                $row = DB::table('user')
                    ->where('login', '=', $login)
                    ->get();

                foreach ($row as $rw)
                    $_SESSION['id'] = $rw->id_user;

                return redirect()->route('index');
            } else {
                return view('errors/reg_errors',[
                    'login_err'=>true,
                    'fam'=>$fam,
                    'name'=>$name,
                    'otch'=>$otch,
                    'login'=>$login,
                    'email'=>$email,
                    'phone_number'=>$phone_number
                ]);
            }
        }
    }

    public function leave()
    {
        $_SESSION['id'] = null;

        return redirect()->route('index');
    }
}
