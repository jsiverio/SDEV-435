const form = document.getElementById('userEditForm');
const inputs = form.querySelectorAll('input');
const role = document.getElementById('role');
const submit = document.getElementById('submit');
const select = form.querySelectorAll('select');


function checkInputs() { 
    inputs.forEach(input => {
        if (input.id === 'submit') return;

        if (input.value === '' || input.value === null)  {
            setErrorFor(input, `Field cannot be blank`);
        }
        else {
            setSuccessFor(input);
        }
        if(input.id === 'phone'){
            if (input.value.length < 10) {
                setErrorFor(input, `10 digit phone number`);
            }
            else if(/[\d()-]{10,13}/.test(input.value)){
                input.value = input.value.replace(/[()-]/g, '');
                input.value = `(${input.value.slice(0,3)})${input.value.slice(3,6)}-${input.value.slice(6,10)}`;
                setSuccessFor(input);
            }
            if(!isPhone(input.value)){
                setErrorFor(input, `Invalid phone number`);
            }
            else {
                setSuccessFor(input);
            }
        }
        if(input.id === 'email'){
            if(!isEmail(input.value)){
                setErrorFor(input, `Not a valid email`);
            }
            else {
                setSuccessFor(input);
            }
        }
    })
    if (role.value === '0') { 
        setErrorFor(role, `Select a role`);
        console.log(role.value);
    }
    else {
        setSuccessFor(role);
    }
    if (form.querySelectorAll('.is-invalid').length > 0) {
        return false;
    }
    else {
        return true;
    }   

}

function setErrorFor(input, message) {
    const formControl = input.parentElement; 
    const small = formControl.querySelector('small');
    if(input.tagName === 'INPUT'){
    const inputBox = formControl.querySelector('input');
    inputBox.className = 'form-control is-invalid';
    }
    else if (input.tagName === 'SELECT') {
        const inputBox = formControl.querySelector('select');
        inputBox.className = 'form-control is-invalid';
    }


    // add error message inside small
    small.className = 'invalid-feedback';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    if (input.tagName === 'INPUT') {
    const inputBox = formControl.querySelector('input');
    inputBox.className = 'form-control is-valid';
    }
    else if (input.tagName === 'SELECT') {
        const inputBox = formControl.querySelector('select');
        inputBox.className = 'form-control is-valid';
    }
}

function isEmail(email) {
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
}
function isPhone(phone) {
    return /\(\d{3}\)\d{3}-\d{4}/.test(phone);
}
inputs.forEach(input => {
    input.addEventListener('change', () => {
        submit.removeAttribute("disabled");
    }
    )
});
select.forEach(input => {
    input.addEventListener('change', () => {
        submit.removeAttribute("disabled");
    }
    )
});








