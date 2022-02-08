<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            書類一覧
        </h2>
    </x-slot>

    <x-slot name="header">
        <ul class="flex border-b">
            <li class="-mb-px mr-1">
                {{-- <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{route('owner.voyages.show', [$voyage->id])}}">航海情報</a> --}}
            </li>
            <li class="mr-1">
              {{-- <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{ route('owner.voyages.edit', [$voyages[0]->id]) }}">航海情報更新</a> --}}
            </li>
            <li class="mr-1">
                {{-- <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="{{ route('owner.voyages.shipinfo', [$ship_lists[0]->id]) }}">航海情報更新</a> --}}
              </li>
            <li class="mr-1">
              <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 hover:bg-gray-200 hover:rounded-md font-semibold" href="">書類作成</a>
            </li>
          </ul>
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
                                                入港届 -general declaration-</th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                            <th
                                                class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                            <tr>
                                                {{-- <td class="md:px-4 py-3">{{ $key + 1 }}</td> --}}
                                                <td class="md:px-4 py-3">
                                                    {{-- <a 
                                                    href="{{ route('owner.general_declaration', [$voyages[0]->id]) }}"
                                                        class="mx-auto text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded ">リンク先へ飛ぶ</a> --}}
                                                </td>
                                                <td class="md:px-4 py-3 text-center">

                                                </td>
                                                <td class="md:px-4 py-3 text-center">
                                                
                                                </td>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                                {{-- {{$owners->links()}} --}}
                            </div>  
                        </div>
                    </section>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
