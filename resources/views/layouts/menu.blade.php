<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-item nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menus</a>
                    <div class="dropdown-menu" aria-labelledby="navbarMenu">
                        @can('Create New Entry')
                            <a class="dropdown-item" href="{{ route('menus.create') }}" >
                                Add New Menu
                            </a>
                            <a class="dropdown-item" href="{{ route('menus.index') }}" >
                                Menu List
                            </a>
                        @endcan  
                    </div>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="nav-item nav-link" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarUser">
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
                                @can('Manage Businesses')
                                    <a class="dropdown-item" href="{{ route('businesses.index') }}" >
                                        Manage Businesses
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
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
