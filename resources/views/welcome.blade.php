<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Page Title' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .roboto-thin {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .roboto-thin-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: italic;
        }

        .roboto-light {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .roboto-light-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: italic;
        }

        .roboto-regular {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .roboto-regular-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: italic;
        }

        .roboto-medium {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .roboto-medium-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: italic;
        }

        .roboto-bold {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .roboto-bold-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: italic;
        }

        .roboto-black {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: normal;
        }

        .roboto-black-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: italic;
        }

        .sk-chase {
            width: 20px;
            height: 20px;
            position: relative;
            margin: auto;
            animation: sk-chase 2.5s infinite linear both;
        }

        .sk-chase-dot {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            animation: sk-chase-dot 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:before {
            content: '';
            display: block;
            width: 25%;
            height: 25%;
            background-color: #fff;
            border-radius: 100%;
            animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:nth-child(1) {
            animation-delay: -1.1s;
        }

        .sk-chase-dot:nth-child(2) {
            animation-delay: -1.0s;
        }

        .sk-chase-dot:nth-child(3) {
            animation-delay: -0.9s;
        }

        .sk-chase-dot:nth-child(4) {
            animation-delay: -0.8s;
        }

        .sk-chase-dot:nth-child(5) {
            animation-delay: -0.7s;
        }

        .sk-chase-dot:nth-child(6) {
            animation-delay: -0.6s;
        }

        .sk-chase-dot:nth-child(1):before {
            animation-delay: -1.1s;
        }

        .sk-chase-dot:nth-child(2):before {
            animation-delay: -1.0s;
        }

        .sk-chase-dot:nth-child(3):before {
            animation-delay: -0.9s;
        }

        .sk-chase-dot:nth-child(4):before {
            animation-delay: -0.8s;
        }

        .sk-chase-dot:nth-child(5):before {
            animation-delay: -0.7s;
        }

        .sk-chase-dot:nth-child(6):before {
            animation-delay: -0.6s;
        }

        @keyframes sk-chase {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sk-chase-dot {

            80%,
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sk-chase-dot-before {
            50% {
                transform: scale(0.4);
            }

            100%,
            0% {
                transform: scale(1.0);
            }
        }
    </style>
</head>

<body class="roboto-medium bg-gradient-to-r relative from-black to-slate-900 flex overflow-hidden">
    <div class="w-[80px] overflow-auto h-screen user-options bg-slate-400/20 text-white " style="overflow: -webkit-scrollbar:none">
        <ul class="flex flex-col items-center   space-y-5  pt-5">
            <li class="row "><i
                    class="fa-solid mx-2 fa-address-book p-3 bg-slate-700/80 rounded-2xl text-3xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i>
            </li>
            {{-- channels --}}
            <li>
                <div
                    class=" px-4 py-2 text-transparent mx-2 bg-slate-700/80 rounded-2xl text-3xl hover:bg-green-500 cursor-pointer bg-cover" style="background-image:url('https://images.unsplash.com/photo-1682686581740-2c5f76eb86d1?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">a</div>
            </li>
            <li><i
                    class="fa-solid fa-plus p-3 mx-2 bg-slate-700/80 rounded-2xl text-3xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i>
            </li>
            <li><i
                    class="fa-solid fa-gear p-3 mx-2 bg-slate-700/80 rounded-2xl text-3xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i>
            </li>
            <li><i
                    class="fa-solid fa-user-plus py-4 p-3 mx-2 bg-slate-700/80 rounded-2xl text-2xl text-green-500 hover:text-white hover:bg-green-500 cursor-pointer"></i>
            </li>
        </ul>
    </div>
    <div class="h-screen bg-slate-500/20 w-[300px] user-drawer  overflow-scroll text-white">
        <div class="w-full bg-black/60 p-5 ">
            <input type="text" name="" id=""
                class="w-full rounded-sm text-white py-1 px-2 bg-slate-500" placeholder="Search in friends list...">
        </div>
        <h1 class="p-3">Friends</h1>
        <div class="p-4 flex-col  space-y-3">
            <a href="#"
                class="w-full p-2 rounded-md relative flex space-x-2 overflow-hidden  bg-slate-600/20 hover:bg-slate-700/40 cursor-pointer items-center">
                <div class="p-4 bg-red-500 rounded-full relative ">
                    <div
                        class="w-[10px] h-[10px] bg-green-500 absolute -right-1 bottom-1 rounded-full online-indicator">
                    </div>
                </div>
                <div class="overflow-hidden w-full">
                    <span class=" whitespace-nowrap text-sm">hp</span>
                </div>
                {{-- when user is typing --}}
                <div class="absolute right-5">
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
    </div>
    <div class="h-screen text-white flex items-center bg-slate-400/10">
        <button onclick="toggleDrawer()">
            <i class="fa fa-arrow-right p-2 rounded-full hover:bg-black "></i>
        </button>
    </div>
    {{-- message part --}}
    <div class=" h-screen text-white flex flex-col bg-slate-400/20 w-full relative">
        <div class="w-full p-2 flex items-center bg-black/40">
            <div class="p-4 bg-red-500 rounded-full relative">
                <div class="w-[10px] h-[10px] bg-green-500 absolute -right-1 bottom-1 rounded-full online-indicator">
                </div>
            </div>
            <div class="p-4 text-sm ">hp1@1223</div>
        </div>
        <div class="h-full overflow-scroll ">
            <div class="w-full flex  py-3 px-2 items-centerspace-x-5 ">
                <div class="flex w-full flex-col space-y-2">
                    <span
                        class=" py-3 px-5 bg-slate-500/80 rounded-tr-lg rounded-br-lg ml-4 rounded-bl-lg self-start ">lorem50</span>
                    <span class="text-[10px] flex text-slate-400 ml-5 ">
                        <p>12-01-2021 12:43 PM</p>
                        <div class="">
                            <i class="mx-5 fa fa-list"></i>
                            <ul class=" absolute chat-options hidden ml-5 flex-col">
                                <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                                        class="mr-3 ml-1 fa fa-pencil"></i>Edit</li>
                                <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                                        class="mr-3 ml-1 fa-solid fa-share"></i>Replay</li>
                                <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                                        class="mr-3 ml-1 fa fa-user-xmark"></i>Remove</li>
                            </ul>
                        </div>
                    </span>
                </div>
            </div>
            <div class="w-full flex  py-3 px-2 items-centerspace-x-5">
                <div class="flex w-full flex-col space-y-2 mr-5">
                    <span
                        class=" py-3 px-5 bg-slate-500/80 rounded-tr-lg rounded-bl-lg ml-4 rounded-tl-lg self-end ">lorem50</span>
                    <span class="text-[10px] self-end flex text-slate-400 ml-5 ">
                        <div class="">
                            <i class="mx-5 fa fa-list"></i>
                            <ul class=" absolute chat-options hidden  mr-5 flex-col">
                                <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                                        class="mr-3 ml-1 fa fa-pencil"></i>Edit</li>
                                <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                                        class="mr-3 ml-1 fa-solid fa-share"></i>Replay</li>
                                <li class="py-3 bg-black px-5 flex items-center hover:bg-slate-700"><i
                                        class="mr-3 ml-1 fa fa-user-xmark"></i>Remove</li>
                            </ul>
                        </div>
                        <p>12-01-2021 12:43 PM</p>
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full px-5 p-2 bg-slate-500/30">
            <p class="">Hp1 is Typing...</p>
        </div>
        {{-- enter message part --}}
        <div class="flex items-center bg-black/50  p-5">
            <input type="text" name="" id="" class="w-full mx-5 py-1 px-4 bg-slate-500 rounded-sm"
                placeholder="Enter message...">
            <button class="bg-slate-500 rounded-sm py-1 px-4"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>
    {{-- user information --}}
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
    {{-- user toast --}}
    <script src="https://kit.fontawesome.com/e18904f022.js" crossorigin="anonymous"></script>
    {{-- @livewireScripts
    @livewireScriptConfig
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/websocket-communication.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    @stack('script')

</body>
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

</html>
