import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
// import Clipboard from '@ryangjchandler/alpine-clipboard'

// console.log(Livewire);
// Alpine.plugin(Clipboard)

Livewire.start()

const socket = new WebSocket(`ws://${window.location.hostname}:6001/send-message?appKey=${import.meta.env.VITE_PUSHER_APP_KEY}&secret_token=salfaj`);

socket.onopen = ()=>{
    console.log('onopen')

    socket.send(JSON.stringify({
        id : 1,
        name : 'hp',
    }));
}
