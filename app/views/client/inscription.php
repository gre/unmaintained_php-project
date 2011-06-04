<?php
$this->setLayoutVar('pageTitle', "S'inscrire");
$this->setLayoutVar('nav', array("/client/auth" => "Connexion client", "" => "S'inscrire"));
?>

<form action="/client/inscriptionSent">
  <p>
    <label for="nom_client">Votre nom</label>
    <input id="nom_client" type="text" />
  </p>
  <p>
    <label for="raison_sociale">Votre raison sociale</label>
    <input type="text" id="raison_sociale" />
  </p>
  <p>
    <label for="address">Votre adresse</label>
    <input type="text" id="address" />
  </p>
  <p>
    <label for="dep">Votre numéro de département</label>
    <input type="number" id="dep" />
  </p>
  <p>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" />
  </p>
  <p>
    <label for="password">Retapez votre mot de passe</label>
    <input type="password" name="password" />
  </p>
  <p class="buttons">
    <button type="submit">S'inscrire</button>
  </p>
</form>
