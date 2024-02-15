@props(
    [
        'message',
        'time',
    ]
)
<div class="w-full flex  py-3 px-2 items-centerspace-x-5 ">
    <div class="flex w-full flex-col space-y-2">
        <span
            class=" py-3 px-5 bg-slate-500/80 rounded-tr-lg rounded-br-lg ml-4 rounded-bl-lg self-start ">{{ $message }}</span>
        <span class="text-[10px] flex text-slate-400 ml-5 ">
            <p>{{ $time }}</p>
            <div class="">
                <i class="mx-5 fa fa-list"></i>
                <ul class=" absolute chat-options hidden ml-5 flex-col">
                    <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                            class="mr-3 ml-1 fa fa-pencil"></i>Edit</li>
                    <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                            class="mr-3 ml-1 fa-solid fa-share"></i>Replay</li>
                    <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                            class="mr-3 ml-1 fa fa-user-xmark"></i>Remove</li>
                </ul>
            </div>
        </span>
    </div>
</div>
