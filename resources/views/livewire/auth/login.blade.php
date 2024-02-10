<div class="w-full h-screen flex justify-center items-center bg-gray-50">
    <form class="w-[400px] h-[500px] flex flex-col space-y-10 shadow-lg shadow-gray-500" wire:submit="login">
        <h1 class="text-2xl text-center p-3 mt-5"  >Welcome Back...!</h1>
        <div class="flex flex-col space-y-7">
            <div class=" flex justify-center w-[90%] mx-auto ">
                <i class="fa-solid fa-envelope p-2 text-2xl bg-slate-500 text-white"></i>
                <input type="text" name="" id="" class="px-3 border w-full py-1" placeholder="Email">
            </div>
            <div class=" flex justify-center relative w-[90%] mx-auto">
                <i class="fa-solid fa-lock p-2 text-2xl bg-slate-500 text-white"></i>
                <x-form.user-text-input type="password" name="" id="password"  placeholder="Password"/>
                <button onclick="showPassword(event)" class="fa-solid fa-eye p-3 absolute end-0 eye-button" id=""></button>
            </div>
            <div class=" flex justify-between w-[90%] mx-auto">
                <div>
                    <input type="checkbox" name="" id="" class=" mx-2 " placeholder="Password ">
                    <label for="">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-blue-500 active:text-purple-600">Forgot Password?</a>
                </div>
            </div>
        </div>
        <div class="w-[90%] mx-auto" wire:loading.remove>
            <button class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 py-2 text-white w-full rounded-md" >Sign in</button>
        </div>
        <div class="w-[90%] mx-auto" wire:loading>
            <x-form.spinner-button/>
        </div>
        <div>
            {{-- spacer --}}
        </div>
        <div class="text-center mx-atuo">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 active:text-purple-600" wire:navigate>Sing up</a>!
        </div>
    </form>
</div>
