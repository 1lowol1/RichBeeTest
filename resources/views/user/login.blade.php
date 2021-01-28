@extends('layouts.main')

@section('page-title','Войти')

@section('content')
  <div class="content">
    <div class="container">
      <form class="" action="{{ route('user.sign_in') }}" method="post">
        @csrf
        <div class="form-group">
          <label class="form-label" for="email">Email:</label>
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
        <div class="form-group">
          @error('formError')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror
          <button class="btn btn-lg btn-primary" type="submit" name="submit">Войти</button>
        </div>
      </form>
    </div>
  </div>
@endsection
