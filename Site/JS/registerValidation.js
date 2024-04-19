/*---------------------------------------------------------------------------------------------------------------------
File: registerValidation.js
Written by: Jorge Siverio 2024
Description: Form Validation for register page
---------------------------------------------------------------------------------------------------------------------*/

const name = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const badge = document.getElementById('badge');
const agency = document.getElementById('agency');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('registerForm');

form.addEventListener('submit', (e) => {
    if(checkInputs()){
        e.preventDefault();
    }
});

function checkInputs() {
    // trim to remove the whitespaces
    let errorFlag = false
    const nameValue = name.value.trim();
    const lastnameValue = lastname.value.trim();
    const badgeValue = badge.value.trim();
    const agencyValue = agency.value.trim();
    const phoneValue = phone.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value
    form.classList.add('was-validated');

    if(nameValue === '') {
        setErrorFor(name, 'Name cannot be blank');
        errorFlag = true;
    } else if (/\d/.test(nameValue)) {
            setErrorFor(name, 'Name cannot contain numbers');
            errorFlag = true;
    } else {
        setSuccessFor(name);
        errorFlag = false;
    }

    if(lastnameValue === '') {
        setErrorFor(lastname, 'Last name cannot be blank');
        errorFlag = true;
    } else if (/\d/.test(lastnameValue)) {
        setErrorFor(lastname, 'Name cannot contain numbers');
        errorFlag = true;
    } else {
        setSuccessFor(lastname);
        errorFlag = false;
    }

    if(badgeValue === '') {
        setErrorFor(badge, 'Badge cannot be blank');
        errorFlag = true;
    } else {
        setSuccessFor(badge);
        errorFlag = false;
    }

    if(agencyValue === '') {
        setErrorFor(agency, 'Agency cannot be blank');
        errorFlag = true;
    } else {
        setSuccessFor(agency);
        errorFlag = false;
    }

    if(phoneValue === '') {
        setErrorFor(phone, 'Phone cannot be blank');
        errorFlag = true;
    } else {
        setSuccessFor(phone);
        errorFlag = false;
    }

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

    if (passwordValue === '') {
        setErrorFor(password, 'Password cannot be blank');
        errorFlag = true;
    }
    
    return errorFlag;
}
isPasswordSecure();

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
function isPasswordSecure(){
    const passHelperLength = document.getElementById('passwordHelpLenght'); 
    const passHelperLower = document.getElementById('passwordHelpLowercase');
    const passHelperUpper = document.getElementById('passwordHelpUppercase');
    const passHelperSpecial = document.getElementById('passwordHelpSpecial');

    var pattern = {
        charLength: function() {
            if( password.value.length >= 8 ) {
                return true;
            }
        },
        lowercase: function() {
            var regex = /^(?=.*[a-z]).+$/; // Lowercase character pattern

            if( regex.test(password.value) ) {
                return true;
            }
        },
        uppercase: function() {
            var regex = /^(?=.*[A-Z]).+$/; // Uppercase character pattern

            if( regex.test(password.value) ) {
                return true;
            }
        },
        special: function() {
            var regex = /^(?=.*[0-9_\W]).+$/; // Special character or number pattern

            if( regex.test(password.value) ) {
                return true;
            }
        }   
    };
    
    password.addEventListener('keyup', function() {
        if( pattern.charLength() ) {
            passHelperLength.classList.add('passwordHelpValid');
            passHelperLength.classList.remove('passwordHelpInvalid');
        } else {
            passHelperLength.classList.add('passwordHelpInvalid');
            passHelperLength.classList.remove('passwordHelpValid');
        }

        if( pattern.lowercase() ) {
            passHelperLower.classList.add('passwordHelpValid');
            passHelperLower.classList.remove('passwordHelpInvalid');
        } else {
            passHelperLower.classList.add('passwordHelpInvalid');
            passHelperLower.classList.remove('passwordHelpValid');
        }

        if( pattern.uppercase() ) {
            passHelperUpper.classList.add('passwordHelpValid');
            passHelperUpper.classList.remove('passwordHelpInvalid');
        } else {
            passHelperUpper.classList.add('passwordHelpInvalid');
            passHelperUpper.classList.remove('passwordHelpValid');
        }
        if( pattern.special() ) {
            passHelperSpecial.classList.add('passwordHelpValid');
            passHelperSpecial.classList.remove('passwordHelpInvalid');
        } else {
            passHelperSpecial.classList.add('passwordHelpInvalid');
            passHelperSpecial.classList.remove('passwordHelpValid');
        }
    
    
    
    });

}    
