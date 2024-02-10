<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330] flex  text-white">
        <div class="users border w-1/3 h-full overflow-x-hidden overflo-auto" id="userList">
            <div class="flex justify-between bg-[#162838] ">
                <div class="w-full p-5 flex items-center space-x-5">
                    <a wire:navigate href="{{ route('profile') }}" class="p-5 rounded-full bg-red-500"></a>
                    <h4 class="whitespace-nowrap">Main user</h4>
                </div>
                {{-- <a href=""><i class="fa-solid fa-gear p-5 text-lg mt-2"></i></a> --}}
            </div>
            <div class="p-4 flex justify-between ">
                <input type="text" class="bg-slate-500 w-[90%] rounded-md px-3 py-1" placeholder="search..."
                    name="" id="">
                <i class="fa-solid fa-filter p-3"></i>
            </div>
            <div class=" flex justify-between space-x-1 p-2 border-b border-slate-500   bg-[#25445e] ">
                <div class="flex items-center space-x-5">
                    <div class="p-5 rounded-full bg-red-500"></div>
                    <h4 class="whitespace-nowrap">Person 1</h4>
                </div>
                <div class="flex flex-nowrap">
                    <i class="fa-solid fa-thumbtack py-4 px-2"></i>
                    <span class=" relative  group">
                        <i class="fa-solid fa-bars py-4 px-2"></i>
                        {{-- menu --}}
                        <div class="absolute right-2 group-hover:block  hidden  ">
                            <ul class="bg-white/30 rounded-sm w-[8em] left-0">
                                <li class="py-3 px-4 text-green-400 hover:bg-black/20"><i class="fa-solid fa-user mx-2"></i> Profile</li>
                                <li class="py-3 px-4 text-yellow-400 hover:bg-black/20"><i class="fa-solid mx-2 fa-volume-xmark"></i>Mute</li>
                                <li class="py-3 px-4 text-red-400 hover:bg-black/20"> <i class="fa-solid fa-trash mx-2"></i> Remove</li>
                            </ul>
                        </div>
                    </span>
                </div>
            </div>
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
                    <div class="flex justify-start">
                        <div
                            class="bg-blue-400/90 inline-block py-5 px-4 rounded-tl-md rounded-tr-md rounded-br-md  m-5">
                            {{-- <p class="text-sm text-blue-800">user name</p> --}}
                            <p class="text-lg">Hello</p>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <p
                            class="py-5 px-4 bg-blue-600 inline-block m-5 rounded-tl-md rounded-tr-md rounded-bl-md  text-lg">
                            Hello</p>
                    </div>
                    <div class="flex justify-end">
                        <p
                            class="py-5 px-4 bg-blue-600 inline-block m-5 rounded-tl-md rounded-tr-md rounded-bl-md  text-lg">
                            Hello</p>
                    </div>
                    <div class="flex justify-end">
                        <p
                            class="py-5 px-4 bg-blue-600 inline-block m-5 rounded-tl-md rounded-tr-md rounded-bl-md  text-lg">
                            Hello</p>
                    </div>
                    <div class="flex justify-start">
                        <div
                            class="bg-blue-400/90 inline-block py-5 px-4 rounded-tl-md rounded-tr-md rounded-br-md  m-5">
                            {{-- <p class="text-sm text-blue-800">user name</p> --}}
                            <p class="text-lg">Hello</p>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div
                            class="bg-blue-400/90 inline-block py-5 px-4 rounded-tl-md rounded-tr-md rounded-br-md  m-5">
                            {{-- <p class="text-sm text-blue-800">user name</p> --}}
                            <p class="text-lg">Hello</p>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div
                            class="bg-blue-400/90 inline-block py-5 px-4 rounded-tl-md rounded-tr-md rounded-br-md  m-5">
                            {{-- <p class="text-sm text-blue-800">user name</p> --}}
                            <p class="text-lg">Hello</p>
                        </div>
                    </div>
                    <div class="p-4 w-full mb-4"></div>
                </div>

                {{-- send msg form --}}
                <div class="p-4 flex absolute space-x-1 bottom-0 w-full bg-[#152330]">
                    <input type="text" class="bg-slate-500/90 w-[90%] rounded-md py-2 px-5"
                        placeholder="enter message..." name="" id="">
                    <button class="py-2 rounded-md  bg-slate-500/90 px-5">
                        <i class="fa-solid fa-paper-plane "></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
