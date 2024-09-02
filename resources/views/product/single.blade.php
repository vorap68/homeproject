@extends('layouts.main')

@section('title,category')

@section('content')
    <div class="container mt-5">
        <div class="card w-50">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <div class="card-header card-title fs-5">
                    {{ $product->name }}
                </div>
                <br>
                <h5>
                    Категория: <span class="text-uppercase">{{ $product->category->name }}</span>
                </h5>

                <h5 class="card-title">Цена: {{ $product->price }}</h5>

                <p class="card-text border border-info p-2 fs-5 ">Цвет:
                    {{ $product->property->color ? $product->property->color : 'no defined' }}
                </p>
                <p class="card-text border border-info p-2 fs-5">Размер:
                    {{ $product->property->size ? $product->property->size : 'no defined' }}
                </p>
                <p class="card-text border border-info p-2 fs-5">Состояние:
                    {{ $product->property->state ? $product->property->state : 'no defined' }}
                </p>
                <p class="card-text fs-5">Описание: <span class="border border-2">
                        {{ $product->descriptions }}</span></p>
                <a href="{{ route('basket.add', $product) }}" class="btn btn-primary">Заказать</a>
            </div>
        </div>

    </div>
@endsection
