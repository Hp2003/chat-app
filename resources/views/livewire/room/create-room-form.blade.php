<div class="w-full h-screen  flex justify-center items-center">
    <div class="w-full md:w-[95%] h-[700px] bg-[#152330] grid overflow-auto text-white">
        <form action="" class="w" wire:submit="create">
            <div class="w-full p-5 flex justify-center items-center">
                {{-- Room Image --}}
                <div class="w-[12em] h-[12em] relative bg-violet-800 rounded-full bg-cover"
                    style="background-image: url('{{ $photo ? $photo->temporaryUrl() : '' }}')">
                    <input type="file" name="" id="" wire:model="photo"
                        class="absolute h-full cursor-pointer w-full rounded-full"></div>
            </div>
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            {{-- Room information --}}
            <div class="w-full grid justify-items-center space-y-5">
                <input type="text" class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white"
                    placeholder="Room name."  name="" wire:model="roomName" id="">
                <textarea name="" id="" cols="30" rows="5"
                    class="bg-slate-500 md:w-[40%] rounded-md px-3 py-1 text-white" wire:model="description"></textarea>
                <div class="w-[40%] mx-auto" wire:loading.remove wire:target="create">
                    <button
                        class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 py-2 text-white w-full rounded-md">Create</button>
                </div>
                <div class="w-[40%] mx-auto" wire:loading wire:target="create">
                    <x-form.spinner-button />
                </div>
            </div>
        </form>
        <div class="w-[95%] mx-auto rounded-lg m-5 bg-slate-600/40 shadow-md">
            <h1 class="p-3 text-center text-2xl">Select friends to add in room</h1>
            <div class="w-[95%] mx-auto my-3 rounded-md flex items-center space-x-5 p-4 bg-slate-800/40 hover:bg-slate-900/50">
                <input type="text" class="bg-slate-500 md:w-full rounded-md px-3 py-1 text-white"
                    placeholder="Friend name."  name="" wire:model.live="search" id="">
            </div>
            @foreach ($friends as $friend)
                <button class="w-[95%] mx-auto my-3 rounded-md flex items-center justify-between cursor-pointer p-3 bg-slate-800/40 hover:bg-slate-900/50" wire:click="selectFriend('{{ $friend->uuid }}')">
                    <div class="flex items-center  space-x-5">
                        <div class="p-5 bg-red-500 rounded-full"></div>
                        <div>{{ $friend->user_name }}</div>
                    </div>
                    <div   class="p-5 border-2 {{ in_array($friend->uuid, $selectedFriends) ? 'bg-green-500 rounded-full' : 'border-green-500 rounded-full'}} "></div>
                </button>
            @endforeach
        </div>
    </div>
</div>
