<div class="grid justify-items-start grid-rows-1 ">
    <div class="bg-blue-400/90  row inline-block py-3 px-4 rounded-tl-md rounded-tr-md rounded-br-md  m-5 my-1">
        {{-- <p class="text-sm text-blue-800">user name</p> --}}
        <p class="text-lg col-span-1">{{ $message }}</p>
    </div>
    <div class=" flex group items-center text-[12px] ml-5 row text-slate-400">{{ $time }}
            <i class=" ml-3 fa-solid fa-list-ul"></i>
        <div class="group-hover:block hidden m-1 ">
            <ul class="bg-white/30 absolute rounded-sm ">
                <li class="py-3 px-4  flex items-center hover:bg-black/20 hover:text-white"><i class="fa-solid fa-share mx-2"></i> Replay</li>
                <li class="py-3 px-4  flex items-center hover:bg-black/20 hover:text-white"><i class="fa-solid fa-share-from-square mx-2"></i>Forward</li>
                <li class="py-3 px-4 text-red-500 flex items-center hover:bg-black/20 hover:text-red-600"> <i
                        class="fa-solid  fa-trash mx-2"></i> Delete</li>
            </ul>
        </div>
    </div>


</div>
