<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録船一覧
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 py12 mx-auto">
                            <x-flash-message status="session('status')" />
                            
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                No.</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                船名</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                船型</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                MMSI</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($ships as $key => $ship)
                                            <tr>
                                                <td class="md:px-4 py-3">{{ $key + 1 }}</td>
                                                <td class="md:px-4 py-3">{{ $ship->vessel_name }}</td>
                                                <td class="md:px-4 py-3">{{ $ship->vessel_type }}</td>
                                                <td class="md:px-4 py-3 text-lg text-gray-900">
                                                    {{ $ship->mmsi }}</td>
                                                <td class="md:px-4 py-3 text-center">
                                                    <button
                                                        onclick="location.href='{{ route('owner.ships.edit', [ $ship->id]) }}'"
                                                        class="mx-auto text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded ">編集</button>
                                                </td>
                                                <td class="md:px-4 py-3 text-center">
                                                    <form id="delete_{{ $ship->id }}" method="post"
                                                        action="{{ route('owner.ships.destroy', [ $ship->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" data-id="{{ $ship->id }}"
                                                            onclick="deletePost(this)"
                                                            class="mx-auto text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded ">削除</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{$owners->links()}} --}}
                            </div>
                           
                          <div class="flex justify-end mb-4 mt-2">
                            <button onclick="location.href='{{ route('owner.ships.create') }}' "
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">船を新規登録</button>
                        </div>
                        </div>
                    </section>
                    <br>

                    {{-- @foreach ($q_get as $q_owner)
                        {{ $q_owner->name }}
                        {{ Carbon\Carbon::parse($q_owner->created_at)->diffForHumans() }}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか? 登録された船の情報が全て削除されます')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
