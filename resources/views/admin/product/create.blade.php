@extends('layouts.admin')

@section('page', 'Создание нового продукта')

@section('content')

    <form action="{{ route('admin.product.store') }}" method="post" class="w-50">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название </label>
            <input type="text" class="form-control" id="name" name="name">

        </div>
        <div class="mb-3">
            <label for="descriptions" class="form-label">Описание</label>
            <textarea class="form-control" id="descriptions" name="descriptions"></textarea>

        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Количество</label>
            <input type="number" class="form-control" id="count" name="count">

        </div>
        <div class="mb-3">
            <label for="price" class="form-label"> Цена</label>
            <input type="text" class="form-control" id="price" name="price">

        </div>
        <div class="mb-3">
            <label for="color" class="form-label"> цвет</label>
            <input type="text" class="form-control" id="color" name="color">

        </div>
        <div class="mb-3">
            <label for="size" class="form-label"> размер</label>
            <input type="text" class="form-control" id="size" name="size">

        </div>
        <div class="mb-3">
            <label for="state" class="form-label"> состояние</label>
            <input type="text" class="form-control" id="state" name="state">

        </div>
        <div class="mb-3">
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
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
