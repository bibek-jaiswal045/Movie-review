<div id="header-wrapper">
    <header id="header" class="container">

        <!-- Logo -->
        <div id="logo">
            <h1><a href="{{route('homepage')}}">Movies</a></h1>
            <span>by Movie Collection</span>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="{{route('homepage')}}" class="{{(request()->is('/') ? 'active' : '')}}">Homepage</a></li>
                <li><a href="{{ route('clientindex') }}" class="{{(request()->is('movies') ? 'active' : '')}}">All Movies</a></li>

                <li>

                    @auth
                        <a href="#">{{auth()->user()->name}}</a>
                    @endauth

                    @guest
                        
                    <a href="#">Account</a>
                    @endguest
                    <ul>
                        <li>

                            @auth
                                @if (auth()->user()->isAdmin == 1)
                                    <form action="{{ route('logout') }}" method="POST">

                                        @csrf

                                        <button
                                            style="padding-left: 24px; background-color: transparent; color:#696969; font-weight:">Logout</button>


                                    </form>
                                    <li><a href="{{ route('movie.create') }} ">Add a movie</a></li>
                                    <li><a href="{{ route('cast.create') }} ">Add casts</a></li>
                                    <li><a href="{{ route('status.index') }} ">All movie status</a></li>
                                    <li><a href="{{ route('genre.create') }} ">Add genres</a></li>
                                    <li><a href="{{ route('genre.index') }} ">All genres</a></li>
                                    <li><a href="{{ route('cast.index') }} ">All casts</a></li>
                                    <li><a href="{{ route('carousel.create') }} ">Add movie for carousel</a></li>
                                    <li><a href="{{ route('admindashboard') }}">Admin Dashboard</a></li>
                                @elseif (auth()->user()->isAdmin == 0)
                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    <button
                                        style="padding-left: 24px; background-color: transparent; color:#696969; font-weight:">Logout</button>


                                </form>
                                @endif

                            @endauth

                            @guest
                                <li>
                                    <a href="{{route('register')}}">Sign Up</a>
                                </li>
                                <li>
                                    <a href="{{route('login')}}">Log In</a>
                                </li>
                            @endguest
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </header>
</div>
