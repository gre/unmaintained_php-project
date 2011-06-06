<?php
$this->setLayoutVar('pageTitle', 'Administration - Accueil');
$this->setLayoutVar('nav', array("" => "Administration"));
?>

<h1>Clients</h1>
<h2>Nouveaux clients en attente d'inscription</h2>
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
      <td><form type="POST" action="/admin/clientStatus">
        <input type="hidden" name="clientId" value="<?php e($user['code_client'])?>" />
        <button name="action" value="valid" type="submit">Valider</button> 
        <button name="action" value="refuse" type="submit">Refuser</button> 
      </form></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2>Les derniers refusés</h2>
<table>
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
    <?php foreach($refusedUsers AS $user): ?>
    <tr>
      <td><?php e($user['code_client'])?></td>
      <td><?php e($user['nom_client'])?></td>
      <td><?php e($user['adresse_cl'])?></td>
      <td><?php e($user['raison_sociale'])?></td>
      <td>Refusé
      <a href="#">Changer</a>
      <div class="traitement">
        <button name="action" value="valid" type="submit">Valider</button> 
        <button name="action" value="refuse" type="submit">Refuser</button> 
      </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<todo>Une pagination ici</todo>
