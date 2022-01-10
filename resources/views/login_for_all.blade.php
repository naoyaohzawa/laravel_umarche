<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Tailwind Starter Template - Landing Page Template: Tailwind Toolbox
    </title>
    <meta name="description" content="Simple landind page" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    {{-- <style>
      .gradient {
        background: linear-gradient(90deg, #2E86C1 0%, #D6EAF8 100%);
      }
    </style> --}}
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">  

<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                href="{{ url('/') }}">
                <div>
                    <ul class="flex flex-wrap^reverse">
                        <li>
                            <img src="{{ asset('images/logo.png') }}" alt="" class="w-8">
                        </li>
                        <li class="ml-2">アプリ名</li>
                    </ul>
                </div>
                {{-- <svg class="h-8 fill-current inline" src="{{asset('images/logo.png')}}"
                    viewBox="0 0 512.005 512.005">
                    <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502"
                        transform="matrix(1,0,0,1,0,0)" />
                    <path class="plane-take-off"
                        d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z " />
                </svg> --}}

            </a>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
            id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{ url('/') }}">トップページに戻る</a>
                </li>
            </ul>
        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>


    {{-- 早速使うsection --}}

            
    <section class="bg-white border-b py-8">
        <div class="max-w-5xl mx-auto m-8">
           
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    早速使ってみる
                </h1>
            
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="sm:w-1/2 p-6">
                    <h3 class="text-3xl text-center text-gray-800 font-bold leading-none mb-3">
                        船主様・船長
                    </h3>
                    <h3 class="text-3xl text-center text-gray-800 font-bold leading-none mb-3">
                        はこちら
                    </h3>
                    <div class="flex justify-center ">
                        @if (Route::has('owner.login'))
                            @auth('owners')
                                <a href="{{ url('/owner/dashboard') }}">
                                    <button id="navAction"
                                        class="mx-auto lg:mx-0 hover:underline text-gray-800 
                                bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500
                            font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 
                            focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        ログイン・新規登録
                                    </button>
                                </a>
                            @else
                                <a href="{{ route('owner.login') }}">
                                    <button id="navAction"
                                        class="mx-auto lg:mx-0 hover:underline text-gray-800 
                            bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500
                            font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 
                            focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        ログイン・新規登録
                                    </button>
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
                <div class="sm:w-1/2 p-6">
                    <h3 class="text-3xl text-center text-gray-800 font-bold leading-none mb-3">
                        荷主様・運航会社様・
                    </h3>
                    <h3 class="text-3xl text-center text-gray-800 font-bold leading-none mb-3">
                        港湾会社様はこちら
                    </h3>
                    <div class="flex justify-center ">

                        @if (Route::has('user.login'))
                            @auth('users')
                                <a href="{{ url('/dashboard') }}">
                                    <button id="navAction"
                                        class="mx-auto lg:mx-0 hover:underline text-gray-800 
                                bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500
                            font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 
                            focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        ログイン・新規登録
                                    </button>
                                </a>
                            @else
                                <a href="{{ route('user.login') }}">
                                    <button id="navAction"
                                        class="mx-auto lg:mx-0 hover:underline text-gray-800 
                                bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500
                            font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 
                            focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        ログイン・新規登録
                                    </button>
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- 早速使うsection --}}

    <!--Footer-->
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full text-center flex flex-col md:flex-row py-6">
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">リンク</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-pink-500">よくある問合せ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">サポート</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">規約関係</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">規約</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-pink-500">秘密保持方針</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">採用関係</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">採用情報</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">会社概要</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">運営会社</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">問合せ先</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    {{-- footer --}}

   
</body>
</html>
