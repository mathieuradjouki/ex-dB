var email = document.getElementById('email');
var password = document.getElementById('password');
var passwordVerif = document.getElementById('password-verif');
var submit = document.getElementById('submit');

passwordVerif.addEventListener('input', function(){
    // verifie les valeurs entré dans les input password et passwordVerif
  if (password.value == passwordVerif.value) {
    // change attribut du submit
    submit.removeAttribute('disabled');
  }
});
