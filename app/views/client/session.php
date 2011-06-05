<?php
$name="";
if($sessionId==1) {
  $name="HTML5";
 }
if($sessionId==2) {
  $name="CSS3";
 }
if($sessionId==3) {
  $name="WebGL";
 }
$this->setLayoutVar('pageTitle', 'Session '.$name.' : Gérer vos participants');
$this->setLayoutVar('nav', array("/client/index" => "Sessions", "" => $name.' : Gérer vos participants'));
$this->setLayoutVar('connected', true);
?>

<?php if($sessionId==1) { ?>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Places restantes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/client/session/1">HTML5</a></td>
      <td>23/07/2011</td>
      <td>26/07/2011</td>
      <td>45 places</td>
    </tr>
  </tbody>
</table>

<h2>Vos participants</h2>
<p>Aucun de vos participants.</p>

<h2>Nouveau participant</h2>
<form>
  <p>
    <label for="nom_part">Nom du participant</label>
    <input id="nom_part" type="text" />
  </p>
  
  <p class="buttons">
    <button type="submit">Inscrire ce participant</button>
  </p>
</form>

<?php } else if($sessionId==2) {  ?>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Places restantes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/client/session/2">CSS3</a></td>
      <td>03/07/2011</td>
      <td>06/07/2011</td>
      <td>32 places</td>
    </tr>
  </tbody>
</table>

<h2>Vos participants</h2>

<table>
  <thead>
    <th>Nom du participant</th>
    <th>Date d'inscription</th>
    <th>Actions</th>
  </thead>
  <tbody>
    <tr>
      <td>Big Dates</td>
      <td>05/05/2011</td>
      <td>
        <button>Modifier</button>
        <button onclick="confirm('Annuler l\'inscription de Big Dates ?')">Supprimer</button>
      </td>
    </tr>
    <tr>
      <td>Steven John</td>
      <td>05/05/2011</td>
      <td>
        <button>Modifier</button>
        <button onclick="confirm('Annuler l\'inscription de  Steven John ?')">Supprimer</button>
      </td>
    </tr>
    <tr>
      <td>Jack Stones</td>
      <td>05/05/2011</td>
      <td>
        <button>Modifier</button>
        <button onclick="confirm('Annuler l\'inscription de  Jack Stones ?')">Supprimer</button>
      </td>
    </tr>
    <tr>
      <td>John John</td>
      <td>05/05/2011</td>
      <td>
        <button>Modifier</button>
        <button onclick="confirm('Annuler l\'inscription de  John John ?')">Supprimer</button>
      </td>
    </tr>
  </tbody>
</table>

<h2>Nouveau participant</h2>
<form>
  <p>
    <label for="nom_part">Nom du participant</label>
    <input id="nom_part" type="text" />
  </p>
  
  <p class="buttons">
    <button type="submit">Inscrire ce participant</button>
  </p>
</form>

<?php } else {  ?>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Nombre d'inscrits</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/client/session/3">WebGL</a></td>
      <td>23/05/2011</td>
      <td>24/05/2011</td>
      <td>46 places</td>
    </tr>
  </tbody>
</table>

<h2>Vos participants</h2>

<table>
  <thead>
    <th>Nom du participant</th>
    <th>Date d'inscription</th>
  </thead>
  <tbody>
    <tr>
      <td>Big Dates</td>
      <td>05/05/2011</td>
    </tr>
    <tr>
      <td>Steven John</td>
      <td>05/05/2011</td>
    </tr>
    <tr>
      <td>Jack Stones</td>
      <td>05/05/2011</td>
    </tr>
    <tr>
      <td>John John</td>
      <td>05/05/2011</td>
    </tr>
  </tbody>
</table>

<?php } ?>
