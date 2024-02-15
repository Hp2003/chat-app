<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330] grid overflow-auto text-white">
        <form action="" class="w" wire:submit="update">
            <div class="w-full p-5 flex justify-center   items-center">
                {{-- Profile Image --}}

                <div class="w-[12em] h-[12em] relative   rounded-full bg-cover"
                    style="background-image: url('{{ $photo ? $photo->temporaryUrl() : asset($oldImg) }}')">
                    <input type="file" name="" id="" wire:model="photo"
                        class="absolute h-full cursor-pointer w-full rounded-full"></div>
            </div>
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            {{-- User information --}}
            <div class="w-full grid justify-items-center space-y-5">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white"
                    placeholder="Full Name."  value="{{ $name }}" name="" wire:model="name" id="">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white"
                    placeholder="User Name." value="{{ $userName }}" name="" wire:model="userName" id="">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white"
                    placeholder="Email." value="{{ $email }}" @disabled(true) name=""
                    id="">
                <textarea name="" id="" cols="30" rows="10"
                    class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white" wire:model="description">{{ $description }}</textarea>
                <div class="w-[40%] mx-auto" wire:loading.remove wire:target="update">
                    <button
                        class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 py-2 text-white w-full rounded-md">Update</button>
                </div>
                <div class="w-[40%] mx-auto" wire:loading wire:target="update">
                    <x-form.spinner-button />
                </div>
            </div>
        </form>

        {{-- delete profile --}}
        <div class="w-full grid justify-items-center ">
            <div class="w-[40%] mx-auto" wire:loading.remove>
                <button
                    class="bg-red-500 hover:bg-red-600 mt-5 active:bg-red-700 py-2 text-white w-full rounded-md">Delete
                    Account</button>
            </div>
            <div class="w-[40%] mx-auto mt-5" wire:loading.remove>
                <button
                    class="border text-red-500 border-red-500 hover:bg-red-600  active:bg-red-700 py-2 hover:text-white w-full rounded-md"
                    onclick="window.location.href='/logout'">Logout</button>
            </div>
        </div>

    </div>
</div>
