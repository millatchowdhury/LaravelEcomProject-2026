<div class="header-area" style="background:#F8F9FA;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 50px;">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{ route('index') }}">E-COM</a>
                            
                            <div class="navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mb-2 mb-lg-0">
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                
                                </ul>
                                <form class="d-flex" action="{{ route('search') }}" method="GET">
                                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"/>
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                                <div class="login-register" style="float: right;">
                                @if (Route::has('login'))
                                        <div class="p-6">
                                            @auth
                                            {{-- ---------------- --}}
                <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" style="border-radius:50px;width:50px; border-radious:50px;" alt="">
                {{ Auth::user()->first_name }}  |  {{ Auth::user()->last_name }}
                {{ Auth::user()->email }}
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
    

                                            {{-- ---------------- --}}
                                                <a href="{{ url('/dashboard') }}"  style="display: inline-block; padding:5px 15px; background:tomato;font-weight:bold;color:#fff;text-decoration:none;">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}" style="display: inline-block; padding:5px 15px;text-decoration:none; background:tomato;font-weight:bold;color:#fff;">Log in</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" style="display: inline-block; padding:5px 15px;text-decoration:none; background:tomato;font-weight:bold;color:#fff;">Register</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   