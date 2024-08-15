@extends('layouts.admin')

@section('title', 'Редактирование')
@section('page', 'Редактирование')

@section('content')


    <form action="{{ route('admin.category.update', $category) }}" method="post">

        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Название категории</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                value="{{ old('name', isset($category->name) ? $category->name : '') }}">

        </div>
        <div class="mb-3">
            <select name="parent_id" id="parent_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div>
            Текущая родительская категория: {{ $parent_name }}
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
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
