<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
     
        <div class="container">

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Main</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products') }}">Все товары</a>
                            </li>

                            {{-- // Переменная $categories_parent приходит с ViewServiceProviider                       --}}
                            @foreach ($categories_parent as $category)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $category->name }}
                                    </a>
                                    <ul class="dropdown-menu ">
                                        @foreach ($category->childrenCategories as $category_child)
                                            @include('card', [
                                                'category_child' => $category_child,
                                                'delimeter' => '-',
                                            ])
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                        </ul>

                        <li style="list-style-type: none;">
                            <a class="nav-link" href="{{ route('basket.show') }}"> Корзина</a>
                        </li>
                        <p></p>
                        @if (Auth::check())
                            @if (Auth::user()->role === 'admin')
                                <li style="list-style-type: none;" class="mx-3">
                                    <a class="nav-link" href="{{ url('phpinfo') }}"> phpinfo</a>
                                </li>
                                <li style="list-style-type: none;" class="mx-3">
                                    <a class="nav-link" href="{{ url('admin/main') }}"> АдминПанель</a>
                                </li>
                                <li style="list-style-type: none;" class="mx-3">
                                    <a class="nav-link" href="{{ route('session.clear') }}">Обнуление сессии заказа</a>
                                </li>
                                <li style="list-style-type: none;"class="mx-53">
                                    <a class="nav-link" href="{{ route('base.clear') }}">Сброс всей базы данных</a>
                                </li>
                            @endif
                        @endif

                        <p></p>
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>

                    </div>
                </div>
            </nav>
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if (session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
            <div class=”row”>
                <div class=”col-12”>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</body>

</html>
