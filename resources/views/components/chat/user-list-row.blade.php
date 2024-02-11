@props(
    [
        'name',
    ]
)
<div class=" flex justify-between space-x-1 p-2 border-b border-slate-500   bg-[#25445e] ">
    <div class="flex items-center space-x-5">
        <div class="p-5 rounded-full bg-red-500"></div>
        <h4 class="whitespace-nowrap">{{ $name }}</h4>
    </div>
    <div class="flex flex-nowrap">
        <i class="fa-solid fa-thumbtack py-4 px-2"></i>
        <span class=" relative  group">
            <i class="fa-solid fa-bars py-4 px-2"></i>
            {{-- menu --}}
            <div class="absolute right-2 group-hover:block  hidden  ">
                <ul class="bg-white/30 rounded-sm w-[8em] z-[10000] left-0">
                    <li class="py-3 px-4 text-green-400 flex items-center hover:bg-black/20"><i
                            class="fa-solid fa-user mx-2"></i> Profile</li>
                    <li class="py-3 px-4 text-yellow-400 flex items-center hover:bg-black/20"><i
                            class="fa-solid mx-2 fa-volume-xmark"></i>Mute</li>
                    <li class="py-3 px-4 text-red-400 flex items-center hover:bg-black/20"> <i
                            class="fa-solid  fa-user-minus mx-2"></i> Remove</li>
                </ul>
            </div>
        </span>
    </div>
</div>
