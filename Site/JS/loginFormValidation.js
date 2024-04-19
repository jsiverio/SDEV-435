/*---------------------------------------------------------------------------------------------------------------------
File: loginFormValidation.js
Written by: Jorge Siverio 2024
Description: Form Validation for login page
---------------------------------------------------------------------------------------------------------------------*/

const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('loginForm');

form.addEventListener('submit', (e) => {
    if(checkInputs()){
        e.preventDefault();
    }
});

function checkInputs() {
    // trim to remove the whitespaces
    let errorFlag = false
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    form.classList.add('was-validated');

    if(emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
        errorFlag = true;
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
        errorFlag = true;
    } else {
        setSuccessFor(email);
        errorFlag = false;
    }

    if(passwordValue === '') {
        setErrorFor(password, 'Password cannot be blank');
        errorFlag = true;
    } else {
        setSuccessFor(password);
        errorFlag = false;
    }
    return errorFlag;
}

function setErrorFor(input, message) {
    const formControl = input.parentElement; // .form-control
    const small = formControl.querySelector('small');

    // add error message inside small
    small.classList.add('invalid-feedback');
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement; // .form-control
    //formControl.className = 'form-control success';   
}   

function isEmail(email) {
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
}