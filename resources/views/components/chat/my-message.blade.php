@props([
    'message',
    'time',
    'id',
])
<div class="w-full flex  py-3 px-2 items-centerspace-x-5">
    <div class="flex w-full flex-col space-y-2 mr-5">
        <span
            class=" py-3 px-5 bg-slate-500/80 rounded-tr-lg rounded-bl-lg ml-4 rounded-tl-lg self-end ">{{ $message }}</span>
        <span class="text-[10px] self-end flex text-slate-400 ml-5 ">
            <div class="flex space-x-2 items-center mr-3">
                <i class="fa fa-pencil"></i>
                <button wire:confirm="do you really want to delete this message?" wire:click="deleteMessage('{{ $id }}')">
                    <i class=" fa fa-trash text-red-500"></i>
                </button>
            </div>
            <p>{{ $time }}</p>
        </span>
    </div>
</div>
