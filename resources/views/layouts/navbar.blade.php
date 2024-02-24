@push('css')
    <style>
        #navbar {
            background-color: rgb(145, 23, 74);
            padding-top: 2em;
            padding-bottom: 2em;
        }

        ;
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="/">Toko AMF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mr-auto navbar-nav"></div>
                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-center">
                                {{ Auth::user()->name }} | <small>{{ Auth::user()->email }}</small>
                            </a>
                        </li>
                    @endguest

                    <li class="nav-item {{ $active === 'home' ? 'active' : ' ' }}">
                        <a class="nav-link" href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ $active === 'kategori' ? 'active' : ' ' }}">
                        <a class="nav-link" href="{{ route('home.kategori') }}">Kategori</a>
                    </li>
                    <li class="nav-item {{ $active === 'kontak' ? 'active' : ' ' }}">
                        <a class="nav-link" href="{{ route('home.kontak') }}">Kontak</a>
                    </li>
                    <li class="nav-item {{ $active === 'about' ? 'active' : ' ' }}">
                        <a class="nav-link" href="{{ route('home.about') }}">About</a>
                    </li>
                    @if ($active === 'cart' || auth()->user())
                        @if (auth()->user()->role === 'member')
                            <li class="nav-item {{ $active === 'cart' ? 'active' : '' }}">
                                <a class="nav-link" href="/cart">
                                    Cart
                                </a>
                            </li>
                        @endif
                    @endif
                    @if ($active === 'riwayatTransaksi' || auth()->user())
                        @if (auth()->user()->role === 'member')
                            <li class="nav-item {{ $active === 'riwayatTransaksi' ? 'active' : '' }}">
                                <a class="nav-link" href="/transaksiUser">
                                    Transaksi
                                </a>
                            </li>
                        @endif
                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">
                                    Dashboard
                                </a>
                            </li>
                        @endif
                    @endif
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="nav-link">Logout</a>
                            <form id='logout-form' action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
