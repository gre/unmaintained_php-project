<?php

class ClientModel extends AppModel {    
  static function register($data)
  {
    $codeClient = self::generateNewCodeClient($data['name'],$data['code_departement']);
    $adresse = $data['adresse'].', '.$data['code_departement'].', '.$data['postal_code'].' '.$data['city'];
    $result = self::query("INSERT INTO Client (code_client,nom_client,adresse_cl,raison_sociale,identclient,mpclient)
                 VALUES ($1,$2,$3,$4,$5,$6)",
                 array($codeClient,$data['name'],$adresse,$data['raison_sociale'],$data['login'],sha1($data['password'])));
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
    echo sha1($password)," == ",$row['mpclient'];
    return sha1($password) == $row['mpclient'];
  }
  
  static function getByLogin($login)
  {
    $result = self::query('SELECT * FROM Client WHERE identclient=$1',$login);
    if (pg_num_rows($result) == 0) return false;
    return pg_fetch_assoc($result);
  }
  
  static function getByCodeClient($codeClient)
  {
    $result = self::query('SELECT * FROM Client WHERE code_client=$1',$codeClient);
    if (pg_num_rows($result) == 0) return false;
    return pg_fetch_assoc($query);
  }
  
  static function getUsersForConfirmation()
  {
    $query = self::query('SELECT * FROM Client WHERE confirme IS NULL');
    return self::fetchAll($query);
  }
  
  static function getRefusedUsers()
  {
    $query = self::query('SELECT * FROM Client WHERE confirme = FALSE');
    return self::fetchAll($query);
  }

  /**
   * @param String $codeClient
   * @param Boolean $confirm
   **/
  static function setConfirm($codeClient,$confirm)
  {
    $user = self::getByCodeClient($codeClient);
    if (!$user) return false;
    return self::query('UPDATE Client SET confirme='.$confirm?'TRUE':'FALSE');
  }
}