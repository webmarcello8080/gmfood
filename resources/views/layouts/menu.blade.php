<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-item nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="nav-item nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-item nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a  href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @can('Manage Roles')
                                    <a class="dropdown-item" href="{{ route('roles.index') }}" >
                                        Manage Roles
                                    </a>
                                @endcan
                                @can('Manage Permissions')
                                    <a class="dropdown-item" href="{{ route('permissions.index') }}" >
                                        Manage Permissions
                                    </a>
                                @endcan
                                @can('Manage Users')
                                    <a class="dropdown-item" href="{{ route('users.index') }}" >
                                        Manage Users
                                    </a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
