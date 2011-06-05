<?php
$this->setLayoutVar('pageTitle', 'Client - Accueil');
$this->setLayoutVar('nav', array("/client/index" => "Sessions"));
$this->setLayoutVar('connected', true);
?>

<h1>Les sessions</h1>
<h2>Sessions disponibles à venir</h2>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Places restantes</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/client/session/2">CSS3</a></td>
      <td>03/07/2011</td>
      <td>06/07/2011</td>
      <td>32 places</td>
      <td>
        Vous avez inscrit 3 participants.<br/>
        <a href="/client/session/2">Gérer mes participants</a>
      </td>
    </tr>
    <tr>
      <td><a href="/client/session/1">HTML5</a></td>
      <td>23/07/2011</td>
      <td>26/07/2011</td>
      <td>45 places</td>
      <td>
        <a href="/client/session/1">Inscrire des participants</a>
      </td>
    </tr>
  </tbody>
</table>

<h2>Vos dernières sessions</h2>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Nombre d'inscrits</th>
      <th>Vos participants</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/client/session/3">WebGL</a></td>
      <td>23/05/2011</td>
      <td>24/05/2011</td>
      <td>46 places</td>
      <td>
        5 participants ont assisté à cette session. 
        <a href="/client/session/3">Détail</a>
      </td>
    </tr>
  </tbody>
</table>

<todo>Une pagination ici</todo>
