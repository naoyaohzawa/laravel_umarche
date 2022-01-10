
<x-guest-layout>    
    <x-auth-card>
        荷主様・運航会社様・港湾会社様向けログインページ
        <x-slot name="logo">
            <div class="w-20">
                <a href="{{ url('top') }}">
                    <x-application-logo class="w-20 h-20 fill-current text-blue-500" />
                </a>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('user.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.password.request') }}">
                        {{ __('パスワードをお忘れの方') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
        <div class="mt-5">
            まだ登録されていない方<br />
            <div class="flex justify-center">
                <a href="{{ route('user.register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        新規登録へ
                    </button>
                </a>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>


