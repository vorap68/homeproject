@extends('layouts.admin')

@section('title', 'все заказы')
@section('page', 'Все заказы ')

@section('content')

    @if (isset($user))
        <div>Пользователя: {{ $user->name }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">Сумма</th>
                <th scope="col">Статус заказа</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->summa }}</td>
                    <td>{{ $order->status }}</td>
                    <td class="project-actions text-right">
                        <a href="{{ route('admin.order.single', $order->id) }}">Продукты заказа</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
