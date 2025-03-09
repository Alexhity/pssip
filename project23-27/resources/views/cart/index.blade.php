@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Корзина</h1>

        @if(count($cart) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Курс</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }} руб.</td>
                        <td>
                            <form action="{{ route('cart.remove', $item) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <h4>Итого: {{ array_sum(array_column($cart, 'price')) }} руб.</h4>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Оформить заказ</button>
                </form>
            </div>
        @else
            <div class="alert alert-info">Корзина пуста</div>
        @endif
    </div>
@endsection
