<?php

class ParticipantModel extends AppModel {    
  static function getBySession($nom_c, $date_deb_ses)
  {
	  return self::fetchAll(self::query('SELECT * FROM Participant WHERE nom_c=$1 AND date_deb_ses=$2',
	  	array($nom_c,$date_deb_ses)) );
  }
  
  static function getNomParticipant($code_client, $nom_c, $date_deb_ses, $nom_part) {
    return self::fetchFirst(self::query(
					"SELECT *
					FROM Participant
					WHERE code_client=$1 AND nom_c=$2 AND date_deb_ses=$3 AND nom_part=$4",
		array($code_client, $nom_c, $date_deb_ses, $nom_part)));
  }
  
  static function add($code_client, $nom_c, $date_deb_ses, $nom_part) {
  	// TODO Check limits
  	// TODO transaction 
  	// TODO No same nom_part
  	return self::query('INSERT INTO Participant (code_client,nom_c,date_deb_ses,nom_part,date_inscrpt)
  		VALUES ($1,$2,$3,$4,$5)', array($code_client,$nom_c,$date_deb_ses,$nom_part,NOW()) );
  }
}