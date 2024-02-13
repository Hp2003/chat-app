@props(['uuid', 'name', 'roomId', 'index'])
<div class=" flex justify-between space-x-1 p-2 border-b border-slate-500   bg-[#25445e] ">
    <div class="flex items-center space-x-5">
        <div class="p-5 rounded-full bg-red-500 relative">
            <input type="hidden" name="" value="{{ $roomId }}" class="user-room-id">
            @if ($isOnline)
                <div
                    class="w-[12px] h-[12px] bg-green-500 rounded-full  absolute online-indicator -right-1 bottom-1 ">
                </div>
            @endif
        </div>
        <button wire:click="selectUser('{{ $uuid }}')">
            <h4 class="whitespace-nowrap">{{ $name }}</h4>
        </button>
    </div>
    <div class="flex flex-nowrap user-row">
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
                    <li class="py-3 px-4 text-red-400  hover:bg-black/20"> <button class="flex items-center"
                            wire:click="removeFriend('{{ $uuid }}')"><i
                                class="fa-solid  fa-user-minus mx-2"></i> Remove</li>
                    </button>
                </ul>
            </div>
        </span>
    </div>
</div>



@script
<script>
    $wire.on('user-online', (e)=>{
        console.log('hello, world', e);
    })
</script>
@endscript


