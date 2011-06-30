<?php

class ClientModel extends AppModel {
  static function register($data)
  {
  	$code_departement = substr($data['postal_code'],0,2);
    $codeClient = self::generateNewCodeClient($data['name'],$code_departement);
    $adresse = $data['adresse'].', '.$data['postal_code'].' '.$data['city'];
    $result = self::query("INSERT INTO Client (code_client,nom_client,adresse_cl,raison_sociale,identclient,mpclient)
                 VALUES ($1,$2,$3,$4,$5,$6)",
                 array($codeClient,$data['name'],$adresse,$data['raison_sociale'],$data['login'],sha1($data['password'])));
    if (!$result) return $result;
    return $codeClient;
  }
  static function generateNewCodeClient($name,$code_departement,$duplicate=0) 
  {
    // Check if already present
    $code_client = substr($name,0,3).substr($code_departement,0,3).$duplicate;
    $result = self::query('SELECT * FROM Client WHERE code_client=$1',$code_client);
    if (pg_num_rows($result) == 0) {
      return $code_client;
    }
    return self::generateNewCodeClient($name,$code_departement,$duplicate+1);
  }
  
  static function login($login,$password)
  {
    $row = self::getByLogin($login);
    if ($row == false) return false;
    return sha1($password) == $row['mpclient'];
  }
  
  static function getByLogin($login)
  {
    return self::fetchFirst(self::query('SELECT * FROM Client WHERE identclient=$1',$login));
  }
  
  static function getById($codeClient)
  {
    return self::fetchFirst(self::query('SELECT * FROM Client WHERE code_client=$1',$codeClient));
  }
  
  static function getFullName($user_id) {
    $user = self::getById($user_id);
    return $user["nom_client"];
  }
  
  static function getUsersForConfirmation()
  {
    $query = self::query('SELECT * FROM Client WHERE confirme IS NULL');
    return self::fetchAll($query);
  }
  
  static function getLastUsers()
  {
    $query = self::query('SELECT * FROM Client WHERE confirme IS NOT NULL LIMIT 20');
    return self::fetchAll($query);
  }

  /**
   * @param String $codeClient
   * @param Boolean $confirm
   **/
  static function setConfirm($codeClient,$confirm)
  {
    $user = self::getById($codeClient);
    if (!$user) return false;
    $confirm = ($confirm?'TRUE':'FALSE');
    
    return self::query('UPDATE Client SET confirme=$1 WHERE code_client=$2',array($confirm,$codeClient));
  }
  
  static function isConfirmed($login) {
  	$user = self::getByLogin($login);
  	if (!$user) return false;
  	return $user['confirme'] == 't';
  }
}