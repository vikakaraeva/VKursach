<?php

use Illuminate\Support\Facades\Route;

session_start();

//  главная страница
Route::get('/', 'MainController@index')->name('index');

//  личный кабинет
Route::match(['get','post'],'/cabinet', 'MainController@cabinet')->name('cabinet');

// выход из аккаунта
Route::get('/leave', 'Reg_LogController@leave')->name('leave');

// старница отзывов
Route::match(['get','post'],'/reviews', 'MainController@reviews')->name('reviews');

// страница каталога
Route::match(['get','post'],'/catalog', 'MainController@catalog')->name('catalog');

// страница оформления заказа
Route::match(['get','post'],'/zakaz','MainController@zakaz')->name('zakaz');

// старница входа в аккаунт
Route::match(['get', 'post'], '/login', 'Reg_LogController@login')->name('login');

// страница регистрации аккаунта
Route::match(['get', 'post'], '/register', 'Reg_LogController@register')->name('register');

//страница добавления товара в каталог
Route::match(['get', 'post'], '/tovar','TovarController@tovar')->name('tovar');


// страница каталога для админа
Route::match(['get','post'],'/catalog_admin', 'TovarController@catalog')->name('catalog_adm');

Route::match(['get','post'],'/izm', 'TovarController@izm')->name('catalog_izm');
Route::match(['get','post'],'/izm_post', 'TovarController@izm_post')->name('catalog_izm_post');

