<?php include('header.php'); ?>

<div class="container">
<form class="connexion-form" action="traitement.php" id="connexion-form">
  <div class="mb-3">
    <label for="email" class="form-label">Entrez votre email</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">saisissez votre mot de passe</label>
    <input type="password" class="form-control" id="password">
  </div>
  <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>
<a href="index.php"><button type="button" class="btn btn-outline-primary" name="button">Retour à l'accueil</button></a>
</div>


<?php include('footer.php'); ?>
