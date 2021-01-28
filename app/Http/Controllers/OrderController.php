<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function makeOrder(Request $request) {
      if(Auth::check()) {
        $not_regex = 'not_regex:/(<(.|\n)*?>)|http:|https:/';
        $request->validate([
          'orderName'   => ['required','min:2','max:255', $not_regex],
          'description' => ['required','min:2','max:255', $not_regex],
          'cost'        => ['required','min:1','max:255', 'numeric', $not_regex]
        ]);

        Order::create([
          'userId'      => Auth::user()->id,
          'orderName'   => $request->input('orderName'),
          'description' => $request->input('description'),
          'cost'        => $request->input('cost')
          ]);
        return redirect(route('user.login'))->withErrors([
          'formError' => 'Произошла ошибка'
        ]);
        return redirect(route('orders'));
      }
      return redirect(route('orders'));
    }

    public function orderUpdate(Request $request) {
      $order = Order::find($request->input('oid'));
      $order->orderName = $request->input('orderName');
      $order->description =$request->input('description');
      $order->cost =$request->input('cost');
      $order->save();
      return redirect(route('orders'));
    }
    public function delete($id) {
      $order = Order::find($id);
      if($order->userId == Auth::user()->id) {
        $order->delete();
        return redirect(route('orders'));
      }
      return redirect(route('orders'));
    }
}
