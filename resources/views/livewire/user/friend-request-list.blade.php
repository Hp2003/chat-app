<div class=" h-screen text-white flex flex-col bg-slate-400/20 w-full relative">
    <div class="w-full  flex items-center bg-black/40 p-3">
        <input type="text" class="bg-slate-500/90 w-[90%] mx-auto  py-2 px-5" wire:model.live="search"
            placeholder="Enter user name" name="" id="">
    </div>
    <div class="m-3 flex flex-col space-y-2">
        @foreach ($requests as $request)
            <x-user.friend-request-user-row index="{{ $loop->index }}" name="{{ $request->user_name }}"
                uuid="{{ $request->getFriendInstance()->first()->uuid }}" />
        @endforeach
    </div>
</div>

