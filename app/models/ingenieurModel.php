<?php

class IngenieurModel extends AppModel {    
  static function getById($id)
  {
    return self::fetchFirst(self::query('SELECT * FROM Ingenieur WHERE no_employe=$1',$id));
  }
  
  static function login($login,$password)
  {
    $row = self::getByLogin($login);
    if ($row == false) return false;
    return sha1($password) == $row['mping'];
  }
  
  static function getByLogin($login)
  {
    return self::fetchFirst(self::query('SELECT * FROM Ingenieur WHERE login=$1',$login));
  }
  
  static function getFullName($id) {
    $user = self::getById($id);
    return $user["nom_ing"];
  }
}