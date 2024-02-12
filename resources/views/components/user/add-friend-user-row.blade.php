@props([
    'index',
    'name',
    'uuid'
])
<div class=" w-full">
    <div class=" flex justify-between space-x-1 p-2 border-b border-slate-800 hover:bg-slate-900/40  bg-slate-800/50 ">
        <div class="flex items-center space-x-5">
            <div class="p-5 rounded-full bg-red-500"></div>
            <h4 class="whitespace-nowrap">{{ $name }}</h4>
        </div>
        <button onclick="showSendRequest({{ $index }})" class="send-btn text-green-500 flex items-center pr-5 rounded-full cursor-pointer">
            <i class="fa-solid fa-user-plus "></i>
        </button>
        <div class=" items-center send-request-option hidden">
            <button wire:click="sendRequest('{{ $uuid }}')"><i class="fa-solid fa-check p-3 border border-green-500 rounded-full hover:text-white hover:bg-green-500"></i></button>
            <button onclick="removeSendRequest({{ $index }})"><i class="fa-solid fa-xmark p-3 border mx-5 border-red-500 rounded-full hover:text-white hover:bg-red-500"></i></button>
        </div>
    </div>
</div>
