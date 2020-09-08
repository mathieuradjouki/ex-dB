
<?php
session_start();
require('model.php');
echo "tête de page";
echo "<br>";
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordVerif'])) {
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordVerif'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerif = $_POST['passwordVerif'];
    $email = check($email);
    $password = check($password);
    $passwordVerif = check($passwordVerif);

    $checkEmail = checkEmail($email);
    $checkPassword = checkPassword($password, $passwordVerif);
    if($checkEmail == 1 && $checkPassword == 1){
      $result = insertUser($email, $password);
      if($result == 'ok'){
        header('Location:index.php');
        //echo 'ok';
      }else{
        $_SESSION['errors'] = "La requete n'a pas pu aboutir.";
        header('Location:subscribe.php');
        //echo 'pas bon';
      }
    }else{
      $errors = [$checkEmail, $checkPassword];
      $_SESSION['errors'] = $errors;
      header('Location:subscribe.php');
      // echo 'toujours pas bon';
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
    //if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password) && $password == $passwordVerif){
      return 1;
    // }else{
    //   return 'Mot de passe non valide';
    // }
  }

function check($input){
  trim($input);
  stripslashes($input);
  htmlspecialchars($input);
  return $input;
}
 ?>
