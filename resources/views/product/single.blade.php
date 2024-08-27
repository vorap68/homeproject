@extends('layouts.main')

@section('title,category')

@section('content')
    <div class="container mt-5">
        <div class="card w-50">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Название:{{ $product->name }}</h5>
                <h5 class="card-title">Категория: {{ $product->category->name }}</h5>
                <h5 class="card-title">Цена: {{ $product->price }}</h5>

                <p class="card-text border border-secondary ">Цвет:
                    {{ $product->property->color ? $product->property->color : 'no defined' }}
                </p>
                <p class="card-text border border-secondary">Размер:
                    {{ $product->property->size ? $product->property->size : 'no defined' }}
                </p>
                <p class="card-text border border-secondary">Состояние:
                    {{ $product->property->state ? $product->property->state : 'no defined' }}
                </p>
                <p class="card-text">Описание: <span class="border border-2">
                        {{ $product->description }}</span></p>
                <a href="{{ route('basket.add', $product) }}" class="btn btn-primary">Заказать</a>
            </div>
        </div>

    </div>
@endsection
