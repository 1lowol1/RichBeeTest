<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class DataController extends Controller
{
  public function showUsers() { //Вывод пользователей
    $data = User::all();
    return view('index')->with('data', $data);
  }

  public function showOrders() { //Вывод заказов
    $orders = Order::all();

    $data = [];
    foreach($orders as $order) {
      array_push($data, [
        'id'          => $order->id,
        'orderName'   => $order->orderName,
        'description' => $order->description,
        'cost'        => $order->cost,
        'user'        => User::find($order->userId)
      ]);

    }
    return view('orders')->with('data', $data);
  }
  public function showOrder($id) { //Вывод заказа
    $order = Order::find($id);
    //dd($order);
    return view('order')->with('data', $order);
  }
}
