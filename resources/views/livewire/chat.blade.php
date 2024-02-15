<div class="roboto-medium bg-gradient-to-r relative from-black to-slate-900 flex overflow-hidden">

    <div class="w-[80px] overflow-auto h-screen user-options bg-slate-400/20 text-white "
        style="overflow: -webkit-scrollbar:none">
        <ul class="flex flex-col items-center   space-y-5  pt-5">
            <li class="row "><a href="{{ route('profile') }}" wire:navigate><i
                        class="fa-solid mx-2 fa-address-book p-3 bg-slate-700/80 rounded-2xl text-3xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i></a>
            </li>
            {{-- Rooms --}}
            @foreach ($rooms as $room)
                <li>
                    <div class=" px-4 py-2 text-transparent mx-2 bg-slate-700/80 rounded-2xl text-3xl hover:bg-green-500 cursor-pointer bg-cover"
                        style="background-image:url({{ asset($room->room_img) }})">
                        a</div>
                </li>
            @endforeach
            <li><a href="{{ route('create-room') }}" wire:navigate><i
                class="fa-solid fa-plus p-3 mx-2 bg-slate-700/80 rounded-2xl text-3xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i></a>
            <li><i
                    class="fa-solid fa-gear p-3 mx-2 bg-slate-700/80 rounded-2xl text-3xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i>
            </li>

            </li>
            <li><a href="{{ route('add-friend') }}" wire:navigate><i
                        class="fa-solid fa-user-plus py-4 p-3 mx-2 bg-slate-700/80 rounded-2xl text-2xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i></a>
            </li>
        </ul>
    </div>
    {{--
        --- listing all friends
    --}}
    <div class="h-screen bg-slate-500/20 w-[300px] user-drawer  overflow-scroll text-white">
        <div class="w-full bg-black/60 p-5 ">
            <input type="text" name="" id="" wire:model.live="search"
                class="w-full rounded-sm text-white py-1 px-2 bg-slate-500" placeholder="Search in friends list...">
        </div>
        <h1 class="p-3">Friends</h1>
        @foreach ($friends as $friend)
            <livewire:chat.user-list-row index="{{ $loop->index }}" :wire:key="$friend->uuid"
                uuid="{{ $friend->getFriendInstance()->first()->uuid }}" name="{{ $friend->user_name }}"
                roomId='{{ $friend->getFriendInstance()->first()->room_id }}' index="{{ $loop->index }}" />
        @endforeach
    </div>
    <div class="h-screen text-white flex items-center bg-slate-400/10">
        <button onclick="toggleDrawer()">
            <i class="fa fa-arrow-right p-2 rounded-full hover:bg-black "></i>
        </button>
    </div>
    @php
    // check if livewires update route is called or not
    // if called then assigning old route
        $roomId = null;
        $roomId = request()->query('id');
        $routeName = request()->route()->getName();
        if($routeName  === 'livewire.update'){
            $routeName = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
            $roomId = app('request')->create(URL::previous())->query('id');
        }
    @endphp
        @switch($routeName)
            @case('chat')
                {{-- main messages section --}}
                {{-- sending id if refresh occures --}}
                <livewire:chat.chat-message-part key="{{ now() }}" id="{{$roomId }}"/>
            @break

            @case('add-friend')
                <livewire:user.add-friend-form />
            @break

            @case('friend-requests')
                <livewire:user.friend-request-list />
            @break
            @case('profile')
                <livewire:user.profile />
            @break
            @case('create-room')
                <livewire:room.create-room-form />
            @break

            @default
            @break
        @endswitch


    {{--
       --- user information
       --- user toast
     --}}
    <div
        class="w-[400px] h-[400px] hidden rounded-lg fixed bg-gradient-to-r overflow-auto from-black to-slate-900 right-10 bottom-20 text-white">
        <div class="w-full py-2 px-1 flex justify-end"><i
                class="fa fa-times p-3 hover:bg-slate-400/30 m-2 rounded-full cursor-pointer"></i></div>
        <div class="w-[9em] h-[9em] rounded-full bg-cover bg-red-500 mx-auto"></div>
        <div class="w-full flex justify-center mt-2">
            <input type="text" name="" id=""
                class="bg-slate-500/30 text-center p-1 rounded-md cursor-text" value="Hp1" disabled>
        </div>
        <div class="w-full flex justify-center mt-2">
            <textarea name="" id="" cols="" rows=""
                class="bg-slate-500/30 text-center p-1 rounded-md text-sm w-[90%] h-[8em] resize-none cursor-text" disabled>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem tempore quod nam nihil pr lorem20 ovident dignissimos perferendis cupiditate dolor saepe?
        </textarea>
        </div>
        <div class="flex justify-around  my-3 space-x-2 mx-2">
            <button class="bg-red-500 py-2 rounded-md px-5 w-full "><i class="fa fa-user-xmark"></i></button>
            <button class="bg-yellow-500 py-2 rounded-md px-5 w-full"><i class="fa fa-volume-xmark"></i></button>

        </div>
    </div>

</div>
@push('script')
    <script>
        function toogleUserOptions() {
            let container = document.querySelector('.user-options')
            if (container.classList.contains('flex')) {
                container.classList.remove('flex');
                container.classList.add('hidden');
            } else {
                container.classList.remove('hidden');
                container.classList.add('flex');
            }
        }

        function closeOptions() {
            let container = document.querySelector('.user-options')
            container.classList.remove('flex');
            container.classList.add('hidden');
        }

        function toggleDrawer() {
            let userDrawer = document.querySelector('.user-drawer');
            let userOptions = document.querySelector('.user-options');

            if (userDrawer.classList.contains('animate-newSlideIn') && userOptions.classList.contains(
                    'animate-closeOptions')) {
                console.log('in');
                // opening
                userDrawer.classList.remove('w-[0px]');
                userDrawer.classList.add('w-[300px]');
                userDrawer.classList.remove('animate-newSlideIn');
                userDrawer.classList.add('animate-newSlideOut');

                userOptions.classList.remove('w-[0px]');
                userOptions.classList.add('w-[80px]');
                userOptions.classList.remove('animate-closeOptions');
                userOptions.classList.add('animate-openOptions');

            } else {
                console.log('out');
                // closing
                userDrawer.classList.remove('w-[300px]');
                userDrawer.classList.add('w-[0px]');
                userDrawer.classList.remove('animate-newSlideOut');
                userDrawer.classList.add('animate-newSlideIn');

                userOptions.classList.remove('w-[80px]');
                userOptions.classList.add('w-[0px]');
                userOptions.classList.remove('animate-openOptions');
                userOptions.classList.add('animate-closeOptions');
            }
        }
    </script>
@endpush
