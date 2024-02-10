
<div class="w-full h-screen flex justify-center items-center bg-gray-50">
    <form class="w-[400px] h-[650px] flex flex-col space-y-10 shadow-lg shadow-gray-500" wire:submit="signUp">
        <h1 class="text-2xl text-center p-3 mt-5"  >Welcome!</h1>
        {{-- full name --}}
        <div class="flex flex-col space-y-7">
            <div class="flex-col justify-center w-[90%] mx-auto ">
                <div class=" flex justify-center mx-auto ">
                    <i class="fa-solid fa-user p-2 text-2xl bg-slate-500 text-white"></i>
                    <input type="text" name="" id="Full Name" class="px-3 border w-full py-1" wire:model="name" placeholder="Full Name">
                </div>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            {{-- user name --}}
            <div class="flex-col justify-center w-[90%] mx-auto ">
                <div class=" flex justify-center mx-auto ">
                    <i class="fa-solid fa-user p-2 text-2xl bg-slate-500 text-white"></i>
                    <input type="text" name="" id="userNmae" class="px-3 border w-full py-1" wire:model="userNmae" placeholder="User Name">
                </div>
                @error('userName')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            {{-- email --}}
            <div class="flex-col justify-center w-[90%] mx-auto ">
                <div class=" flex justify-center mx-auto ">
                    <i class="fa-solid fa-user p-2 text-2xl bg-slate-500 text-white"></i>
                    <input type="eamil" name="" id="email" class="px-3 border w-full py-1" wire:model="email" placeholder="Email">
                </div>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            {{-- password --}}
            <div class="flex-col justify-center w-[90%] mx-auto ">
                <div class=" flex justify-center relative  mx-auto">
                    <i class="fa-solid fa-lock p-2 text-2xl bg-slate-500 text-white"></i>
                    <x-form.user-text-input type="password" name="" id="password" wire:model="password" placeholder="Password"/>
                </div>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            {{-- confirm password --}}
            <div class="flex-col justify-center w-[90%] mx-auto ">
                <div class=" flex justify-center relative mx-auto">
                    <i class="fa-solid fa-lock p-2 text-2xl bg-slate-500 text-white"></i>
                    <x-form.user-text-input type="password" name="" id="" wire:model="password_confirmation" placeholder="Re-enter Password"/>
                </div>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="w-[90%] mx-auto" wire:loading.remove wire:target="signUp">
            <button class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 py-2 text-white w-full rounded-md" >Sign up</button>
        </div>
        <div class="w-[90%] mx-auto" wire:loading wire:target="signUp">
            <x-form.spinner-button/>
        </div>
        <div>
            {{-- spacer --}}
        </div>
        <div class="text-center mx-atuo">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-500 active:text-purple-600" wire:navigate>Sing in</a>!
        </div>
    </form>
</div>
