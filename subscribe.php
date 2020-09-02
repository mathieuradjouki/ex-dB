<?php include('header.php'); ?>

<div class="container">
<form class="subscribe-form">
  <div class="mb-3">
    <label for="email" class="form-label">Votre email</label>
    <input type="email" class="form-control" id="email" required>
    <!-- <div id="email" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Votre mot de passe</label>
    <input type="password" class="form-control" id="password" required>
  </div>
  <div class="mb-3">
    <label for="password-verif" class="form-label">Confirmez votre mot de passe</label>
    <input type="password" class="form-control" id="password-verif" required>
  </div>
  <button type="submit" class="btn btn-primary" disabled id="submit">Submit</button>
</form>
</div>
<?php include('footer.php'); ?>
