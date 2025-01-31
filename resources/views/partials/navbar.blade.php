<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Lomba Kicau</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('lomba') ? 'active' : '' }}" href="{{ route('lomba.index') }}">Lomba</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('peserta') ? 'active' : '' }}" href="{{ route('peserta.index') }}">Peserta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('penilaian') ? 'active' : '' }}" href="{{ route('penilaian.index') }}">Penilaian</a>
                </li>            
                {{-- @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth --}}
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link {
    transition: background-color 0.3s, color 0.3s;
    }

    .nav-link:hover,
    .nav-link:focus,
    .nav-link.active {
        background-color: grey;
        color: whitesmoke;
    }
</style>