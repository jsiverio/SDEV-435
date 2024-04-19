/*---------------------------------------------------------------------------------------------------------------------
File: passwordResetValidation.js
Written by: Jorge Siverio 2024
Description: Form Validation for password reset page
---------------------------------------------------------------------------------------------------------------------*/

const form = document.getElementById('passwordResetForm');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', (e) => {

    if(checkInputs()){
        e.preventDefault();
    }
});

isPasswordSecure();

function checkInputs() {
    // trim to remove the whitespaces
    let errorFlag = [];
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9_\W]).{8,}$/;
    
    if(!regex.test(passwordValue)){
        setErrorFor(password, 'Password does not meet requirements');
        errorFlag.push(true);
    }
    else{
        setSuccessFor(password);
        
    }
    if(!regex.test(password2Value)){
        setErrorFor(password2, 'Password does not meet requirements');
        errorFlag.push(true);
    }
    else{
        setSuccessFor(password2);
        
    }
    if(passwordValue != password2Value){
        setErrorFor(password2, 'Passwords do not match');
        errorFlag.push(true);
    }
    else{
        setSuccessFor(password2);
        
    }
    if(passwordValue === '') {
        setErrorFor(password, 'Password cannot be blank');
        errorFlag.push(true);
    } 
    else{
        setSuccessFor(password);
        
    }
    
    if(password2Value === '') {
        setErrorFor(password2, 'Password cannot be blank');
        errorFlag.push(true);
    }
    else{
        setSuccessFor(password2);
       
    }
    if (errorFlag.length > 0) {
        return true;
    }
    else{
        return false;
    }
}

function isPasswordSecure(){
    const passHelperLength = document.getElementById('passwordHelpLength'); 
    const passHelperLower = document.getElementById('passwordHelpLowercase');
    const passHelperUpper = document.getElementById('passwordHelpUppercase');
    const passHelperSpecial = document.getElementById('passwordHelpSpecial');
    const passHelperMatch = document.getElementById('passwordHelpMatch');
    let validFlag = false;

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
        },
        match: function() {
            if( password.value == password2.value ) {
                return true;
            }
        }   
    };
    
    password.addEventListener('keyup', function() {
        if( pattern.charLength() ) {
            passHelperLength.classList.add('passwordHelpValid');
            passHelperLength.classList.remove('passwordHelpInvalid');
            validFlag = true
        } else {
            passHelperLength.classList.add('passwordHelpInvalid');
            passHelperLength.classList.remove('passwordHelpValid');
            validFlag = false
        }

        if( pattern.lowercase() ) {
            passHelperLower.classList.add('passwordHelpValid');
            passHelperLower.classList.remove('passwordHelpInvalid');
            validFlag = true
        } else {
            passHelperLower.classList.add('passwordHelpInvalid');
            passHelperLower.classList.remove('passwordHelpValid');
            validFlag = false
        }

        if( pattern.uppercase() ) {
            passHelperUpper.classList.add('passwordHelpValid');
            passHelperUpper.classList.remove('passwordHelpInvalid');
            validFlag = true
        } else {
            passHelperUpper.classList.add('passwordHelpInvalid');
            passHelperUpper.classList.remove('passwordHelpValid');
            validFlag = false
        }
        if( pattern.special() ) {
            passHelperSpecial.classList.add('passwordHelpValid');
            passHelperSpecial.classList.remove('passwordHelpInvalid');
            validFlag = true
        } else {
            passHelperSpecial.classList.add('passwordHelpInvalid');
            passHelperSpecial.classList.remove('passwordHelpValid');
            validFlag = false
        }
        if( pattern.match() ) {
            passHelperMatch.classList.add('passwordHelpValid');
            passHelperMatch.classList.remove('passwordHelpInvalid');
            validFlag = true
        } else {
            passHelperMatch.classList.add('passwordHelpInvalid');
            passHelperMatch.classList.remove('passwordHelpValid');
            validFlag = false
        }
    });
    password2.addEventListener('keyup', function() {
        if( pattern.match() ) {
            passHelperMatch.classList.add('passwordHelpValid');
            passHelperMatch.classList.remove('passwordHelpInvalid');
            validFlag = true
        } else {
            passHelperMatch.classList.add('passwordHelpInvalid');
            passHelperMatch.classList.remove('passwordHelpValid');
            validFlag = false
        }
    });
return validFlag;
}    
function setErrorFor(input, message) {
    const formControl = input.parentElement; // .form-control
    const small = formControl.querySelector('small');

    // add error message inside small
    input.classList.add('is-invalid');
    small.classList.add('invalid-feedback');
    small.innerText = message;
    
}
function setSuccessFor(input) {
    input.classList.add('is-valid');
}