@extends('layouts.main')

@section('title', 'Оформление заказа')

@section('content')
    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название товара</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $order_product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order_product->name }}</td>
                    <td>
                        <div class="btn-group form-inline">

                            <span class="fs-4 px-3"> {{ $order_product->pivot->count }} </span>
                        </div>
                    </td>
                    <td>{{ $order_product->price }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <p>Итоговая стоимость {{ $order->getFullSumm($order) }}</p>
    <form action="{{ route('order.confirm', $order) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required placeholder="email"
                @if (Auth::check()) value ="{{ Auth::user()->email }}" @endif">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Номер телефона</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required>
        </div>

        <button type="submit" class="btn btn-primary">Подтверждение заказа</button>
    </form>
@endsection
