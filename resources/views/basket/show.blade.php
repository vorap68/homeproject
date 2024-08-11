@extends('layouts.main')

@section('title', 'Ваша корзина')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название товара</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $order_product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order_product->name }}</td>
                    <td>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket.minus', $order_product->id) }}" method="get">
                                <button type="submit" class="btn btn-danger" href="">
                                    <i class="fas fa-minus-square">-</i></button>
                                @csrf
                            </form>
                            <span class="fs-4 px-3"> {{ $order_product->pivot->count }} </span>
                            <form action="{{ route('basket.add', $order_product->id) }}" method="get">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus-square">+</i></button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $order_product->price }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('basket.remove', $order_product) }}">Удалить
                            продукт</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <p>Итоговая стоимость {{ $order->getFullSumm($order) }}</p>
    <a class="btn btn-primary" href="{{ route('order.place', $order) }}" role="button">Оформление заказа</a>





@endsection
