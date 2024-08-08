@extends('layouts.main')

@section('title', 'все продукты')

@section('content')



    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Продукт</th>
                <th scope="col">Категория</th>
                <th scope="col">цена</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productSelected as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('product', $product) }}"> {{ $product->name }}</a></td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
