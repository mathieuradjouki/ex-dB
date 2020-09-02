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

  $query= "CREATE TABLE IF NOT EXISTS `user` (
     `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
     `mail` VARCHAR(50) NOT NULL ,
     `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
  )";

  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();
 ?>
