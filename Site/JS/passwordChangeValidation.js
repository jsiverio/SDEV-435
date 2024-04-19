/*---------------------------------------------------------------------------------------------------------------------
File: passwordChangeValidation.js
Written by: Jorge Siverio 2024
Description: Form Validation for password change page
---------------------------------------------------------------------------------------------------------------------*/

const form = document.getElementById('passwordChangeForm')
const oldPassword = document.getElementById('oldPassword')
const newPassword = document.getElementById('newPassword')
const confirmPassword = document.getElementById('confirmPassword')
const passwordHelper = document.getElementById('passwordHelper').children

form.addEventListener('submit', (e) => {
    if(!inputsAreValid()){
        e.preventDefault();
    }
    
});

//Focusout event listeners
oldPassword.addEventListener('focusout', () => {
    if(oldPassword.value === '' || oldPassword.value === null){
        setErrorFor(oldPassword, 'This field is required')
    }
    else{
        setSuccessFor(oldPassword);
    }
});
newPassword.addEventListener('focusout', () => {
    if(newPassword.value === '' || newPassword.value === null){
        setErrorFor(newPassword, 'This field is required')
    }
    else{
        setSuccessFor(newPassword);
    }
});
confirmPassword.addEventListener('focusout', () => {
    if(confirmPassword.value === '' || confirmPassword.value === null){
        setErrorFor(confirmPassword, 'This field is required')
    }
    else{
        setSuccessFor(confirmPassword);
    }
});

//Password Helper Events
newPassword.addEventListener('keyup', () => {
    if (newPassword.value.length < 8) {
        passwordHelper[0].style.color = 'red';
    }
    else{
        passwordHelper[0].style.color = 'green';
    }
    if (newPassword.value.match(/[a-z]/)) {
        passwordHelper[1].style.color = 'green';
    }
    else{
        passwordHelper[1].style.color = 'red';
    }
    if (newPassword.value.match(/[A-Z]/)) {
        passwordHelper[2].style.color = 'green';
    }
    else{
        passwordHelper[2].style.color = 'red';
    }
    if (newPassword.value.match(/[0-9\D]/)) {
        passwordHelper[3].style.color = 'green';
    }
    else{
        passwordHelper[3].style.color = 'red';
    }
    
});    
confirmPassword.addEventListener('keyup', () => {
    if (newPassword.value === confirmPassword.value) {
        passwordHelper[4].style.color = 'green';
    }
    else{
        passwordHelper[4].style.color = 'red';
    }
    
});

//Input check before submiting
function inputsAreValid() {
    let errorFlag = [];
    let oldPasswordValue = oldPassword.value.trim();
    let newPasswordValue = newPassword.value.trim();
    let confirmPasswordValue = confirmPassword.value.trim();
    
    if (oldPasswordValue === '' || oldPasswordValue === null){
        setErrorFor(oldPassword, 'This field is required');
        errorFlag.push(true);
    }
    if (newPasswordValue === '' || newPasswordValue === null){
        setErrorFor(newPassword, 'This field is required');
        errorFlag.push(true);
    }
    if (confirmPasswordValue === '' || confirmPasswordValue === null){
        setErrorFor(confirmPassword, 'This field is required');
        errorFlag.push(true);
    }
    for(let i = 0; i <= passwordHelper.length-1; i++){
        console.log(passwordHelper[i].style.color);
        if(passwordHelper[i].style.color === 'red'){
            errorFlag.push(true);
            break;
        }
        else{
            errorFlag.pop;
        }   
    }

    if (errorFlag.length == 0){
        return true;
    }
    else{
        return false;
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement; // .form-control
    const small = formControl.querySelector('small');

    // add error message inside small
    if(input.classList.contains('is-valid')){
        input.classList.remove('is-valid');
    }
    input.classList.add('is-invalid');
    small.classList.add('invalid-feedback');
    small.innerText = message;
    
}
function setSuccessFor(input) {
    if(input.classList.contains('is-invalid')){
        input.classList.remove('is-invalid');
    }
    input.classList.add('is-valid');
}