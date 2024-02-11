

function showPassword(e){
    e.preventDefault();

    let input = document.querySelector('#password');
    let button = document.querySelector('.eye-button');
    console.log(input)
    if(button.classList.contains('fa-eye')){
        button.classList.remove('fa-eye')
        button.classList.add('fa-eye-slash')
        input.type = "text";

    }else{
        button.classList.remove('fa-eye-slash')
        button.classList.add('fa-eye')
        input.type = "password";
    }
}


function toggleUserList(e){
    e.preventDefault();

    let listContainer = document.querySelector('#userList');

    if(listContainer.classList.contains('animate-slideIn')){
        listContainer.classList.add('animate-slideOut');
        listContainer.style.width = '0%';
        listContainer.classList.remove('animate-slideIn');
    }else{
        listContainer.classList.remove('animate-slideOut');
        listContainer.classList.add('animate-slideIn');
    }
}

function showSendRequest(index){
    let container =  document.querySelectorAll('.send-request-option')[index];
    let button =  document.querySelectorAll('.send-btn')[index];

    container.classList.remove('hidden');
    container.classList.add('flex');

    button.classList.add('hidden');

}

function removeSendRequest(index){
    let container =  document.querySelectorAll('.send-request-option')[index];
    let button =  document.querySelectorAll('.send-btn')[index];

    container.classList.remove('flex');
    container.classList.add('hidden');

    button.classList.remove('hidden');
}
