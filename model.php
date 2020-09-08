<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";

  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage());
  }
// créer la table dans bdd si elle n'a pas déjà été créée
  $query= "CREATE TABLE IF NOT EXISTS `user` (
     `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
     `mail` VARCHAR(50) NOT NULL ,
     `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
  )";

  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();

  function insertUser($email, $password){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    try{
      $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
      die('erreur:' . $e->getMessage());
    }

    $query = "SELECT `mail` FROM `user`";
    $request = $dB->prepare($query);
    $request->execute();
    if ($datas = $request->fetch()) {
       if($datas['mail'] == $email){
     return 'Votre email existe déjà, veuillez vous connecter.';
    }else {
    $query = "INSERT INTO `user`(`mail`,`password`) VALUES (:mail, :password)";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $arrayValue = [
      ':mail'=>$email,
      ':password'=>$password
    ];
    $request = $dB->prepare($query);
      if($request->execute($arrayValue)){
        return 'ok';
      }else{
        return 'pas ok';
      }
      $request->closeCursor();
     }
  }
 }

 ?>
