<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('İşler Yönetimi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a type="button" href="{{route('tasks.create')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Yeni İş Ekle</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-alert/>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                   Başlık
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kullanıcı
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Oluşturulma Tarihi
                                </th>
                                
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @forelse($tasks as $task)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{$task->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$task->getUser->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$task->created_at}}
                                    </td>
                                     
                                    <td class="px-6 py-4">
                                        <a href="{{route('tasks.edit',$task->id)}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Düzenle</a> 
                                        <a href="{{route('tasks.destroy',$task->id)}}" onclick="return confirm('Veri silinecek onaylıyormusun?')" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Sil</a>  
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
