<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $task->title." düzenliyorsun" }}
        </h2>
    </x-slot>

    <div class="py-12"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                  <x-alert/>
                <form action="{{route('tasks.update',$task->id)}}" method="POST" autocomplete=”off” enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Başlık</label>
                        <input type="title" value="{{$task->title}}" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Başlık" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Açıklama</label>
                        <textarea name="description" class="editor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$task->description}}</textarea>
                    </div>
                    @if($task->image)
                        <img src="{{asset('images/'.$task->image)}}" class="h-48 w-full object-cover md:h-full md:w-48">
                    @else
                    <div class="mb-6">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resim</label>
                        <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Resim">
                    </div> 
                    @endif
                     
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
                </form>
  
  
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script type="text/javascript" src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: '.editor',
                height: 300,
                menubar: true,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
         
        </script>
     </x-slot>
</x-app-layout>
