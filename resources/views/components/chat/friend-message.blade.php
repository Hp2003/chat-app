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
        </span>
    </div>
</div>
