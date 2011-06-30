<?php
$name=$session['nom_c'];
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
      <td><?php e($session['nom_c'])?></td>
      <td><?php e($session['date_deb_ses'])?></td>
      <td><?php e($session['date_fin_ses'])?></td>
      <td><?php e($session['nb_part_ins'].' / '.$session['nb_max_part'])?> places occupées</td>
    </tr>
  </tbody>
</table>

<h2>Liste des participants (<?php echo count($participants)?>)</h2>
<table>
  <thead>
    <th>Client</th>
    <th>Nom du participant</th>
    <th>Date d'inscription</th>
  </thead>
  <tbody>
  <?php foreach($participants AS $participant): ?>
    <tr>
      <td><?php e($participant['nom_client'])?></td>
      <td><?php e($participant['nom_part'])?></td>
      <td><?php e(date("Y-m-d H:i",strtotime($participant['date_inscrpt']))) ?></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
