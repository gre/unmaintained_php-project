<?php

class SessionModel extends AppModel {    
  static function getAll()
  {
	  return self::fetchAll(self::query('SELECT * FROM Session WHERE date_deb_ses > NOW()'));
  }
  
  static function getAllPassed()
  {
	  return self::fetchAll(self::query('SELECT * FROM Session WHERE date_deb_ses <= NOW()'));
  }
  
  static function getSession($nom_c, $date_deb_ses) {
	  return self::fetchFirst(self::query('SELECT * FROM Session WHERE nom_c =$1 AND date_deb_ses=$2',
	  array($nom_c,$date_deb_ses)));
  }
}