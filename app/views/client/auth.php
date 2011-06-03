<?php
$this->setLayoutVar('pageTitle', 'Client - Authentification');
?>

<div class="half">
  <h2>S'authentifier</h2>
  <form action="/client">
    <p>
      <label for="identifiant">Identifiant</label>
      <input id="identifiant" type="text" name="login" />
    </p>
    <p>
      <label for="password">Mot de passe</label>
      <input id="password" type="password" name="password" />
    </p>
    <p class="buttons">
      <button type="submit">Se connecter</button>
    </p>
  </form>
</div>
<div class="half">
  <h2>Pas encore inscrit ?</h2>
  <a href="/client/inscription">S'inscrire</a>
</div>
