<?php
$this->setLayoutVar('pageTitle', 'Session '.$session['nom_c'].' : Nouveaux participants');
$this->setLayoutVar('nav', array("/client/index" => "Sessions", "/session/view?nom_c={$session['nom_c']}&date_deb_ses={$session['date_deb_ses']}" => $session['nom_c'].' : Nouveau participants'));
$this->setLayoutVar('connected', true);
?>

<h2>Confirmer l'inscription des nouveaux participants</h2>
<?php if (count($participants)): ?>
<form method="POST" action="/session/addParticipants">
<input type="hidden" name="nom_c" value="<?php echo $session['nom_c']?>"/>
<input type="hidden" name="date_deb_ses" value="<?php echo $session['date_deb_ses']?>"/>

<ul>
<?php foreach($participants AS $participant): ?>
  <li>
  <input type="hidden" name="participant[]" value="<?php e($participant)?>"/>
  <?php e($participant)?>
  </li>
<?php endforeach; ?>
</ul>

<h2>Les coûts</h2>
<div class="costs">
<dl>
  <dt>Prix HT</dt>
  <dd><?php echo $cours['prix_c_ht'] * count($participants); ?> </dd>
</dl>
<dl>
  <dt>Prix TTC</dt>
  <dd><?php echo $cours['prix_c_ttc'] * count($participants); ?> </dd>
</dl>
</div>

  <p class="buttons">
    <button type="submit" class="big">Confirmer</button>
  </p>
<?php else: ?>
<p class="noItems">aucun participant</p>
<?php endif; ?>
