@extends('layouts.main')

@section('page-title', 'Заказы')

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <form class="col-5" action="{{ route('order.make-order') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="orderName">Название заказа</label>
            <input class="form-control" type="text" name="orderName" value="" id="orderName">
          </div>
          <div class="form-group">
            <label for="description">Описание заказа</label>
            <input class="form-control" type="text" name="description" value="" id="description">
          </div>
          <div class="form-group">
            <label for="cost">Цена заказа</label>
            <input class="form-control" type="text" name="cost" value="" id="cost">
          </div>
          <button class="btn btn-primary" type="submit" name="submit">Добавить заказ</button>
        </form>
      </div>

        @if($data != [])
          @foreach($data as $item)
          <div class="row">
            <div class="alert alert-info col-6">
              <h3>{{ $item['orderName'] }}</h3>
              <h5>Заказал: {{ $item['user']->email }}</h5>
              <p>{{ $item['description'] }}</p>
              <p>{{ $item['cost'] }} Руб.</p>
              @if(Auth::check())
                @if(Auth::user()->id == $item['user']->id)
                  <a href="{{ route('openOrder', $item['id']) }}">Изменить</a>
                @endif
              @endif
            </div>
          </div>
          @endforeach
        @endif

    </div>
  </div>
@endsection
