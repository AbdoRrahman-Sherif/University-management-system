<header>
    <div class="nav_bar">
        <!-- <div class="logo"><a href="home.html">E-JUST</a></div> -->
        <div class="logo_img"><a href="{{ route('home') }}"><img src="{{ asset('pictures/ejust_logo_light.png')}}" alt=""></a></div>
        <ul class="links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('faculties') }}">Faculties</a></li>
            <li><a href="{{ route('professors') }}">professors</a></li>
            <li><a href="{{ route('admission') }}"> undergraduate admission</a></li>
            @if(Auth::guard('admission_application')->check())
            <li>
                <form action="{{ route('admission.logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @elseif(Auth::guard('professor')->check() or Auth::guard('pg_student')->check() or Auth::guard('ug_student')->check() or Auth::guard('staff')->check())
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else
            <li>
                <form action="{{ route('login') }}" method="GET">
                    @csrf
                    <button type="submit">login</button>
                </form>
            </li>
            @endif
        

        </ul>
        <div class="togle_btn"><i class="fa-solid fa-bars"></i></div>
    </div>
    <div class="dropdown_menu">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('faculties') }}">Faculties</a></li>
        <li><a href="{{ route('professors') }}">professors</a></li>
        <li><a href="{{ route('admission') }}">undergraduate admission</a></li>
        @if(Auth::guard('admission_application')->check())

            <li>
                <form action="{{ route('admission.logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>

        @elseif(Auth::guard('professor')->check() or Auth::guard('pg_student')->check() or Auth::guard('ug_student')->check() or Auth::guard('staff')->check())
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
        @else
        <li>
            <form action="{{ route('login') }}" method="GET">
                @csrf
                <button type="submit">login</button>
            </form>
        </li>        @endif
    


    </div>
</header>