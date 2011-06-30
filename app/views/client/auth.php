<?php
$this->setLayoutVar('pageTitle', 'Client - Authentification');
$this->setLayoutVar('nav', array("/client/auth" => "Connexion client"));
?>

<div class="half">
  <h2>S'authentifier</h2>
  <form class="auth" action="/client/auth" method="post">
    <fieldset>
      <legend>Authentification</legend>
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
    </fieldset>
  </form>
</div>
<div class="half">
  <h2>Pas encore inscrit ?</h2>
    <p class="center">  
        <a class="register" href="/client/inscription">S'inscrire</a>
    </p>
</div>
