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
            @foreach ($chats as $chat )
                @if (!$chat['user_id'] === auth()->user()->id)
                    <x-chat.friend-message message="{{ $chat['message'] }}" time="{{ Carbon\Carbon::parse($chat['created_at'])->format('d-m-y h:i sa') }}" />
                @else
                    <x-chat.my-message message="{{ $chat['message'] }}" time="{{  Carbon\Carbon::parse($chat['created_at'])->format('d-m-Y h:i A')   }}" />
                @endif
            @endforeach
            <div class="p-4 w-full mb-4"></div>
        </div>

        {{-- send msg form --}}
        <div class="p-4 flex absolute space-x-1 bottom-0 w-full bg-[#152330]">
            <input type="text" class="bg-slate-500/90 w-[90%] rounded-md py-2 px-5" placeholder="Enter message..."
                name="" id="">
            <button class="py-2 rounded-md  bg-slate-500/90 px-5">
                <i class="fa-solid fa-paper-plane "></i>
            </button>
        </div>
    </div>
</div>
