<?php
Route::get('/', 'DataController@showUsers')->name('home'); //Домашняя
//Route::get('/users', 'DataController@showUsers')->name('users');
Route::get('/orders', 'DataController@showOrders')->name('orders'); //Заказы
Route::get('/orders/{id}','DataController@showOrder')->name('openOrder');

Route::name('user.')->group(function () {
  Route::view('/private','user.private')->middleware('auth')->name('private'); //Личный кабинет
  Route::post('/private/update', 'UserController@update')->name('update');
  Route::get('/private/user_delete', 'UserController@delete')->name('delete');

  Route::get('/sign_in', function () {
    if(Auth::check()) {
      return redirect(route('user.private'));
    }
    return view('user.login');
  })->name('login'); //Вход

  Route::post('/sign_in', 'UserController@login')->name('sign_in');
  Route::get('/logout', 'UserController@logout')->name('logout');

  Route::get('/sign_up', function () {
    return view('user.registration');
  })->name('registration'); //Регистрация

  Route::post('/sign_up', 'UserController@registration')->name('sign_up');
});

Route::name('order.')->group(function() {
  Route::post('/orders/make_order', 'OrderController@makeOrder')->name('make-order');
  Route::post('/orders/order_update', 'OrderController@orderUpdate')->name('update');
  Route::get('/orders/{id}/order_delete', 'OrderController@delete')->name('delete');
});
