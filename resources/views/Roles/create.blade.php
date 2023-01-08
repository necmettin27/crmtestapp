<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yetki Ekle') }}
        </h2>
    </x-slot>

    <div class="py-12"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                  <x-alert/>
                
                    <form action="{{route('roles.store')}}" method="POST">
                        @csrf
                        <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Yetki Adı</label>
                        <input type="text" id="title" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Yetki Adı" required>
                        </div> 
                        <div class="grid grid-cols-4">
                            @foreach($permission as $value) 
                                <div class="p-3">
                                    <div class="">
                                        <input id="role_{{$value->id}}" name="permission[]" type="checkbox" value="{{$value->id}}" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                        <label for="role_{{$value->id}}" class="ml-1">{{ $value->name }}</label>
                                    </div> 
                                </div>
                            @endforeach 
                        </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
                    </form>
                    
  
  
            </div>
        </div>
    </div>
</x-app-layout>
