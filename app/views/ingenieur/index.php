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
    <?php foreach($sessions_futur AS $session): ?>
    <tr>
      <?php $url = "/ingenieur/session?nom_c={$session['nom_c']}&date_deb_ses={$session['date_deb_ses']}";?>
      <td><a href="<?php echo $url ?>"><?php e($session['nom_c'])?></a></td>
      <td><?php e($session['date_deb_ses'])?></td>
      <td><?php e($session['date_fin_ses'])?></td>
      <td><a href="<?php echo $url ?>"><?php e($session['nb_part_ins'] .' / ' . $session['nb_max_part'])?> places occupées</a></td>
    </tr>
    <?php endforeach; ?>
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
    <?php foreach($sessions_passed AS $session): ?>
    <tr>
      <?php $url = "/ingenieur/session?nom_c={$session['nom_c']}&date_deb_ses={$session['date_deb_ses']}";?>
      <td><a href="<?php echo $url ?>"><?php e($session['nom_c'])?></a></td>
      <td><?php e($session['date_deb_ses'])?></td>
      <td><?php e($session['date_fin_ses'])?></td>
      <td><a href="<?php echo $url ?>"><?php e($session['nb_part_ins'] .' / ' . $session['nb_max_part'])?> places occupées</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

