@extends('layouts.admin')

@section('title', '')

@section('content')

    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название категории</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <select name="parent_id" id="parent_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

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
