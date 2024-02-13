// function cehckOnlineFriends() {

//     const roomIds = document.querySelectorAll('.user-room-id');
//     roomIds.forEach((element, index)=>{
//         const channel = window.Echo.join('friends-private-rooom.' + element.value);

//         channel.here((data) => {

//             let indicators = document.querySelectorAll('.online-indicator')[index];
//             if (data.length > 1) {
//                 // document.querySelectorAll('.online-indicator')[index].classList.remove('hidden');
//                 indicators.classList.remove('hidden');
//             }

//         }).joining((data) => {
//             let indicators = document.querySelectorAll('.online-indicator')[index];
//             indicators.classList.remove('hidden');
//             // document.querySelectorAll('.online-indicator')[index].classList.remove('hidden');
//         }).leaving((data) => {
//             // document.querySelectorAll('.online-indicator')[index].classList.add('hidden');
//         })
//     })
// }
// window.addEventListener('load', () => {
//     cehckOnlineFriends();
// });
