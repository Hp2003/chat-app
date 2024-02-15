{{-- new --}}

<div class="p-4 flex-col  space-y-3">
    <input type="hidden" name="" value="{{ $roomId }}" class="user-room-id">
    <a href="{{ route('chat', ['id' => $uuid]) }}" wire:navigate
        class="w-full p-2 rounded-md relative flex space-x-2 overflow-hidden  bg-slate-600/20 hover:bg-slate-700/40 cursor-pointer items-center">
        <div class="p-4 bg-red-500 rounded-full relative ">
            @if ($isOnline)
                <div class="w-[10px] h-[10px]  bg-green-500 absolute -right-1 bottom-1 rounded-full online-indicator">
                </div>
            @endif
        </div>
        <div class="overflow-hidden w-full">
            <span class=" whitespace-nowrap text-sm">{{ $name }} </span>
        </div>
        {{-- when user is typing --}}
        <div class="absolute right-5 typing-text-container hidden">
            <div class="col-3">
                <div class="snippet" data-title="dot-typing">
                    <div class="stage">
                        <div class="dot-typing"></div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

@script
    <script>
        $wire.on('user-online', (e) => {
            const channel = window.Echo.join('friends-private-rooom.' + e[0]);
            channel.listenForWhisper('typing', (event) => {
                document.querySelectorAll('.typing-text-container')[e[1]].classList.remove('hidden');
            })
            channel.listenForWhisper('stopped-typing', (event) => {
                document.querySelectorAll('.typing-text-container')[e[1]].classList.add('hidden');
            })
        })
    </script>
@endscript
