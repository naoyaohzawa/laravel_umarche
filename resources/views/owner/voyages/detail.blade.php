<x-app-layout>
    
    
    <x-slot name="header">
        <ul class="flex border-b">
            <li class="-mb-px mr-1">
              <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#">航海情報</a>
            </li>
            <li class="mr-1">
              <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{ route('owner.voyages.edit', [$voyages[0]->id]) }}">航海情報更新</a>
            </li>
            <li class="mr-1">
                {{-- <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{ route('owner.voyages.shipinfo', [$ship_lists[0]->id]) }}">航海情報更新</a> --}}
              </li>
            <li class="mr-1">
              <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{ route('owner.documents.show', [$voyages[0]->id]) }}">書類作成</a>
            </li>
          </ul>
    </x-slot>

    <div class="container w-full mx-auto md:w-auto sm:w-auto text-lg font-bold">
        <h1>{{$ship_lists[0]->vessel_name}}の航海情報（航海番号: {{$voyages[0]->itinerary_number}}）</h1>
    </div>

    <div class="container w-full mx-auto md:w-auto sm:w-auto ">
        <!-- script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            // console.log($mmsi);
            // Map appearance
            var width = "100%"; // width in pixels or percentage
            var height = "300"; // height in pixels
            var zoom = "10"; // initial zoom (between 3 and 18)
            var names = false; // always show ship names (defaults to false)

            // Single ship tracking
            var mmsi = @json($ship_lists[0]->mmsi); // display latest position (by MMSI)
            var show_track = true; // display track line (last 24 hours)
        </script>
        <script type="text/javascript" src="https://www.vesselfinder.com/aismap.js"></script>
        <!-- script -->
    </div>

    {{-- 運航情報start --}}
    <div class="container mx-auto flex flex-wrap bg-sky-100">
        <div class="container mx-auto md:w-1/2 sm:w-1/2">
            <div class="p-4 mt-4">
                <h2 class="text-xl text-center font-semibold mb-6">積み港情報</h2>
                <div class="container">
                    <div class="flex flex-col md:grid grid-cols-12 text-gray-50">
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->arrived_port_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">{{ $voyages[0]->planned_loading_port }} 着岸時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">{{ $voyages[0]->planned_loading_port }} 着岸時刻:
                                        {{ $voyages[0]->arrived_port_date }}</h3>
                                </div>
                            @endif
                        </div>

                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->loading_started_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">積み荷役 開始時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">積み荷役 開始時刻:
                                        {{ $voyages[0]->loading_started_date }}
                                    </h3>
                                </div>
                            @endif

                        </div>
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->loading_port_disported_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">積み荷役 完了時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">積み荷役 完了時刻:
                                        {{ $voyages[0]->loading_completed_date }}</h3>
                                </div>
                            @endif

                        </div>
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->loading_port_disported_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">積み港 出航時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">積み港 出航時刻:
                                        {{ $voyages[0]->loading_port_disported_date }}</h3>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto md:w-1/2 sm:w-1/2 ">
            <div class="p-4 mt-4">
                <h2 class="text-xl text-center font-semibold mb-6">揚げ港情報</h2>
                <div class="container">
                    <div class="flex flex-col md:grid grid-cols-12 text-gray-50">
                        {{--  --}}
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->discharging_port_arrived_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">{{ $voyages[0]->planned_discharging_port }}
                                        到着時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">{{ $voyages[0]->planned_discharging_port }}
                                        到着時刻:
                                        {{ $voyages[0]->discharging_port_arrived_date }}</h3>
                                </div>
                            @endif
                        </div>

                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->discharging_start_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">揚げ荷役 開始時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">揚げ荷役 開始時刻:
                                        {{ $voyages[0]->discharging_start_date }}</h3>
                                </div>
                            @endif
                        </div>
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->discharging_complete_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">揚げ荷役 完了時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">揚げ荷役 完了時刻:
                                        {{ $voyages[0]->discharging_complete_date }}</h3>
                                </div>
                            @endif
                        </div>
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-sky-700 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-sky-700 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            @if ($voyages[0]->discharging_port_disported_date === null)
                                <div
                                    class="bg-gray-500 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-sm">揚げ港 離岸時刻:
                                        未開始 もしくは更新前</h3>
                                </div>
                            @else
                                <div
                                    class="bg-sky-700 col-start-4 col-end-12 p-4 rounded-xl my-2 mr-auto shadow-md w-full">
                                    <h3 class="font-semibold text-base">揚げ港 離岸時刻:
                                        {{ $voyages[0]->discharging_port_disported_date }}</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 運航情報end --}}

    <div class="container mx-auto w-full">



        <!-- 画像の表示 -->
        <div class="container  mt-5">
            <h2 class="text-xl text-center font-semibold mb-6">投稿画像</h2>
            <div class="flex flex-wrap m-3">
                @foreach ($images as $image)
                    <div class="w-full sm:w-1/3 md:w-1/6 flex flex-col p-3">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                            <div class="bg-cover h-48">
                                {{-- <img src="uploads/{{ $image->img_url }}"> --}}
                                <img src="{{asset('uploads/' . $image->img_url)}}" alt="">
                                
                            </div>
                            <div class="p-4 flex-1 flex flex-col" style="">
                                <p class="mb-4 text-l">投稿日: {{ $image->updated_at->diffForHumans() }}</p>
                                <div class="mb-4 text-grey-darker text-sm flex-1">
                                    <p>投稿者: 本船</p>
                                </div>
                                {{-- <a href="#"
                                    class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide"
                                    style="">Twitter</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <!-- 画像の表示 --> --}}

        <!-- 画像の投稿 -->

        <h4>新しい本船画像を投稿する</h4>
        <form action="{{ route('owner.images.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="flex flex-wrap">
                <div class="flex justify-center">
                    <div class="mb-3 w-96">
                        <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data"
                            multiple="multiple" required autofocus
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="ml-5 mx-auto">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">送信する</button>
                </div>
            </div>

            <input type="hidden" name="voyage_id" value="{{ $voyages[0]->id }}">
        </form>
        <!-- 画像の投稿 -->
    </div>

    
</x-app-layout>
