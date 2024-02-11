@props([
    'message',
    'time',
])
<div class="grid justify-end ">
    <p class="py-3 px-4 bg-blue-600 inline-block m-5 my-1 rounded-tl-md rounded-tr-md rounded-bl-md  text-lg">
        {{ $message }}
    </p>
    <div class=" flex group items-center text-[12px] mr-5 row text-slate-400">
        <i class=" mr-3 fa-solid fa-list-ul"></i>
        <div class="group-hover:block hidden m-1 ">
            <ul class="bg-white/30 absolute rounded-sm ">
                <li class="py-3 px-4  flex items-center hover:bg-black/20 hover:text-white"><i class="fa-solid fa-share mx-2"></i> Replay
                </li>
                <li class="py-3 px-4  flex items-center hover:bg-black/20 hover:text-white"><i
                        class="fa-solid fa-share-from-square mx-2"></i>Forward</li>
                <li class="py-3 px-4 text-red-500 flex items-center hover:bg-black/20 hover:text-red-600"> <i
                        class="fa-solid  fa-trash mx-2"></i> Delete</li>
            </ul>
        </div>
        {{ $time }}
    </div>
</div>
