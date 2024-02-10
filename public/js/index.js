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
