<div class=" h-screen text-white flex flex-col bg-slate-400/20 w-full relative">
    <div class="w-full p-2 flex items-center bg-black/40">
        <div class="p-4 bg-red-500 rounded-full relative">
            @if ($isOnline)
                <div class="w-[10px] h-[10px] bg-green-500 absolute  -right-1 bottom-1 rounded-full online-indicator"
                    id="online-user-message-part">
                </div>
            @endif
        </div>
        <div class="p-4 text-sm ">{{ !empty($selectedUser['user_name']) ? $selectedUser['user_name'] : '' }}</div>
    </div>
    {{--
        ---displaying messages
    --}}
    <div class="h-full overflow-auto message-main" >
        @foreach ($chats as $chat)
            @if ($chat['user_id'] !== auth()->user()->id)
                <x-chat.friend-message message="{{ $chat['message'] }}"
                    time="{{ Carbon\Carbon::parse($chat['created_at'])->format('d-m-y h:i a') }}" />
            @else
                <x-chat.my-message message="{{ $chat['message'] }}" id="{{ $chat['uuid'] }}"
                    time="{{ Carbon\Carbon::parse($chat['created_at'])->format('d-m-Y h:i a') }}" />
            @endif
        @endforeach
    </div>
    <div class="w-full px-5 p-2 bg-slate-500/30 typing-main hidden">
        <p class="typing-text"></p>
    </div>
    {{--
        --- message input
    --}}
    @if ($editMessage === false)
        <form wire:submit="sendMessage()" class="flex items-center bg-black/50  p-5">
            <input type="text" name="" id=""
                class="w-full mx-5 py-1 px-4 bg-slate-500 rounded-sm message-box" value="{{ $message }}"
                wire:model="message" placeholder="Enter message...">
            <button class="bg-slate-500 rounded-sm py-1 px-4"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
    @else
    <form wire:submit="sendMessage()" class="flex items-center bg-black/50  p-5">
        <input type="text" name="" id=""
        class="w-full mx-5 py-1 px-4 bg-slate-500 rounded-sm message-box" value="{{ $message }}"
        wire:model="message" placeholder="Enter message...">
        <button class="bg-slate-500 rounded-sm py-1 px-4"><i class="fa-solid fa-paper-plane"></i></button>
    </form>
    @endif
</div>
@script
    <script>
        let count = 1;
        document.querySelector('.message-main').scrollTop = document.querySelector('.message-main').scrollHeight;
        $wire.on('join-channel', (event) => {
            const channel = window.Echo.join('friends-private-rooom.' + event[0])
            let textInput = document.querySelector('.message-box')
            textInput.addEventListener('input', (e) => {
                if (e.target.value.length === 0) {
                    channel.whisper('stopped-typing', {
                        name: event[1],
                    });
                } else {
                    channel.whisper('typing', {
                        name: event[1],
                    });
                }
            })
            channel.listen('MessageSentEvent', (e) => {
                console.log('message');
            })

            channel.listenForWhisper('typing', (e) => {
                console.log('tying');
                document.querySelector('.typing-main').classList.remove('hidden');
                document.querySelector('.typing-main').classList.add('flex');
                document.querySelector('.typing-text').innerText = e.name + ' Is typing...';
            })
            channel.listenForWhisper('stopped-typing', (e) => {
                console.log('stopped');
                document.querySelector('.typing-main').classList.remove('flex');
                document.querySelector('.typing-main').classList.add('hidden');
                document.querySelector('.typing-text').innerText = '';
            })
        })

        const container = document.querySelector('.message-main');
        container.addEventListener('scroll', ()=>{
            if (container.scrollTop === 0) {
                loadingMore = false;
                let value = $wire.dispatch('load-more-messages', { offset : count });
                console.log(value)
                count ++;
            }
        })
    </script>
@endscript
