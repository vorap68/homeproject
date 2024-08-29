@extends('layouts.admin')

@section('page', 'Редактирование продукта')

@section('content')

    <form action="{{ route('admin.product.update', $product) }}" method="post" class="w-50">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название </label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name', isset($product->name) ? $product->name : '') }}">

        </div>
        <div class="mb-3">
            <span class="form-label ">Категория:</span>
            <p><span class="border border-3 px-2 bg-white">{{ $product->category->name }}</span></p>

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description">
                {{ isset($product->descriptions) ? $product->descriptions : '' }}
            </textarea>

        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Количество</label>
            <input type="number" class="form-control" id="count" name="count"
                value="{{ old('count', isset($product->count) ? $product->count : '') }}">

        </div>
        <div class="mb-3">
            <label for="price" class="form-label"> Цена</label>
            <input type="text" class="form-control" id="price" name="price"
                value="{{ old('price', isset($product->price) ? $product->price : '') }}">

        </div>
        <div class="mb-3">
            <label for="color" class="form-label"> цвет</label>
            <input type="text" class="form-control" id="color" name="color"
                value="{{ old('color', isset($product->property->color) ? $product->property->color : '') }}">

        </div>
        <div class="mb-3">
            <label for="size" class="form-label"> размер</label>
            <input type="text" class="form-control" id="size" name="size"
                value="{{ old('color', isset($product->property->size) ? $product->property->size : '') }}">

        </div>
        <div class="mb-3">
            <label for="state" class="form-label"> состояние</label>
            <input type="text" class="form-control" id="state" name="state"
                value="{{ old('color', isset($product->property->state) ? $product->property->state : '') }}">


        </div>
        <div class="mb-3">
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
