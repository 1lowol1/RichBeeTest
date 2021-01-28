@section('header')
<div class="header">
  <div class="container">
    <div class="header-info-wrapper">
      <h3 class="logo">RichBee Задание | Феоктистов Илья</h3>
      <a href="{{ route('home') }}">Главная</a>
      <a href="{{ route('orders') }}">Заказы</a>
      @if(Auth::check())
        <a href="{{ route('user.private') }}">{{ Auth::user()->userName }}</a>
        <a class="logout" href="{{ route('user.logout') }}">Выйти</a>
      @else
        <a class="registration" href="{{ route('user.registration') }}">Регистрация</a>
        <a class="login" href="{{ route('user.login') }}">Войти</a>
      @endif
    </div>
  </div>
</div>
