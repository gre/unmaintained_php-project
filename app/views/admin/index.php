<?php
$this->setLayoutVar('pageTitle', 'Administration - Accueil');
$this->setLayoutVar('nav', array("" => "Administration"));
?>

<h1>Clients</h1>
<h2>Nouveaux clients en attente d'inscription</h2>

<?php if(count($unconfirmedUsers)==0) : ?>
<p class="noItems">Aucun</p> 
<?php else: ?>
<table>
  <thead>
    <tr>
      <th>Code</th>
      <th>Nom</th>
      <th>Adresse</th>
      <th>Raison sociale</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($unconfirmedUsers AS $user): ?>
    <tr>
      <td><?php e($user['code_client'])?></td>
      <td><?php e($user['nom_client'])?></td>
      <td><?php e($user['adresse_cl'])?></td>
      <td><?php e($user['raison_sociale'])?></td>
      <td><form method="POST" action="/admin/clientStatus">
        <input type="hidden" name="clientId" value="<?php e($user['code_client'])?>" />
        <button name="action" value="valid" type="submit">Valider</button> 
        <button name="action" value="refuse" type="submit">Refuser</button> 
      </form></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<h2>Les derniers clients confirmés ou refusés</h2>
<?php if(count($lastUsers)==0) : ?>
<p class="noItems">Aucun</p> 
<?php else: ?>
<table id="clients">
  <thead>
    <tr>
      <th>Code</th>
      <th>Nom</th>
      <th>Adresse</th>
      <th>Raison sociale</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($lastUsers AS $user): ?>
    <tr>
      <td><?php e($user['code_client'])?></td>
      <td><?php e($user['nom_client'])?></td>
      <td><?php e($user['adresse_cl'])?></td>
      <td><?php e($user['raison_sociale'])?></td>
      <td><?php if ($user['confirme']=='t'): ?>confirmé<?php else:?>refusé<?php endif;?>
      <a href="#" class="changeConfirmation">Changer</a>
      <div class="traitement">
		<form method="POST" action="/admin/clientStatus">
        <input type="hidden" name="clientId" value="<?php e($user['code_client'])?>" />
        <button name="action" value="valid" type="submit">Valider</button> 
        <button name="action" value="refuse" type="submit">Refuser</button>
        </form> 
      </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<script type="text/javascript">
$(function(){
	$('.changeConfirmation').click(function() {
		$(this).siblings('.traitement').show().addClass('traitementVisible');
		return false;
	});
	$(document).click(function(e) {
		if ($(e.target).parent('.traitementVisible').length == 0 && $(e.target).is('.traitementVisible') == false ) {
			$('.traitementVisible').removeClass('.traitementVisible').hide();
		}
	});
});
</script>
