import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


let pw = document.getElementById('password')
let pwConfirm = document.getElementById('password-confirm')
let submitBtn = document.getElementById('submit-registration')
let registerForm = document.getElementById('register-form')
let pwError = document.getElementById('pw-error')

console.log(pw, pwConfirm, submitBtn, registerForm, pwError)

registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    if(pw.value === pwConfirm.value) {
        pwError.classList.add('d-none');
        registerForm.submit()

    }else {
        pwError.classList.remove('d-none');
    }
})