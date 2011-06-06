<?php
$this->setLayoutVar('pageTitle', "S'inscrire");
$this->setLayoutVar('nav', array("/client/auth" => "Connexion client", "" => "S'inscrire"));
?>
<?php if (isset($error)): ?>
<div class="error">
Erreur, vérifier les données dans les champs.
</div>
<?php endif;?>

  <form action="/client/inscription" method="post">
    <p>
      <label for="identifiant">Identifiant</label>
      <input id="login" type="text" name="login" value="<?php e(@$name)?>"/>
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
      <label for="password">Code postale</label>
      <input id="postal_code" type="text" name="postal_code" value="<?php e(@$postal_code)?>" />
    </p>
    <p>
      <label for="password">Ville</label>
      <input id="city" type="text" name="city" value="<?php e(@$city)?>" />
    </p>
    <p>
      <label for="password">Code departement</label>
      <input id="code_departement" type="text" name="code_departement" value="<?php e(@$code_departement)?>" />
    </p>

    <p class="buttons">
      <button type="submit">S'inscrire</button>
    </p>
  </form>
