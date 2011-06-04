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

<p>
(TODO: formulaire d'inscription de personnes)
</p>

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

<p>
(TODO: liste des personnes inscrites et gestion + formulaire d'inscription de personnes)
</p>

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

<p>
(TODO: liste des personnes inscrites)
</p>

<?php } ?>
