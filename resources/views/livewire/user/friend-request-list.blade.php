<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330]/90 flex-col space-y-5 text-white">
        <div class="w-full">
            <div class="p-4 flex  space-x-1  w-full bg-[#152330]">
                <input type="text" class="bg-slate-500/90 w-[90%] mx-auto  py-2 px-5" wire:model.live="search"
                    placeholder="Enter user name" name="" id="">
            </div>
        </div>
        <div class="w-full flex-col space-y-1  ">
            {{-- friends --}}
            @foreach ($requests as $request)
                <x-user.friend-request-user-row name="{{ $request->user_name }}" uuid="{{ $request->getFriendUuid()->first()->uuid }}" />
            @endforeach

        </div>
    </div>
</div>
