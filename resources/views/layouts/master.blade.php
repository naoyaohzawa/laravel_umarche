<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
    {{-- @if (auth('listeners')->user())
    @elseif(auth('users')->user())
    @endif --}}

    <div class="flex-1 flex flex-col overflow-hidden">
        @if (auth('admin')->user())
            @include('layouts.admin-navigation')
        @elseif(auth('owners')->user())
            @include('layouts.owner-navigation')
        @elseif(auth('users')->user())
            @include('layouts.user-navigation')
        @endif
        <main class="main-bgc flex-1 overflow-scroll">
            {{ $slot }}
        </main>
    </div>
</div>
<style>
    main {
        padding: 0 10px;
        padding-bottom: 124px;
    }

    @media (min-width: 1024px) {
        main {
            padding-left: 344px;
        }
    }

</style>
