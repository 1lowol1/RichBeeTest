<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @if(Request::is('sign_in') || Request::is('sign_up'))
  <meta name="csrf-roken" content="{{ csrf_token() }}">
  @endif
  <title>RichBeeTest | @yield('page-title')</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  @include('includes/header')
  @yield('content')
</body>
</html>
