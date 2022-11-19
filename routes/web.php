<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'MainPageController@index')->name('welcome');
Route::get('single/{id}', 'MainPageController@detail')->name('detail');
Route::put('customer/{id}/order', 'MainPageController@customerOrder')->name('customerOrder');
Route::post('contact', 'MainPageController@contact')->name('contact');
Route::get('catagory/{id}', 'MainPageController@catagory')->name('ctagory');
Route::get('all-product', 'MainPageController@all')->name('all');

Auth::routes();


Route::group(['middleware'=>'auth'], function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::get('password', 'HomeController@password')->name('password');
Route::post('password/change', 'HomeController@changepassword')->name('changepassword');
Route::resource('catagories', 'CatagoryController');
Route::resource('product', 'ProductController');
Route::get('mail', 'ProductController@mail')->name('mail');
Route::get('viewmail/{mailid}', 'SoldController@viewmail')->name('viewmail');
Route::get('sold', 'SoldController@sold')->name('sold');
Route::get('order', 'SoldController@order')->name('order');
Route::put('sold/{pid}/product', 'SoldController@soldUpdate')->name('soldUpdate');
Route::get('clear/{pid}/sold', 'SoldController@soldclear')->name('soldclear');
Route::put('order/{idd}', 'SoldController@orderDone')->name('orderDone');
Route::delete('orderdelete/{idd}', 'SoldController@orderdelete');

});
