<?php

class CoursModel extends AppModel {    
  static function getById($id)
  {
    return self::fetchFirst(self::query('SELECT * FROM Cours WHERE nom_c=$1',$id));
  }
}

?>