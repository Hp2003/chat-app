<div class="w-full h-screen  flex justify-center items-center">
    <input type="hidden" name="" id="friend-room-ids" value=@json($friendRoomIds)>
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330]/90 flex  text-white">
        <div class="users border w-1/3 h-full overflow-x-hidden overflo-auto animate-slideOut" id="userList">
            <div class="flex justify-between bg-[#162838] ">
                <div class="w-full p-5 flex items-center justify-around space-x-5">
                    <div class="flex items-center space-x-2">
                        <a wire:navigate href="{{ route('profile') }}" class="p-5 rounded-full bg-cover"
                            style="background-image: url('https://images.unsplash.com/photo-1707033081487-d5f5e3e5651c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')"></a>
                        <h4 class="whitespace-nowrap">{{ auth()->user()->user_name }}</h4>
                    </div>
                    <a class="py-2 bg-slate-500/90 px-5 relative" href="{{ route('add-friend') }}">
                        @if ($requestCount > 0)
                            <p class="absolute -right-3 bg-red-500 rounded-full text-sm py-1 px-2 -top-3">
                                {{ $requestCount }}
                            </p>
                        @endif
                        <i class="fa-solid fa-user "></i>
                    </a>
                </div>
            </div>
            <div class="p-4 flex justify-between ">
                <input type="text" class="bg-slate-500 w-[90%] rounded-md px-3 py-1"
                    wire:model.live.delay.shorter="search" placeholder="search..." name="" id="">
                <i class="fa-solid fa-filter p-3"></i>
            </div>
            {{-- Listing friends --}}
            @if (!is_null($friends) && count($friends) > 0)
                @foreach ($friends as $friend)
                    <livewire:chat.user-list-row index="{{ $loop->index }}" :wire:key="$friend->uuid"
                        uuid="{{ $friend->getFriendInstance()->first()->uuid }}" name="{{ $friend->user_name }}"
                        roomId='{{ $friend->getFriendInstance()->first()->room_id }}' index="{{ $loop->index }}" />
                @endforeach
            @else
                {{-- When user has no friends --}}
                <div class=" flex justify-center ">
                    <a href="{{ route('add-friend') }}" wire:navigate
                        class="py-2 px-5 bg-green-500 rounded-md text-white hover:bg-green-600 active:bg-green-700"><i
                            class="fa-solid fa-plus"></i> Add Friends </a>
                </div>
            @endif
        </div>
            {{-- main messages section --}}
            <livewire:chat.chat-message-part key="{{ now() }}" uuid="{{ $selectedUser }}" />
    </div>
</div>
@push('script')
    <script>
        window.secretToken = @json(session()->get('secret_token'));
    </script>
@endpush








{{-- chat message part --}}

<div class="messages  w-full relative ">
    <div class=" flex justify-between space-x-1 p-2 border-b border-slate-500   bg-[#25445e] ">
        <div class="flex items-center space-x-5">
            <button onclick="toggleUserList(event)"><i class="fa-solid fa-bars p-5 text-lg mt-2"></i></button>
            <div class="p-5 rounded-full bg-red-500 "></div>
            <h4 class="">{{ !empty($selectedUser['user_name']) ? $selectedUser['user_name'] : '' }}</h4>
        </div>
        <div>
            <i class="fa-solid fa-thumbtack py-4 px-2"></i>
            <i class="fa-solid fa-bars py-4 px-2"></i>
        </div>
    </div>
    {{-- messages --}}
    <div class=" h-[90%] w-full">
        <div class="h-[90%] overflow-auto">
            @foreach ($chats as $chat)
                @if (!$chat['user_id'] === auth()->user()->id)
                    <x-chat.friend-message message="{{ $chat['message'] }}"
                        time="{{ Carbon\Carbon::parse($chat['created_at'])->format('d-m-y h:i sa') }}" />
                @else
                    <x-chat.my-message message="{{ $chat['message'] }}"
                        time="{{ Carbon\Carbon::parse($chat['created_at'])->format('d-m-Y h:i A') }}" />
                @endif
            @endforeach

            <div class="p-4 w-full mb-4"></div>
        </div>

        {{-- send msg form --}}
        <div class="p-4 flex absolute space-x-1 bottom-0 w-full bg-[#152330]">
            <div class="w-full bg-slate-500/50 absolute space-x-5  hidden typing-main -top-6 left-0">
                <div class="h-[30px] w-[30px] p-0 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                        <rect fill="#FF156D" stroke="#FF156D" stroke-width="15" width="30" height="30" x="25"
                            y="85">
                            <animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
                                keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate>
                        </rect>
                        <rect fill="#FF156D" stroke="#FF156D" stroke-width="15" width="30" height="30" x="85"
                            y="85">
                            <animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
                                keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate>
                        </rect>
                        <rect fill="#FF156D" stroke="#FF156D" stroke-width="15" width="30" height="30" x="145"
                            y="85">
                            <animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
                                keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate>
                        </rect>
                    </svg>
                </div>
                <div class="text-sm flex items-center typing-text">

                </div>
            </div>
            <input type="text" class="bg-slate-500/90 w-[90%] rounded-md py-2 px-5 message-box"
                placeholder="Enter message..." name="" id="">
            <button class="py-2 rounded-md  bg-slate-500/90 px-5">
                <i class="fa-solid fa-paper-plane "></i>
            </button>
        </div>
    </div>
</div>
