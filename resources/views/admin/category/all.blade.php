@extends('layouts.admin')

@section('title', 'Все категории')

@section('page', 'Все категории')
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Категория родитель</th>
                <th scope="col"></th>
                <th scope="col"></th>


            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if ($category->parent)
                            {{ $category->parent->name }}
                        @else
                            Нет родителя
                        @endif
                    </td>

                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.category.edit', $category) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Редактировать
                        </a>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
