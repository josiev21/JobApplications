<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .active {
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ERAKOMP CAREER
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                   




                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->image)
                                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                                @endif {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4 container">

            @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item {{ request()->is('user-detail') ? 'active' : '' }}"><a
                            href="{{route('user-detail.index')}}">Bio</a></li>
                    <li class="breadcrumb-item {{ request()->is('education') ? 'active' : '' }}"><a
                            href="{{route('education.index')}}">Pendidikan</a></li>
                    <li class="breadcrumb-item {{ request()->is('experience') ? 'active' : '' }}"><a
                            href="{{route('experience.index')}}">Pengalaman Kerja</a></li>
                    <li class="breadcrumb-item {{ request()->is('skill') ? 'active' : '' }}"><a
                            href="{{route('skill.index')}}">Keahlian</a></li>
                            <li class="breadcrumb-item {{ request()->is('asing') ? 'active' : '' }}"><a
                                href="{{route('asing.index')}}">Bahasa Asing</a></li>
                                <li class="breadcrumb-item {{ request()->is('reference') ? 'active' : '' }}"><a
                                    href="{{route('reference.index')}}">Referensi</a></li>
                                    <li class="breadcrumb-item {{ request()->is('married') ? 'active' : '' }}"><a
                                        href="{{route('married.create')}}">Status</a></li>
                                        <li class="breadcrumb-item {{ request()->is('anak') ? 'active' : '' }}"><a
                                            href="{{route('anak.index')}}">Anak</a></li>
                                            <li class="breadcrumb-item {{ request()->is('relation') ? 'active' : '' }}"><a
                                                href="{{route('relation.index')}}">Relasi</a></li>
                                                <li class="breadcrumb-item {{ request()->is('organization') ? 'active' : '' }}"><a
                                                    href="{{route('organization.index')}}">Organisasi</a></li>
                                                    <li class="breadcrumb-item {{ request()->is('health') ? 'active' : '' }}"><a
                                                        href="{{route('health.create')}}">Kesehatan</a></li>
                                                        <li class="breadcrumb-item {{ request()->is('job') ? 'active' : '' }}"><a
                                                            href="{{route('job.index')}}">Pekerjaan yang dilamar</a></li>
                                                            <li class="breadcrumb-item {{ request()->is('connection') ? 'active' : '' }}"><a
                                                                href="{{route('connection.index')}}">Rekomendasi Dari Perusahaan</a></li>
                            <li class="breadcrumb-item {{ request()->is('image') ? 'active' : '' }}"><a
                                href="{{route('image.create')}}">Gambar Profile</a></li>
                                <li class="breadcrumb-item {{ request()->is('file') ? 'active' : '' }}"><a
                                    href="{{route('file.create')}}">Upload CV</a></li>

                </ol>
            </nav>
            @endauth

            {{-- validation error section --}}
            <div>
                @if(session()->has('errors'))
                <ol class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $e)

                    <li>{{$e}}</li>

                    @endforeach
                </ol>
                @endif
            </div>

            @yield('content')
        </main>
    </div>
</body>

</html>