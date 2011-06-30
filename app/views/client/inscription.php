<?php
$this->setLayoutVar('pageTitle', "S'inscrire");
$this->setLayoutVar('nav', array("/client/auth" => "Connexion client", "" => "S'inscrire"));
?>

  <form class="inscription" action="/client/inscription" method="post">
    <fieldset>
      <legend>Inscription</legend>
    <p>
      <label for="identifiant">Identifiant</label>
      <input id="login" type="text" name="login" value="<?php e(@$login)?>"/>
    </p>
    <p>
      <label for="password">Mot de passe</label>
      <input id="password" type="password" name="password" value="<?php e(@$password)?>" />
    </p>
    <p>
      <label for="password">Nom</label>
      <input id="name" type="text" name="name" value="<?php e(@$name)?>" />
    </p>
    <p>
      <label for="password">Raison sociale</label>
      <input id="raison_sociale" type="text" name="raison_sociale" value="<?php e(@$raison_sociale)?>" />
    </p>
    <p>
      <label for="password">Adresse</label>
      <input id="adresse" type="text" name="adresse" value="<?php e(@$adresse)?>" />
    </p>
    <p>
      <label for="password">Code postal</label>
      <input id="postal_code" type="text" name="postal_code" value="<?php e(@$postal_code)?>" />
    </p>
    <p>
      <label for="password">Ville</label>
      <input id="city" type="text" name="city" value="<?php e(@$city)?>" />
    </p>

    <p class="buttons">
      <button type="submit">S'inscrire</button>
    </p>
    </fieldset>
  </form>

    <p class="info"><em>Tous les champs sont requis</em></p>
