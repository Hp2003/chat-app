<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330] grid text-white">
        <form action="" class="w">
            <div class="w-full p-5 flex justify-center items-center">
                {{-- Profile Image --}}
                <div class="w-[12em] h-[12em] bg-red-500 rounded-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1682686580186-b55d2a91053c?q=80&w=1975&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')"></div>
            </div>
            {{-- User information --}}
            <div class="w-full grid justify-items-center space-y-5">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white" placeholder="Full Name." value="Hiren Panchal"
                name="" id="">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white" placeholder="User Name." value="Hp"
                name="" id="">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white" placeholder="Email." value="Hello@example.com" @disabled(true)
                name="" id="">
                <div class="w-[40%] mx-auto" wire:loading.remove>
                    <button class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 py-2 text-white w-full rounded-md" >Update</button>
                </div>
            </div>
        </form>

        {{-- delete profile --}}
        <div class="w-full grid justify-items-center ">
            <div class="w-[40%] mx-auto" wire:loading.remove>
                <button class="bg-red-500 hover:bg-red-600 my-5 active:bg-red-700 py-2 text-white w-full rounded-md" >Delete Account</button>
            </div>
        </div>

    </div>
</div>
