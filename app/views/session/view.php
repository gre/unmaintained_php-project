<?php
$this->setLayoutVar('pageTitle', 'Session '.$session['nom_c'].' : Gérer vos participants');
$this->setLayoutVar('nav', array("/client/index" => "Sessions", "" => $session['nom_c'].' : Gérer vos participants'));
$this->setLayoutVar('connected', true);

?>


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
      <td><?php e($session['nom_c'])?></td>
      <td><?php e($session['date_deb_ses'])?></td>
      <td><?php e($session['date_fin_ses'])?></td>
      <td><?php e($session['nb_max_part']-$session['nb_part_ins'])?> places</td>
    </tr>
  </tbody>
</table>

<h2>Vos participants</h2>

<?php if (empty($participants)): ?>
<p>Aucun de vos participants.</p>
<?php else: ?>

<form method="POST" action="/session/delete">
<input type="hidden" name="nom_c" value="<?php echo $session['nom_c']?>"/>
<input type="hidden" name="date_deb_ses" value="<?php echo $session['date_deb_ses']?>"/>

<table>
  <thead>
    <th>Nom du participant</th>
    <th>Date d'inscription</th>
    <th>Actions</th>
  </thead>
  <tbody>
  	<?php foreach($participants AS $participant): ?>
    <tr>
      <td><?php e($participant['nom_part']) ?></td>
      <td><?php e(date("Y-m-d H:i",strtotime($participant['date_inscrpt']))) ?></td>
      <td>
        <button type="button" disabled="disabled" >Modifier</button>
        <?php $delete_enabled = false;
        if ( (strtotime($session['date_deb_ses']) - time()) < 60*60*24* 10) $delete_enabled = true;?>
        <button <?php echo ($delete_enabled?'disabled="disabled"':'')?> type="submit" name="nom_part" value="<?php e($participant['nom_part']) ?>" onclick="return confirm('Annuler l\'inscription de <?php e($participant['nom_part']) ?> ?')">Supprimer</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</form>

<?php endif; ?>

<h2>Nouveau participant</h2>
<?php if ($session['nb_max_part'] >= $session['nb_part_ins']): ?>
<?php else: ?>
<p>Il n'y a plus de place pour cette session.</p>
<?php endif; ?>
<form method="POST" action="/session/askAddParticipants">
<input type="hidden" name="nom_c" value="<?php echo $session['nom_c']?>"/>
<input type="hidden" name="date_deb_ses" value="<?php echo $session['date_deb_ses']?>"/>
<div class="participants">
  <p class="participant">
    <label for="nom_part">Nom du participant</label>
    <input id="nom_part" type="text" name="nom_part[]" />
  </p>
</div>
  <p><a href="#" id="moreParticipant">Ajouter une autre participant</a></p>
  <p class="buttons">
    <button type="submit">Inscrire</button>
  </p>
</form>
<script type="text/javascript">
	$(function(){
		$('#moreParticipant').click(function() {
			var participant = $('.participant').clone().removeClass('participant');
			$('input[type="text"]', participant).val("");
			participant.appendTo('.participants');
		});
	})();
</script>