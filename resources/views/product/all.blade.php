@extends('layouts.main')

@section('title', 'все продукты')

@section('content')

    <div class="container mt-5  w-50">
        <form action="{{ route('products.search') }}" method="post">
            @csrf
            <div class="d-flex">
                <div class="form-group mb-3 me-3">
                    <label class="form-label">Категория</label><br>
                    {{-- <select name="categories[]" multiple="multiple" size="7" class="form-control"> --}}
                    <select name="categories[]" class="form-select" multiple size="1" style="width:auto">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 me-3">
                    <label for="price_from" class="form-label">Цена от</label>
                    <input type="text" class="form-control" id="price_from" name="price_from" value="0">
                </div>
                <div class="form-group mb-3 me-3">
                    <label for="price_to" class="form-label">Цена до</label>
                    <input type="text" class="form-control" id="price_to" name="price_to" value="10000">
                </div>
                <div class="d-flex align-items-end mb-3">
                    <button type="submit" class="btn btn-primary">Найти</button>
                </div>
            </div>
        </form>
    </div>



    <div class="row row-cols-2 row-cols-md-3 g-4">
        @foreach ($products as $product)
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
    {{ $products->links() }}
@endsection
