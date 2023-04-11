<x-dash-layout>

    <x-flash-message />

    <div class="my-6 text-white font-bold text-2xl">
        <h2>Artists</h2>
    </div>
    <div class="flex justify-end mr-4">
        <a href="/admin/addArtist" class="text-black text-end fixed p-2 w-12 aspect-square bg-blue-400 rounded-full cursor-pointer flex items-center justify-center">
            <i class="fa-solid fa-plus text-3xl"></i>
        </a>
    </div><br><br><br>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($artists as $artist)
            <div id="music" class="allMusics bg-gray-900 flex flex-col gap-3 rounded-sm hover:bg-gray-700 transition-all duration-500 group shadow-[0px_0px_5px] shadow-blue-400">
                <div class="overflow-hidden h-full relative before:content-[''] before:absolute before:bg-gray-900 before:w-full  group-hover:before:bg-gray-700 before:transition-all before:duration-500">
                    <img id="musicImg" class="rounded-t-sm shadow-[0_0_15px] shadow-black object-fill group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500" src="{{$artist->image}}" alt=""/>
                </div>
                <div class="p-4 flex justify-between items-center gap-2 -mt-4">
                    <div class="flex flex-col w-1/2">
                        <h2 title="{{$artist->artist_name}}" class="text-white font-bold text-xl truncate">{{$artist->artist_name}}</h2>
                        <p class="text-gray-400">Artist</p>
                    </div>
                    <div class="relative">
                        <div id="avatarButton" class=" elipsis"><i class="fa-solid fa-ellipsis text-xl text-gray-400 cursor-pointer hover:text-white"></i></div>                            <!-- Dropdown menu -->
                        {{-- drop dorwn --}}
                        <div id="userDropdown" class="bg-gray-800 hidden absolute top-6 z-10 w-44 text-white rounded border border-gray-700 divide-y divide-gray-100 shadow">
                            <ul class="py-1 text-sm " aria-labelledby="avatarButton">   
                                <li>
                                    <a href="/admin/editArtistForm/{{$artist->id}}" class="block py-2 px-4 text-center text-green-400 hover:bg-blue-400 hover:text-black"><i class="fa-solid fa-pen mr-2"></i>Edit Artist {{$artist->id}}</a>
                                </li>
                                <li class="">
                                    <button data-modal-toggle="deleteModal" value="{{$artist->id}}" class="deleteBtn text-red-500 text-center block py-2 px-4 hover:bg-blue-400 hover:text-black w-full">
                                        <i class="fa-solid fa-trash"></i>
                                        Remove Artist
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <x-delete.delete />

    <div class="h-64"></div>

    <script>
        let deleteBtn = document.querySelectorAll(".deleteBtn");
        let elipsisBtn = document.querySelectorAll('.elipsis');

        deleteBtn.forEach((ele) => {
            ele.addEventListener("click", () => {
                document
                    .getElementById("confirm-delete")
                    .setAttribute("href", `/admin/deleteArtist/${ele.value}`);
            });
        });

        elipsisBtn.forEach(ele => {
            ele.addEventListener('click', () => {
                ele.nextElementSibling.classList.toggle('hidden');
            })
        })


    </script>

</x-dash-layout>