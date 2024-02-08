function showPassword(){
    let container = document.querySelector('#password');
    let button = document.querySelector('.eye-button');

    if(button.classList.contains('fa-eye')){
        button.classList.remove('fa-eye')
        button.classList.add('fa-eye-slash')
        container.type = "text";

    }else{
        button.classList.remove('fa-eye-slash')
        button.classList.add('fa-eye')
        container.type = "password";
    }
}
