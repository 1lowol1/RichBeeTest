@extends('layouts.main')

@section('page-title','Личный кабинет')

@section('content')
  <div class="content">
    <h1>Личный кабинет</h1>
    <a href="{{ route('user.delete') }}">Удалить Пользователя {{ Auth::user()->userName }}</a>
    <form class="" action="{{ route('user.update') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="userName">Имя:</label>
        <input type="text" name="userName" value="{{ Auth::user()->userName }}" id="userName">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ Auth::user()->email }}" id="email">
      </div>
      <div class="form-group">
        <label for="password">Новый пароль:</label>
        <input type="password" name="password" value="" id="password">
      </div>
      <button class="btn btn-primary" type="submit" name="submit">Изменить</button>
    </form>
  </div>
@endsection
