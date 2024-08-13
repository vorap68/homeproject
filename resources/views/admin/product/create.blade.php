@extends('layouts.admin')

@section('title', 'Создание нового продукта')

@section('content')

    <form action="{{ route('admin.product.store') }}" method="post" class="w-50">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название </label>
            <input type="text" class="form-control" id="name" name="name">

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description"></textarea>

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
