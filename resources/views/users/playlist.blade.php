<x-layout :playlists="$playlists">
    <div class="mx-auto h-full p-12 ">
        <form action="/storeplaylist" method="POST" class="grid grid-cols-[auto_1fr] w-full  gap-8" enctype="multipart/form-data">

            @csrf

            <div class="text-white flex flex-col justify-evenly h-full w-1/2">
                <p class="font-bold" style="width: 700px">Playlist Creater: {{auth()->user()->name}}</p><br><br>
                <input type="file" name="image"  class="py-2 px-4 rounded-xl bg-transparent border border-gray-400 outline-none" style="width: 700px"><br><br>

                <input type="text" name="name" placeholder="PlayList Name" class="py-2 px-4 rounded-xl bg-transparent border border-gray-400 outline-none" style="width: 700px"><br><br>

                {{-- load page if some field are wrong or error --}}
                @error('name')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror

                <div class="flex justify-center">
                    <button class="text-black border-2 border-black bg-blue-400 hover:bg-purple-700 font-semibold rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Create</button>
                </div>
            </div>
        </form>
    </div>

</x-layout>