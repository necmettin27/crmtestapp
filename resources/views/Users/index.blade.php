<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kullanıcılar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a type="button" href="{{route('users.create')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Yeni Kullanıcı Ekle</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-alert/>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Ad Soyad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Oluşturulma Tarihi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Yetki
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @forelse($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{$user->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$user->created_at}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $v }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('users.edit',$user->id)}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Düzenle</a> 
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center pt-5 pb-4">
                                        Kayıtlı kullanıcı bulunmamaktadır. 
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
