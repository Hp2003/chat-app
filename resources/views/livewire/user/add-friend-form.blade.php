<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330]/90 flex-col space-y-5 text-white">
        <div class="w-full">
            <div class="p-4 flex  space-x-1  w-full bg-[#152330]">
                <input type="text" class="bg-slate-500/90 w-[90%] mx-auto  py-2 px-5" wire:model.live="search"
                    placeholder="Enter user name" name="" id="">
                <a class="py-2 bg-slate-500/90 px-5 relative" href="{{ route('friend-requests') }}">
                    @if ($requestCount > 0)
                        <p class="absolute -right-3 bg-red-500 rounded-full text-sm py-1 px-2 -top-3">{{ $requestCount }}
                        </p>
                    @endif
                    <i class="fa-solid fa-user "></i>
                </a>
            </div>
        </div>
        <div class="w-full flex-col space-y-1  ">
            {{-- user --}}
            @foreach ($users as $user)
                <x-user.add-friend-user-row index="{{ $loop->index }}" name="{{ $user->user_name }}"
                    uuid="{{ $user->uuid }}" />
            @endforeach

        </div>
    </div>
</div>
