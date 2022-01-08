<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            航海一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 py12 mx-auto">
                            <x-flash-message status="session('status')" />
                            
                            <div class=" w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                #</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                船名</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                航海番号</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                船社名</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                荷主名</th>
                                            {{-- <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                船主名</th> --}}
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                荷物名</th>
                                            {{-- <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                荷物量</th> --}}
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                荷上港</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                予定荷上げ日時</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                予定荷下港</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                予定荷下し日時</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                詳細ページ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($voyages as $key => $voyage)
                                            <tr>
                                                <td class="md:px-4 py-3">{{ $key + 1 }}</td>
                                                <td class="md:px-4 py-3">{{ $voyage->vessel_name }}</td>
                                                <td class="md:px-4 py-3">{{ $voyage->itinerary_number }}</td>
                                                <td class="md:px-4 py-3">{{ $voyage->operator_name }}</td>
                                                <td class="md:px-4 py-3">{{ $voyage->cargo_company_name }}</td>
                                                {{-- <td class="md:px-4 py-3">{{ $voyage->owner_company_name }}</td> --}}
                                                <td class="md:px-4 py-3">{{ $voyage->cargo_description }}</td>
                                                {{-- <td class="md:px-4 py-3">{{ $voyage->cargo_amount }}</td> --}}
                                                <td class="md:px-4 py-3">{{ $voyage->planned_loading_port }}</td>
                                                <td class="md:px-4 py-3">{{ $voyage->planned_loading_date }}</td>
                                                <td class="md:px-4 py-3">{{ $voyage->planned_discharging_port }}
                                                </td>
                                                <td class="md:px-4 py-3">{{ $voyage->planned_discharging_date }}
                                                </td>
                                                <td class="md:px-4 py-3 text-center">
                                                    <button
                                                        onclick="location.href='{{ route('user.voyages.show', [$voyage->id]) }}'"
                                                        class="mx-auto text-white bg-indigo-400 border-0 py-2 px-2 focus:outline-none hover:bg-indigo-600 rounded text-sm">詳細へ移動</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$voyages->links()}}
                                {{-- {{ $voyages->appends(request()->query())->links() }} --}}
                            </div>
                            {{-- userには非表示 --}}
                            {{-- <div class="flex justify-end mb-4 mt-2">
                                <button onclick="location.href='{{ route('owner.voyages.create') }}' "
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">航海を新規登録</button>
                            </div> --}}
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
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
