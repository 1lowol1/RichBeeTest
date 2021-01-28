<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registration(Request $request) {
      if(Auth::check()) {
        return redirect(route('user.private'));
      }
      $not_regex = 'not_regex:/(<(.|\n)*?>)|http:|https:/';
      $validateFields = $request->validate([
        'userName' => ['required','min:2','max:255', $not_regex],
        'email'    => ['required','min:2','max:255', 'email', $not_regex],
        'password' => ['required','min:6','max:255', $not_regex]
      ]);

      if(User::where('email', $validateFields['email'])->exists()) {
        return redirect(route('user.registration'))->withErrors([
          'login' => 'login',
          'email' => 'Пользователь с таким email уже существует',
          'password' => 'password',
        ]);
      }

      $user = User::create($request->input());

      if($user) {
        Auth::login($user);
        return redirect(route('user.private'));
      }
      return redirect(route('user.login'))->withErrors([
        'formError' => 'Произошла ошибка'
      ]);
    }

    public function login (Request $request) {
      if(Auth::check()) {
        return redirect()->intended(route('user.private'));
      }
      $formFields = $request->only(['email', 'password']);

      if(Auth::attempt($formFields)) {
        return redirect()->intended(route('user.private'));
      }
      return redirect(route('user.login'))->withErrors([
        'email' => 'Email или пароль неверны'
      ]);
    }

    public function logout () {
      Auth::logout();
      return redirect(route('home'));
    }

    public function update(Request $request) {
      if(Auth::check()) {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $user->email = $request->input('email');
        $user->userName = $request->input('userName');

        if($request->input('password') != null)
        {
          $user->password = $request->input('password');
        }
        $user->save();
        return redirect(route('user.private'));
      }
      return redirect(route('home'));
    }
    public function delete() {
      if(Auth::check()) {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $user->delete();
        return redirect(route('home'));
      }
      return redirect(route('home'));
    }
}
