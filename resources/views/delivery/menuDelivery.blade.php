<nav x-data="{ open: false }" class="bg-red-600 min-h-min">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/delivery') }}">
                        <img class="w-auto h-14" src="{{asset('storage/uploads/logo.jpg')}}" alt="logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="url('/delivery')">
                        {{ __('Đơn hàng đang giao') }}
                    </x-nav-link>

                    <x-nav-link :href="url('/delivery/progressed-bills')">
                        {{ __('Đơn hàng đã giao') }}
                    </x-nav-link>
                    
                    {{-- <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __('Danh mục') }}</div>
        
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                @foreach ($cates as $c)
                                    <x-dropdown-link :href="url('/danh-muc/'.$c->cate_id)">
                                        {{ $c->cate_name }}
                                    </x-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div> --}}
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                {{-- <form class="inline-flex h-9 my-auto mr-1.5" role="search" method="GET" action="{{url('/tim-kiem')}}">
                    <input name="keyword" class="rounded" type="search" placeholder="Tìm kiếm..." aria-label="Search" oninvalid="this.setCustomValidity('Chưa nhập từ khóa')" required>
                    <button class="btn-outline bg-white hover:text-red-600" type="submit">Tìm</button>
                </form> --}}

                {{-- <a href=" {{ url('/gio-hang') }} " class="inline-flex items-center px-3 py-2 mr-1.5 border border-transparent text-sm leading-4 font-medium rounded-md text-red-600 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ __('Giỏ hàng') }}</div>
                </a> --}}

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-red-600 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            {{-- <div>{{ Auth::user()->name }}</div> --}}
                            <div>
                                @if (Route::has('login'))
                                    @auth
                                        {{ Auth::user()->username }}
                                    {{-- @else
                                        {{ __('Tài khoản') }} --}}
                                    @endauth
                                @endif
                            </div>
    
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if (Route::has('login'))
                            @auth
                                {{-- <x-dropdown-link :href=" url('/lich-su') ">Lịch sử mua hàng</x-dropdown-link> --}}
                                <x-dropdown-link :href="route('delivery.profile.edit')">Thông tin tài khoản</x-dropdown-link>
                                <hr class="dropdown-divider">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </x-dropdown-link>
                                </form>
                            {{-- @else
                                <x-dropdown-link :href="route('login')">Đăng nhập</x-dropdown-link>

                                @if (Route::has('register'))
                                    <x-dropdown-link :href="route('register')">Đăng ký</x-dropdown-link>
                                @endif --}}
                            @endauth
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-red-600 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6 text-white hover:text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/delivery')">
                {{ __('Trang chủ') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href=" url('/delivery') ">
                {{ __('Đơn hàng đang giao') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href=" url('/delivery/progressed-bills') ">
                {{ __('Đơn hàng đã giao') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="space-y-1">
                <!-- Authentication -->
                @if (Route::has('login'))
                    @auth
                        <x-responsive-nav-link :href=" url('/#') "> Lịch sử mua hàng </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('profile.edit')"> {{ Auth::user()->username }} </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Đăng xuất') }}
                            </x-responsive-nav-link>
                        </form>
                    @else
                        <x-responsive-nav-link :href="route('login')">Đăng nhập</x-responsive-nav-link>

                        @if (Route::has('register'))
                            <x-responsive-nav-link :href="route('register')">Đăng ký</x-responsive-nav-link>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>
