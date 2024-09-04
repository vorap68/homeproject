@extends('layouts.main')

@section('title', 'все продукты')

@section('content')

    <div class="row row-cols-2 row-cols-md-3 g-4">
        @foreach ($productSelected as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/' . $product->category->name . '/150_' . $product->image) }}"
                        width="150" height="150" alt="...">
                    <div class="card-body">
                        <div class="card-header card-title">
                            {{ $product->name }}
                        </div>
                        <p class="card-text text-truncate ">
                            {{ $product->descriptions }}</p>

                        <p>Категория: <span class="text-uppercase">{{ $product->category->name }}</span></p>
                        <p>Цена: <span class="fs-5"> {{ $product->price }} </span></p>
                    </div>
                    <a href="{{ route('product', $product->id) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>


@endsection
