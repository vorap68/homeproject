@extends('layouts.admin')

@section('title', 'Продукты заказа')

@section('content')



    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
                <th scope="col">Категория</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->price }}</td>
                    <td>{{ $product->pivot->count }}</td>
                    <td>{{ $product->category->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
