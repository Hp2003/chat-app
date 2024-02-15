<div class=" h-screen text-white flex flex-col bg-slate-400/20 w-full relative">
    <div class="w-full  flex items-center bg-black/40 p-3">
        <input type="text" class="bg-slate-500/90 w-[90%] mx-auto  py-2 px-5" wire:model.live="search"
            placeholder="Enter user name" name="" id="">
        <a class="py-2 bg-slate-500/90 px-5 relative" href="{{ route('friend-requests') }}" wire:navigate>
            @if ($requestCount > 0)
                <p class="absolute -right-3 bg-red-500 rounded-full text-sm py-1 px-2 -top-3">{{ $requestCount }}
                </p>
            @endif
            <i class="fa-solid fa-user "></i>
        </a>
    </div>
    <div class="m-3 flex flex-col space-y-2">
        @foreach ($users as $user)
            <x-user.add-friend-user-row index="{{ $loop->index }}" name="{{ $user->user_name }}"
                uuid="{{ $user->uuid }}" />
        @endforeach
    </div>
</div>
