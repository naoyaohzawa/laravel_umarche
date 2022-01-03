<x-app-layout>
    <x-slot name="header">
        <ul class="flex border-b">
            <li class="mr-1">
              <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{route('owner.voyages.show', [$voyage->id])}}">航海情報</a>
            </li>
            <li class="-mb-px mr-1">
              <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="" readonly>航海情報更新</a>
            </li>
            <li class="mr-1">
                <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{ route('owner.documents.show', [$voyage->id]) }}">書類作成</a>
            </li>
          </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-3 mx-auto">
                            <div class="lg:w-3/4 md:w-2/3 mx-auto">
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                                {{-- form --}}
                                <form action="{{ route('owner.voyages.update', ['voyage' => $voyage->id]) }}"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="itinerary_number"
                                                    class="leading-7 text-sm text-gray-600">航路番号</label>
                                                <input type="text" id="itinerary_number" name="itinerary_number"
                                                    required
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="航海番号を入力してください"
                                                    value="{{ $voyage->itinerary_number }}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="operator_name"
                                                    class="leading-7 text-sm text-gray-600">海運会社名</label>
                                                <input type="text" id="operator_name" name="operator_name"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="海運会社を入力してください" value="{{ $voyage->operator_name }}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="cargo_company_name"
                                                    class="leading-7 text-sm text-gray-600">荷主名</label>
                                                <input type="text" id="cargo_company_name" name="cargo_company_name"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="荷主名を入力してください"
                                                    value="{{ $voyage->cargo_company_name }}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="cargo_description"
                                                    class="leading-7 text-sm text-gray-600">荷物名</label>
                                                <input type="text" id="cargo_description" name="cargo_description"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="荷物名を入力してください"
                                                    value="{{ $voyage->cargo_description }}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="cargo_amount"
                                                    class="leading-7 text-sm text-gray-600">荷物量（DWT）</label>
                                                <input type="text" id="cargo_amount" name="cargo_amount"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="荷物量を半角数字で入力してください"
                                                    value="{{ $voyage->cargo_amount }}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="planned_loading_port"
                                                    class="leading-7 text-sm text-gray-600">積地港</label>
                                                <input type="text" id="planned_loading_port" name="planned_loading_port"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="積地港を入力してください"
                                                    value="{{ $voyage->planned_loading_port }}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="planned_discharging_port"
                                                    class="leading-7 text-sm text-gray-600">揚地港</label>
                                                <input type="text" id="planned_discharging_port"
                                                    name="planned_discharging_port"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚地港を入力してください"
                                                    value="{{ $voyage->planned_discharging_port }}">
                                            </div>
                                        </div>


                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="planned_loading_date"
                                                    class="leading-7 text-sm text-gray-600">積み日時</label>
                                                <input type="date" id="planned_loading_date" name="planned_loading_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚地港を入力してください"
                                                    value="{{ $voyage->planned_loading_date }}">
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="planned_discharging_date"
                                                    class="leading-7 text-sm text-gray-600">揚げ日時</label>
                                                <input type="date" id="planned_discharging_date"
                                                    name="planned_discharging_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚地港を入力してください"
                                                    value="{{ $voyage->planned_discharging_date }}">
                                            </div>
                                        </div>

                                        {{-- 追加情報 --}}
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="arrived_port_date"
                                                    class="leading-7 text-sm text-gray-600">積地港 着岸時間</label>
                                                <input type="datetime-local" id="arrived_port_date"
                                                    name="arrived_port_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="積地港着岸時刻を入力してください" value="{{str_replace(" ", "T", $voyage->arrived_port_date)}}">
                                                    
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="loading_started_date"
                                                    class="leading-7 text-sm text-gray-600">積み荷役 開始時間</label>
                                                <input type="datetime-local" id="loading_started_date"
                                                    name="loading_started_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="開始時刻を入力してください" value="{{str_replace(" ", "T", $voyage->loading_started_date)}}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="loading_completed_date"
                                                    class="leading-7 text-sm text-gray-600">積み荷役 完了時間</label>
                                                <input type="datetime-local" id="loading_completed_date"
                                                    name="loading_completed_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="完了時刻を入力してください" value="{{str_replace(" ", "T", $voyage->loading_completed_date)}}">
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="loading_port_disported_date"
                                                    class="leading-7 text-sm text-gray-600">積地港 離岸時間</label>
                                                <input type="datetime-local" id="loading_port_disported_date"
                                                    name="loading_port_disported_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="積地離岸時刻を入力してください" value="{{str_replace(" ", "T", $voyage->loading_port_disported_date)}}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="discharging_port_arrived_date"
                                                    class="leading-7 text-sm text-gray-600">揚地港 着岸時間</label>
                                                <input type="datetime-local" id="discharging_port_arrived_date"
                                                    name="discharging_port_arrived_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚地着岸時刻を入力してください" value="{{str_replace(" ", "T", $voyage->discharging_port_arrived_date)}}">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="discharging_start_date"
                                                    class="leading-7 text-sm text-gray-600">揚げ荷役 開始時間</label>
                                                <input type="datetime-local" id="discharging_start_date"
                                                    name="discharging_start_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚げ荷役開始時刻を入力してください" value="{{str_replace(" ", "T", $voyage->discharging_start_date)}}">
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="discharging_complete_date"
                                                    class="leading-7 text-sm text-gray-600">揚げ荷役 完了時間</label>
                                                <input type="datetime-local" id="discharging_complete_date"
                                                    name="discharging_complete_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚げ荷役完了時刻を入力してください" value="{{str_replace(" ", "T", $voyage->discharging_complete_date)}}">
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label for="discharging_port_disported_date"
                                                    class="leading-7 text-sm text-gray-600">揚げ港 離岸時間</label>
                                                <input type="datetime-local" id="discharging_port_disported_date"
                                                    name="discharging_port_disported_date"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    placeholder="揚げ港離岸時刻を入力してください" value="{{str_replace(" ", "T", $voyage->discharging_port_disported_date)}}">
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/3 mx-auto">
                                            <div class="relative">
                                                <label class="form-check-label inline-block text-gray-800"
                                                        for="flexSwitchCheckDefault">この航海が完了したらCheck</label>
                                                <div class="form-check form-switch ">
                                                    <input
                                                        class="form-check-input appearance-none w-9 mt-2 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm"
                                                        type="checkbox" role="switch" id="flexSwitchCheckDefault" name="complete_flag" value="1">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="p-2 w-1/3 mx-auto"> 
                                            <div class="form-check form-switch">
                                                <input
                                                    class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm"
                                                    type="checkbox" role="switch" id="flexSwitchCheckDefault" name="complete_flag" value="1">
                                                <label class="form-check-label inline-block text-gray-800"
                                                    for="flexSwitchCheckDefault">この航海が完了したらCheck</label>
                                            </div>
                                        </div> --}}

                                        <div class="p-2 flex justify-around mt-4 w-full">
                                            <button type="button"
                                            onclick="location.href='{{ route('owner.voyages.show', [$voyage->id]) }}'"
                                                class="mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg">戻る</button>
                                            <button type="submit"
                                                class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                        </div>

                                        

                                        
                                    </div>
                                </form>
                                {{-- form --}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
