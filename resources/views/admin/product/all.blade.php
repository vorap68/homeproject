@extends('layouts.admin')

@section('title', 'все продукты')

@section('content')



    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Продукт</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><a href="{{ route('product', $product) }}"> {{ $product->name }}</a></td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.product.edit', $product) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Редактировать
                        </a>
                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
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
    {{ $products->links() }}
@endsection
