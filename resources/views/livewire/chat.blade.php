<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330]/90 flex  text-white">
        <div class="users border w-1/3 h-full overflow-x-hidden overflo-auto" id="userList">
            <div class="flex justify-between bg-[#162838] ">
                <div class="w-full p-5 flex items-center justify-around space-x-5">
                    <div class="flex items-center space-x-2">
                        <a wire:navigate href="{{ route('profile') }}" class="p-5 rounded-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1707033081487-d5f5e3e5651c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')"></a>
                        <h4 class="whitespace-nowrap">{{ auth()->user()->user_name }}</h4>
                    </div>
                    <a class="py-2 bg-slate-500/90 px-5 relative" href="{{ route('add-friend') }}">
                        @if ($requestCount > 0)
                            <p class="absolute -right-3 bg-red-500 rounded-full text-sm py-1 px-2 -top-3">{{ $requestCount }}
                            </p>
                        @endif
                        <i class="fa-solid fa-user "></i>
                    </a>
                </div>

                {{-- <a href=""><i class="fa-solid fa-gear p-5 text-lg mt-2"></i></a> --}}
            </div>
            <div class="p-4 flex justify-between ">
                <input type="text" class="bg-slate-500 w-[90%] rounded-md px-3 py-1" wire:model.live.delay.shorter="search" placeholder="search..."
                    name="" id="">
                <i class="fa-solid fa-filter p-3"></i>
            </div>
        {{-- Listing friends --}}
        @if(count($friends) > 0)
            @foreach ($friends as $friend)
                <x-chat.user-list-row name="{{ $friend->user_name }}" uuid="{{ $friend->getFriendUuid()->first()->uuid }}"/>
            @endforeach
        @else
        {{-- When user has no friends --}}
        <div class=" flex justify-center ">
            <a href="{{ route('add-friend') }}" wire:navigate class="py-2 px-5 bg-green-500 rounded-md text-white hover:bg-green-600 active:bg-green-700"><i class="fa-solid fa-plus"></i> Add Friends </a>
        </div>
        @endif
        </div>
        {{-- main messages section --}}
        <livewire:chat.chat-message-part key="{{ now() }}"  uuid="{{ $selectedUser }}"/>
    </div>
</div>
