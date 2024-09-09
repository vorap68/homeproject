@extends('layouts.admin')

@section('page', 'Создание нового продукта')

@section('content')


    <form action="{{ route('admin.product.store') }}" method="post" class="w-50" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="descriptions" class="form-label">Описание</label>
            <textarea class="form-control" id="descriptions" name="descriptions"></textarea>

        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Количество</label>
            <input type="number" class="form-control" id="count" name="count" value="{{ old('count') }}">
            @error('count')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label"> Цена</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label"> цвет</label>
            <select class="form-control" id="color" name="color">
                <option selected>Выберите цвет</option>
                <option value="red">red</option>
                <option value="green">green</option>
                <option value="yellow">yellow</option>
            </select>
            @error('color')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="size" class="form-label"> размер</label>
            <select class="form-control" id="size" name="size">
                <option selected>Выберите размер</option>
                <option value="small">small</option>
                <option value="middle">middle</option>
                <option value="large">large</option>
            </select>
            @error('size')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="state" class="form-label"> состояние</label>
            <select class="form-control" id="state" name="state">
                <option selected>Выберите состояние</option>
                <option value="new">new</option>
                <option value="secondHand">secondHand</option>
            </select>
            @error('state')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="picture" class="form-label"> Изображение</label>
            <input type="file" name="picture" id="picture">
            @error('picture')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>


@endsection
