<?php
$this->setLayoutVar('pageTitle', 'Sessions');
$this->setLayoutVar('nav', array("/session/index" => "Sessions"));
?>

<h1>Les sessions</h1>

<h2>Prochaines sessions</h2>

<?php if(count($sessions)==0) : ?>

<p class="noItems">Aucune</p>

<?php else : ?>

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
    <?php foreach($sessions AS $session): ?>
    <tr>
      <td><a href="/session/view?nom_c=<?php echo urlencode($session['nom_c'])?>&date_deb_ses=<?php echo urlencode($session['date_deb_ses'])?>"><?php e($session['nom_c'])?></a></td>
      <td><?php e($session['date_deb_ses'])?></td>
      <td><?php e($session['date_fin_ses'])?></td>
      <td><?php e($session['nb_max_part']-$session['nb_part_ins'])?> places</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php endif; ?>
