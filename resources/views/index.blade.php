@extends('layouts.main')

@section('page-title', 'Главная')

@section('content')
  <div class="content">
    <div class="container">
      @foreach($data as $item)
        <div class="alert alert-info">
          <h1>{{ $item->userName }}</h1>
          <p>{{ $item->email }}</p>
          <p>Кол-во заказов {{ $item->orders()->count() }}</p>
        </div>
      @endforeach
    </div>
  </div>
@endsection
