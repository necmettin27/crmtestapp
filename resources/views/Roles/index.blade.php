<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yetkiler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a type="button" href="{{route('roles.create')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Yeni Yetki Ekle</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-alert/>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                   Yetki
                                </th> 
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @forelse($roles as $key => $role)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{$role->name}}
                                    </th>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center pt-5 pb-4">
                                        Kayıtlı yetki bulunamadı
                                    </td> 
                                </tr> 
                            @endforelse
                        </tbody>
                    </table>
                </div> 
            </div>   
            </div>
        </div>
    </div>
</x-app-layout>
