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
@script
    <script>
        $wire.on('join-channel', (event) => {
            console.log(event);
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
            channel.listenForWhisper('typing', (e) => {
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
    </script>
@endscript
