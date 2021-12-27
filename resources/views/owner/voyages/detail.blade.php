<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            航海情報
        </h2>
    </x-slot>



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





    {{-- <div class="container"> --}}
    <!-- 船の情報を表示 -->

    {{-- <div class="table-responsive">
    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">船名</th>
                        <th class="text-center" scope="col">船主</th>
                        <th class="text-center" scope="col">船型</th>
                        <th class="text-center" scope="col">Grossトン</th>
                        <th class="text-center" scope="col">DWT</th>
                        <th class="text-center" scope="col">MMSI</th>
                        <th class="text-center" scope="col">Call Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ship_lists as $ship_list)
                    <tr>
                        <th class="text-center" scope="row">
                            1
                        </th>
                        <td class="text-center">{{ $ship_list->vessel_name }}</td>
                        <td class="text-center">{{ $ship_list->owner_name }}</td>
                        <td class="text-center">{{ $ship_list->vessel_type }}</td>
                        <td class="text-center">{{ $ship_list->gross_ton }}</td>
                        <td class="text-center">{{ $ship_list->dwt }}</td>
                        <td class="text-center">{{ $ship_list->mmsi }}</td>
                        <td class="text-center">{{ $ship_list->call_number }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    <!-- 船の情報を表示 -->
    {{-- <div class="row align-items-md-stretch">
    
            <div class="col-md-4 mb-2">
                <div class="h-100 p-2 bg-light border rounded-3">
                    <h4 class="text-center">運航情報</h4>
                    <table class="table table-sm">
                        <!-- <tr><td>航路番号</td><td>{{$voyages[0]->itinerary_number}}</td></tr>
                            <tr><td>船社名</td><td>{{$voyages[0]->operator_name}}</td></tr>
                            <tr><td>荷主名</td><td>{{$voyages[0]->cargo_owner_name}}</td></tr>
                            <tr><td>船主名</td><td>{{$voyages[0]->ship_owner_name}}</td></tr> -->
                        <tr>
                            <td>荷物</td>
                            <td>{{$voyages[0]->cargo_description}}</td>
                        </tr>
                        <tr>
                            <td>数量</td>
                            <td>{{$voyages[0]->cargo_amount}}</td>
                        </tr>
                        <tr>
                            <td>荷揚港</td>
                            <td>{{$voyages[0]->planned_loading_port}}</td>
                        </tr>
                        <tr>
                            <td>荷上げ日時</td>
                            <td>{{$voyages[0]->planned_loading_date}}</td>
                        </tr>
                        <tr>
                            <td>荷下港</td>
                            <td>{{$voyages[0]->planned_discharging_port}}</td>
                        </tr>
                        <tr>
                            <td>荷下し日時</td>
                            <td>{{$voyages[0]->planned_discharging_date}}</td>
                        </tr>
    
                    </table>
                </div>
            </div> --}}

    <div class="container mx-auto flex">

        <div class="container w-1/2">
    
            <div class="p-4 mt-4">
                <h1 class="text-xl text-center font-semibold mb-6">運行状況</h1>
                <div class="container">
                    <div class="flex flex-col md:grid grid-cols-12 text-gray-50">
    
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-blue-300 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-300 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            <div class="bg-blue-300 col-start-4 col-end-12 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                                <h3 class="font-semibold text-base mb-1">{{ $voyages[0]->planned_loading_port }} 到着時間</h3>
                                <p class="leading-tight text-justify w-full">
                                    {{ $voyages[0]->planned_loading_date }}
                                </p>
                            </div>
                        </div>
    
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-blue-300 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-300 shadow text-center">
                                    <i class="fas fa-check-circle text-black"></i>
                                </div>
                            </div>
                            <div class="bg-blue-300 col-start-4 col-end-12 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                                <h3 class="font-semibold text-base mb-1">荷役完了時間</h3>
                                <p class="leading-tight text-justify">
                                    {{ $voyages[0]->planned_loading_date }}
                                </p>
                            </div>
                        </div>
    
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-blue-300 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-300 shadow text-center">
                                    <i class="fas fa-times-circle text-black"></i>
                                </div>
                            </div>
                            <div class="bg-blue-300 col-start-4 col-end-12 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                                <h3 class="font-semibold text-base mb-1 text-gray-50">
                                    {{ $voyages[0]->planned_discharging_port }}</h3>
                                <p class="leading-tight text-justify">
                                    {{ $voyages[0]->planned_discharging_date }}
                                </p>
                            </div>
                        </div>
    
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-4 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-300 pointer-events-none"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-gray-300 shadow text-center">
                                    <i class="fas fa-exclamation-circle text-gray-400"></i>
                                </div>
                            </div>
                            <div class="bg-gray-300 col-start-4 col-end-12 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                                <h3 class="font-semibold text-base mb-1 text-gray-400">荷役完了予定</h3>
                                <p class="leading-tight text-justify">
                                    {{ $voyages[0]->planned_discharging_date }}
                                </p>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container w-1/2">
    
            <!-- 画像の投稿 -->
            <div class="container mt-3">
                <h4>新しい本船画像を投稿する</h4>
                <form action="{{ route('owner.images.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data"
                            multiple="multiple" required autofocus>
                    </div>
                    <input type="hidden" name="voyage_id" value="{{ $voyages[0]->id }}">
                    <button type="submit" class="btn btn-primary">送信する</button>
                </form>
            </div>
            <!-- 画像の投稿 -->
        
            <!-- 画像の表示 -->
            <div class="container mt-5">
                <h4>本船投稿画像一覧</h4>
        
                <div class="d-flex flex-wrap justify-content-between">
        
                    @foreach ($images as $image)
                        <div class="card mt-3" style="width: 15rem;">
                            <img src="/uploads/{{ $image->img_url }}" class="img-thumbnail">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">投稿日: {{ $image->updated_at }}</li>
                                    <li class="list-group-item">投稿者: 本船</li>
                                    {{-- <li class="list-group-item">
                                        <button type="button" class="btn btn-outline-primary btn-sm">画像を保存する</button>
                                        <button type="button" class="btn btn-outline-info btn-sm">編集</button>
                                    </li>
                                    <li class="list-group-item">
                                        <form action="{{ url('images/'. $image->id . '/' . $voyages[0]->vessel_id . '/' . $voyages[0]->itinerary_number) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-outline-danger btn-sm">削除</button>
                                            <input type="hidden" value="{{ $image->id }}">
                                        </form>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <!-- 画像の表示 --> --}}
        </div>
    </div>




    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
