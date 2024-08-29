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
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('product', $product) }}"> {{ $product->name }}</a></td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
