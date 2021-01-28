@extends('layouts.main')

@section('page-title', 'Заказ')

@section('content')
  <div class="content">
    <div class="container">
      <form class="" action="{{ route('order.update') }}" method="post">
        @csrf
        <input type="hidden" name="oid" value="{{ $data->id }}" id="oid">
        <div class="form-group">
          <label for="orderName">Название заказа:</label>
          <input class="form-control" type="text" name="orderName" id="orderName" value="{{ $data->orderName }}">
        </div>
        <div class="form-group">
          <label for="description">Описание:</label>
          <input class="form-control" type="text" name="description" id="description" value="{{ $data->description }}">
        </div>
        <div class="form-group">
          <label for="cost">Цена:</label>
          <input class="form-control" type="text" name="cost" id="cost" value="{{ $data->cost }}">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Изменить</button>
      </form>
      <h1>{{ $data->orderName }}</h1>
      <p>{{ $data->description }}</p>
      <p>{{ $data->cost }}</p>
      <a href="{{ route('order.delete', ['id' => $data->id]) }}">Удалить заказ</a>
    </div>
  </div>
@endsection
