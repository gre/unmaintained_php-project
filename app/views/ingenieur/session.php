<?php
$name="CSS3";
$this->setLayoutVar('pageTitle', 'Détail de la session '.$name.' et participants');
$this->setLayoutVar('nav', array("/ingenieur/index" => "Sessions", "" => $name));
$this->setLayoutVar('connected', true);
?>
<h1>La session <?php echo $name; ?></h1>
<h2>Détail</h2>
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
      <td><a href="/ingenieur/session/2">CSS3</a></td>
      <td>03/07/2011</td>
      <td>06/07/2011</td>
      <td><a href="/ingenieur/session/2">18 / 50 places occupées</a></td>
    </tr>
  </tbody>
</table>

<h2>Liste des participants (18)</h2>
<table>
  <thead>
    <th>Client</th>
    <th>Nom du participant</th>
    <th>Date d'inscription</th>
  </thead>
  <tbody>
    <tr>
      <td>Microfrost</td>
      <td>Big Dates</td>
      <td>05/05/2011</td>
    </tr>
    <tr>
      <td>Microfrost</td>
      <td>Steven John</td>
      <td>05/05/2011</td>
    </tr>
    <tr>
      <td>Microfrost</td>
      <td>Jack Stones</td>
      <td>05/05/2011</td>
    </tr>
    <tr>
      <td>Microfrost</td>
      <td>John John</td>
      <td>05/05/2011</td>
    </tr>
    
    <tr>
      <td>Appeal</td>
      <td>Steve Works</td>
      <td>03/05/2011</td>
    </tr>
    <tr>
      <td>Appeal</td>
      <td>Toto titi</td>
      <td>08/05/2011</td>
    </tr>
    <tr>
      <td>Appeal</td>
      <td>Tata titi</td>
      <td>08/05/2011</td>
    </tr>
    <tr>
      <td>Appeal</td>
      <td>Toto tutu</td>
      <td>08/05/2011</td>
    </tr>
    <tr>
      <td>Appeal</td>
      <td>Tonton titi</td>
      <td>10/05/2011</td>
    </tr>
    <tr>
      <td colspan="3">etc...</td>
    </tr>
  </tbody>
</table>
