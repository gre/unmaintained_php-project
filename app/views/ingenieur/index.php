<?php
$this->setLayoutVar('pageTitle', 'Ingénieur - Accueil');
$this->setLayoutVar('connected', true);
$this->setLayoutVar('nav', array("/ingenieur/index" => "Sessions"));

?>

<h1>Les sessions</h1>

<h2>Sessions en cours ou à venir</h2>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Places occupées</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/ingenieur/session/4">jQuery</a></td>
      <td>30/06/2011</td>
      <td>02/07/2011</td>
      <td><a href="/ingenieur/session/4">50 / 50 places occupées</a></td>
    </tr>
    <tr>
      <td><a href="/ingenieur/session/2">CSS3</a></td>
      <td>03/07/2011</td>
      <td>06/07/2011</td>
      <td><a href="/ingenieur/session/2">18 / 50 places occupées</a></td>
    </tr>
    <tr>
      <td><a href="/ingenieur/session/1">HTML5</a></td>
      <td>23/07/2011</td>
      <td>26/07/2011</td>
      <td><a href="/ingenieur/session/1">55 / 100 places occupées</a></td>
    </tr>
  </tbody>
</table>

<h2>Sessions passées</h2>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Nombre de participants</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="/ingenieur/session/3">WebGL</a></td>
      <td>23/05/2011</td>
      <td>24/05/2011</td>
      <td>
        50 participants sur 65 places.
        <a href="/ingenieur/session/3">Détail</a>
      </td>
    </tr>
  </tbody>
</table>

<todo>Une pagination ici</todo>
