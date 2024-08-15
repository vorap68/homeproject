@extends('layouts.admin')

@section('page', 'все пользователи')

@section('content')



    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">имя</th>
                <th scope="col">email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> <a href="{{ route('admin.user.order', $user) }}">заказы</a></td>
                    <td class="project-actions text-right">
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
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
