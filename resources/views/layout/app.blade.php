<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <script src="{{asset('/js/app.js')}}"></script>
    <!-- Font -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://fonst.googleapis.com/css?family=Nunito">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="./" class="navbar-brand">
                    <img src="{{asset('assets/img/logo.ico')}}" alt="Logo" style="width:100px">
                </a>
                <button type="button" class="navbar-togler" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{__("Toggle navigation")}}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportContent" class="collapse navbar-collapse">
                    <!-- Left side of navbar -->
                    <ul class="navbar-nav me-auto"></ul>
                    <!-- Right side of navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication links -->
                        @guest
                            @if(Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">{{__('ADMINISTRATOR')}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{route('logout')}}" class="dropdown-item"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                        {{__('Logout')}}
                                    </a>
                                    <form id="logout-form" action="{{route('logout')}}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include("sweetalert::alert")
    @push('addon-script')
    <!-- insert your script -->
    @endpush
</body>

</html>