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
  
  static function addParticipants($code_client, $nom_c, $date_deb_ses, $nom_part_list) {
  	self::query("START TRANSACTION");
  	$cours = CoursModel::getById($nom_c);
  	
  	foreach($nom_part_list AS $nom_part) {
  		if (self::getNomParticipant($code_client, $nom_c, $date_deb_ses, $nom_part) != false) {
			self::query("ROLLBACK");
			return $nom_part;
  		}
		self::query('INSERT INTO Participant (code_client,nom_c,date_deb_ses,nom_part,date_inscrpt)
  			VALUES ($1,$2,$3,$4,NOW())', array($code_client,$nom_c,$date_deb_ses,$nom_part) );
  		
  		self::query('UPDATE Domaine SET ch_aff_cours=ch_aff_cours+$1 WHERE nom_dom=$2',
  			array($cours['prix_c_ttc'],$cours['nom_dom']) );
  		
  		
  	}
  	self::query("COMMIT");
  	return true;
  }
  static function deleteParticipant($code_client, $nom_c, $date_deb_ses, $nom_part) {
    $session = SessionModel::getSession($nom_c, $date_deb_ses);
    if ( (strtotime($session['date_deb_ses']) - time()) < 60*60*24* 10) {
      
    }
    
    self::query("START TRANSACTION");
    $cours = CoursModel::getById($nom_c);
    
  	
  	if (self::getNomParticipant($code_client, $nom_c, $date_deb_ses, $nom_part) == false) {
  		self::query("ROLLBACK");
  		return false;
  	}
  	if (!self::query('DELETE FROM Participant WHERE 
  		code_client=$1 AND nom_c=$2 AND date_deb_ses=$3 AND nom_part=$4',
  		array($code_client, $nom_c, $date_deb_ses, $nom_part) )) {
		self::query("ROLLBACK");
		return false;
  	}
	self::query('UPDATE Domaine SET ch_aff_cours=ch_aff_cours-$1 WHERE nom_dom=$2',
		array($cours['prix_c_ttc'],$cours['nom_dom']) );
    
  	self::query("COMMIT");
  }
  
  static function updateParticipant($code_client, $nom_c, $date_deb_ses, $nom_part_old, $nom_part_new) {
    self::query("START TRANSACTION");
  	
    if (self::getNomParticipant($code_client, $nom_c, $date_deb_ses, $nom_part_old) == false) {
	    self::query("ROLLBACK");
	    return false;
    }
    
    self::query('UPDATE Participant SET
		nom_part=$5
		WHERE 
  		code_client=$1 AND nom_c=$2 AND date_deb_ses=$3 AND nom_part=$4',
  		array($code_client, $nom_c, $date_deb_ses, $nom_part_old, $nom_part_new) );
    
    return self::query("COMMIT");
  }
}