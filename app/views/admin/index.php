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
    <tr>
      <td>TOT771</td>
      <td>Toto TOTO</td>
      <td>34 rue boucher, 77000 Melun</td>
      <td>Toto</td>
      <td><form>
        <input type="hidden" name="clientId" value="0" />
        <button name="action" value="valid" type="submit">Valider</button> 
        <button name="action" value="refuse" type="submit">Refuser</button> 
      </form></td>
    </tr>
  </tbody>
</table>

<h2>Les derniers inscrits</h2>
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
    <tr>
      <td>TAT771</td>
      <td>Tata TATA</td>
      <td>32 rue boucher, 77000 Melun</td>
      <td>Tata</td>
      <td>Validé
      <a href="#">Changer</a></td>
    </tr>
    <tr>
      <td>TIT771</td>
      <td>Titi TITI</td>
      <td>31 rue boucher, 77000 Melun</td>
      <td>Titi</td>
      <td>Refusé
      <a href="#">Changer</a></td>
    </tr>
  </tbody>
</table>

<todo>Une pagination ici</todo>
