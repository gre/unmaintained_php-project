<?php

class AdminModel extends AppModel {    
  static function getById($id)
  {
    return self::fetchFirst(self::query('SELECT * FROM Admin WHERE no_admin=$1',$id));
  }
  
  static function login($login,$password)
  {
    $row = self::getByLogin($login);
    if ($row == false) return false;
    return sha1($password) == $row['MPadmin'];
  }
  
  static function getByLogin($login)
  {
    return self::fetchFirst(self::query('SELECT * FROM Admin WHERE login=$1',$login));
  }
  
}