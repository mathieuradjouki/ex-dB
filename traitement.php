
<?php
session_start();
require('model.php');

if (isset($_GET['email']) && isset($_GET['password']) && isset($_GET['passwordVerif'])) {
  if (!empty($_GET['email']) && !empty($_GET['password']) && !empty($_GET['passwordVerif'])){

    $email = $_GET['email'];
    $password = $_GET['password'];
    $passwordVerif = $_GET['passwordVerif'];
    $email = check($email);
    $password = check($password);
    $passwordVerif = check($passwordVerif);

    $checkEmail = checkEmail($email);
    $checkPassword = checkPassword($password, $passwordVerif);
    if($checkEmail == 1 && $checkPassword == 1){
      $result = insertUser($email, $password);
      if($result == 'ok'){
        header('Location:index.php');
      }else{
        $_SESSION['errors'] = "La requete n'a pas pu aboutir.";
        header('Location:subscribe.php');
      }
    }else{
      $errors = [$checkEmail, $checkPassword];
      $_SESSION['errors'] = $errors;
      header('Location:subscribe.php');
    }
  }
}


// Fonction verification de l'email
function checkEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email)<50){
    return 1;
  }else{
    return 'Email non valide';
  }
}

// Fonction verification du mot de passe et de la confirmation du mot de passe
function checkPassword($password, $passwordVerif){
  if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password) && $password == $passwordVerif){
      return 1;
    }else{
      return 'Mot de passe non valide';
    }
  }

function check($input){
  trim($input);
  stripslashes($input);
  htmlspecialchars($input);
  return $input;
}
 ?>
