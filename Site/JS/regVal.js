const form = document.getElementById('registerForm');
const inputs = form.querySelectorAll('.form-control');
let phoneNumberRegex = /^\d{10}$/;
let passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;

form.addEventListener('submit', (e) => {
    checkInputs();
    //e.preventDefault();
    
    });
inputs[0].addEventListener('focusout', () => {
    if(inputs[0].value === ''|| inputs[0].value === null){
        setErrorFor(inputs[0], `Field cannot be blank`);
    }
    else{
        setSuccessFor(inputs[0]);
    }   
});
inputs[1].addEventListener('focusout', () => {
    if(inputs[1].value === ''|| inputs[1].value === null){
        setErrorFor(inputs[1], `Field cannot be blank`);
    }
    else{
        setSuccessFor(inputs[1]);
    }   
}); 
inputs[2].addEventListener('focusout', () => { 
    if(inputs[2].value === ''|| inputs[2].value === null){
        setErrorFor(inputs[2], `Field cannot be blank`);
    }
    else{
        setSuccessFor(inputs[2]);
    }   
}); 
inputs[3].addEventListener('focusout', () => {
    if(inputs[3].value === ''|| inputs[3].value === null){
        setErrorFor(inputs[3], `Field cannot be blank`);
    }
    else if(!phoneNumberRegex.test(inputs[3].value)){
        setErrorFor(inputs[3], `10 digit phone number`);
    }
    else{
        setSuccessFor(inputs[3]);
    }
});
inputs[4].addEventListener('focusout', () => {
    if(inputs[4].value === ''|| inputs[4].value === null){
        setErrorFor(inputs[4], `Field cannot be blank`);
    }
    else if(!isEmail(inputs[4].value)){
        setErrorFor(inputs[4], `Not a valid email`);
    }
    else{
        setSuccessFor(inputs[4]);
    }
});
inputs[5].addEventListener('change', () => {
    if(inputs[5].value === ''|| inputs[5].value === null){
        setErrorFor(inputs[5], `Field cannot be blank`);
    }
    else if(!passwordRegex.test(inputs[5].value)){
        setErrorFor(inputs[5], `Password does not meet requirements`);
    }
    else{
        setSuccessFor(inputs[5]);
    }
});





function checkInputs() {
    let phoneNumberRegex = /^\d{10}$/;
    
    inputs.forEach(input => {
        if (input.value === '' || input.value === null) {
            setErrorFor(input, `Field cannot be blank`);
        }
        if(input.id === 'phone'){
            if(!phoneNumberRegex.test(input.value)){
                setErrorFor(input, `10 digit phone number`);
            }
        }
        if(input.id === 'email'){
            if(!isEmail(input.value)){
                setErrorFor(input, `Not a valid email`);
            }
        }
        
        
    });

}

function setErrorFor(input, message) {
    const formControl = input.parentElement; 
    const small = formControl.querySelector('small');
    const inputBox = formControl.querySelector('input');
    inputBox.className = 'form-control is-invalid';

    // add error message inside small
    small.className = 'invalid-feedback';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    const inputBox = formControl.querySelector('input');
    inputBox.className = 'form-control is-valid';
}
function isEmail(email) {
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
}