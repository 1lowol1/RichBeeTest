@extends('layouts.main')

@section('page-title','Регистрация')

@section('content')
  <div class="content">
    <div class="container">
      <form class="" action="{{ route('user.sign_up') }}" method="post">
        @csrf
        <div class="form-group">
          <label class="form-label" for="userName">Придумайте логин:</label>
          <input class="form-control" type="text" name="userName" value="" id="userName">
          @error('userName')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label class="form-label" for="email">E-mail:</label>
          <input class="form-control" type="text" name="email" value="" id="email">
          @error('email')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label class="form-label" for="password">Пароль:</label>
          <input class="form-control" type="text" name="password" value="" id="password">
          @error('password')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror
        </div>
        <!--<div class="form-group">
          <label class="form-label" for="confirm_password">Подтвердить пароль:</label>
          <input class="form-control" type="text" name="confirm_password" value="" id="confirm_password">
          @error('confirm_password')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror
        </div>-->
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="submit">Зарегистрироваться</button>
        </div>
      </form>
    </div>
  </div>
@endsection
