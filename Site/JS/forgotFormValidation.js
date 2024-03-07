const form = document.getElementById('forgotForm');
const email = document.getElementById('email');

form.addEventListener('submit', (e) => {
  if (checkInputs()){
    e.preventDefault();
  }
  
}); 

function checkInputs() {
    let errorFlag = false
    const emailValue = email.value.trim();
    form.classList.add('was-validated');

  if(emailValue === '') {
    setErrorFor(email, 'Email cannot be blank');
    errorFlag = true;
  } else if (!isEmail(emailValue)) {
    setErrorFor(email, 'Not a valid email');
    errorFlag = true;
  } else {
    errorFlag = false;
  }
  return errorFlag;
}

function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  small.classList.add('invalid-feedback');
  small.innerText = message;
  
}


function isEmail(email) {
  return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
}

