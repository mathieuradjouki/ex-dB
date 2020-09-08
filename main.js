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

var connexion = document.getElementById('connexion-form');
  connexion.addEventListener('submit', function(){
      if (password.value != '' && email.value != '') {
      return true;
    }else{
      if (password.value = ''){
        alert('mot de passe requis');
      }
      if (email.value = ''){
      alert('email valide requis');
    }
    return false;
  }
});

  var subscribe = document.getElementById('subscribe-form');
    connexion.addEventListener('submit', function(){
        if (password.value != '' && email.value != '' && passwordVerif.valut != '') {
        return true;
      }else{
        if (password.value = ''){
          alert('mot de passe requis');
        }
        if (passwordVerif.value = ''){
          alert('confirmez votre mot de passe requis');
      }
        if (email.value = ''){
        alert('email valide requis');
      }
      return false;
    }
  });
