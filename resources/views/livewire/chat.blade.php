<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330]/90 flex  text-white">
        <div class="users border w-1/3 h-full overflow-x-hidden overflo-auto" id="userList">
            <div class="flex justify-between bg-[#162838] ">
                <div class="w-full p-5 flex items-center space-x-5">
                    <a wire:navigate href="{{ route('profile') }}" class="p-5 rounded-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1707033081487-d5f5e3e5651c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')"></a>
                    <h4 class="whitespace-nowrap">{{ auth()->user()->user_name }}</h4>
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
                <x-chat.user-list-row name="{{ $friend->user_name }}"/>
            @endforeach
        @else
        <div class=" flex justify-center ">

            <button class="py-2 px-5 bg-green-500 rounded-md text-white hover:bg-green-600 active:bg-green-700"><i class="fa-solid fa-plus"></i> Add Friends </button>
        </div>
        @endif
        </div>
        {{-- main messages section --}}
        <div class="messages  w-full relative ">
            <div class=" flex justify-between space-x-1 p-2 border-b border-slate-500   bg-[#25445e] ">
                <div class="flex items-center space-x-5">
                    <button onclick="toggleUserList(event)"><i class="fa-solid fa-bars p-5 text-lg mt-2"></i></button>
                    <div class="p-5 rounded-full bg-red-500 "></div>
                    <h4 class="">Person 1</h4>
                </div>
                <div>
                    <i class="fa-solid fa-thumbtack py-4 px-2"></i>
                    <i class="fa-solid fa-bars py-4 px-2"></i>
                </div>
            </div>
            {{-- messages --}}
            <div class=" h-[90%] w-full">
                <div class="h-[90%] overflow-auto">
                    <x-chat.friend-message message="hello" time="12:01:2023 12:24 PM" />
                    <x-chat.my-message message="hello" time="12:01:2023 12:24 PM" />
                    <div class="p-4 w-full mb-4"></div>
                </div>

                {{-- send msg form --}}
                <div class="p-4 flex absolute space-x-1 bottom-0 w-full bg-[#152330]">
                    <input type="text" class="bg-slate-500/90 w-[90%] rounded-md py-2 px-5"
                        placeholder="Enter message..." name="" id="">
                    <button class="py-2 rounded-md  bg-slate-500/90 px-5">
                        <i class="fa-solid fa-paper-plane "></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
