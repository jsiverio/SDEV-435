const masterEvidenceBlock = document.getElementById('evidenceBlock1');
const evidenceDiv = document.getElementById('evidence');
const authority = document.getElementById('authority');
const swNumber = document.getElementById('swNumber');
const form = document.getElementById('newCaseForm');

let evidenceCounter = 1;
authority.addEventListener('change', function(){
    if(authority.value === '1'){
        swNumber.disabled = false;
    }else{
        swNumber.disabled = true;
    }
});

// Validation Functions
form.addEventListener('submit', function(e){
    if(!checkInputs()){
        e.preventDefault();
    }
});

function checkInputs() {
    const inputs = form.querySelectorAll('input');
    const select = form.querySelectorAll('select');
    const textarea = document.getElementById('narrative');
    let valid = true;
    inputs.forEach(input => {
        if(input.id === 'submit') return;
        if(input.value === '' || input.value === null){
            setErrorFor(input, `Field cannot be blank`);
            valid = false;
        }
        else {
            setSuccessFor(input);
        }
    });
    select.forEach(input => {
        if(input.value === '0'){
            setErrorFor(input, `Select an option`);
            valid = false;
        }
        else {
            setSuccessFor(input);
        }
    });
        if(textarea.value === '' || textarea.value === null){
            setErrorFor(textarea, `Field cannot be blank`);
            valid = false;
        }
        else {
            setSuccessFor(textarea);
        }

    if(valid){
        return true;
    }
    else {
        return false;
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
    else if (input.tagName === 'TEXTAREA') {
        const inputBox = formControl.querySelector('textarea');
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
    else if (input.tagName === 'TEXTAREA') {
        const inputBox = formControl.querySelector('textarea');
        inputBox.className = 'form-control is-valid';
    }
}

// Dynamic Evidence Block Functions
function addEvidenceBlock(){
    evidenceCounter++;
    const newEvidenceBlock = new CaseBlock(masterEvidenceBlock, evidenceCounter);
    evidenceDiv.appendChild(newEvidenceBlock.newBlock());
}
function removeEvidenceBlock(element){
    if(evidenceCounter > 1){
        const evidenceBlockToBeRemoved = element.parentNode.parentNode.parentNode;
        evidenceBlockToBeRemoved.remove();
        evidenceCounter--;
    }
}
function clearInputs(element){
    const inputs = element.parentNode.parentNode.querySelectorAll('input');
    inputs.forEach(input => input.value = '');
}



