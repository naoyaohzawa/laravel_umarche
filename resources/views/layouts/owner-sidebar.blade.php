<!-- component -->
<div class="w-full h-full">
    <dh-component>
        <div class="flex flex-no-wrap">
            <!-- Sidebar starts -->
            <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
            <div style="min-height: 100%"
                class="w-64  sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
                <div class="px-8">
                    <div class="h-16 w-full flex items-center">
                        <a href="{{ route('owner.dashboard') }}">
                            <x-application-logo class="block h-10 w-50 fill-current text-gray-600" />
                        </a>
                    </div>
                    <ul class="mt-12">

                        {{-- dashboard --}}
                        <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                            <x-nav-link :href="route('owner.dashboard')" :active="request()->routeIs('owner.dashboard')"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-grid text-white" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                                <span class="text-sm ml-2 text-white">{{ __('Dashboard') }}</span>

                            </x-nav-link>
                        </li>

                        {{-- 登録船一覧 --}}
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <x-nav-link :href="route('owner.ships.index')"
                                :active="request()->routeIs('owner.ships.index')"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white text-white">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-puzzle text-white" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                    </path>

                                </svg>
                                <span class="text-sm ml-2 text-white">登録船一覧</span>
                            </x-nav-link>
                        </li>

                        {{-- 航海 --}}
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <x-nav-link :href="route('owner.voyages.index')"
                                :active="request()->routeIs('owner.voyages.index')"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white text-white">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-compass" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                                <span class="text-sm ml-2 text-white">航海一覧</span>
                            </x-nav-link>
                        </li>
                        <li>
                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('owner.logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('owner.logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </dh-component>
</div>
