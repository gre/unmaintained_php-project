CREATE DOMAIN TypeCours varchar(20) NOT NULL DEFAULT 'GENERAL' CHECK (VALUE IN ('GENERAL', 'COURS LOGICIEL'));
CREATE DOMAIN TypeLogiciel varchar(25) NOT NULL DEFAULT 'logiciel' CHECK (VALUE IN ('logiciel', 'licence par poste', 'libre', 'assitance-installation'));
CREATE DOMAIN TypeIngenieur varchar(20) NOT NULL DEFAULT 'junior' CHECK (VALUE IN ('junior', 'autre'));

CREATE TABLE Ingenieur (

no_employe serial PRIMARY KEY,

nom_ing varchar(30),

adresse_ing varchar(100),

niv_salaire integer,

categorie TypeIngenieur,

login varchar(50),

MPing varchar(50)
);

CREATE TABLE Domaine (

nom_dom varchar(30) PRIMARY KEY,

ch_aff_cours float(2) CHECK (ch_aff_cours >= 0), -- p specifies the minimum acceptable precision

ch_aff_hl float(2) CHECK (ch_aff_hl >= 0),

ch_aff_vente float(2) CHECK (ch_aff_vente >= 0),

num_responsable integer REFERENCES Ingenieur (no_employe)
);

CREATE TABLE Logiciel (

nom_log varchar(50) PRIMARY KEY,
    nom_dom varchar(30) REFERENCES Domaine,

type_log TypeLogiciel,

prix_log_ttc float(2) CHECK (prix_log_ttc > 0),

prix_log_ht float(2) CHECK (prix_log_ht > 0)
);

CREATE TABLE Cours (
    nom_c varchar(30) PRIMARY KEY,

nom_dom varchar(30) REFERENCES Domaine,
    type_c TypeCours,
    nom_log varchar(50) REFERENCES Logiciel,
    prix_c_ttc float,
    prix_c_ht float,
    duree_c integer CHECK(duree_c > 0 AND duree_c < 5), -- nombre de jours
    description_c varchar(50)
);

CREATE TABLE Session (
    nom_c varchar(30) REFERENCES Cours,
    date_deb_ses date NOT NULL,
    date_fin_ses date,
    nb_max_part integer CHECK (nb_max_part > 0 AND nb_max_part < 50),
    nb_part_ins integer CHECK (nb_part_ins <= nb_max_part),
    PRIMARY KEY (nom_c, date_deb_ses)
);

CREATE TABLE Client (
    code_client varchar(8) PRIMARY KEY, -- 3 première lettre du nom, code département, 1 chiffre pour différencier les doublons
    nom_client varchar(50),
    adresse_cl varchar(50),
    raison_sociale varchar(50),
    identClient varchar(30),
    MPClient varchar(40), -- mot de pass, hash sha1 always 40 ascii chars
    confirme boolean -- Est-il confirme par l'admin ou pas
);

CREATE TABLE Participant (
    num_participant serial PRIMARY KEY, -- eviter les homonymes
    nom_c varchar(30),
    date_deb_ses date,
    code_client varchar(8) REFERENCES Client,
    nom_part varchar(50) NOT NULL,
    date_inscrpt timestamp,
    FOREIGN KEY (nom_c,date_deb_ses) REFERENCES Session
);




CREATE LANGUAGE plpgsql;
create or replace function incrementParticipant() returns trigger as $$
begin
    UPDATE Session SET nb_part_ins=nb_part_ins+1 WHERE nom_c=NEW.nom_c AND date_deb_ses=NEW.date_deb_ses;
    return NEW;
end;
$$ LANGUAGE plpgsql;

create trigger incrementNbParticipant
after insert on Participant for each row execute procedure incrementParticipant();

create or replace function decrementParticipant() returns trigger as $$
begin

UPDATE Session SET nb_part_ins=nb_part_ins-1 WHERE nom_c=OLD.nom_c AND date_deb_ses=OLD.date_deb_ses;
    return OLD;
end;
$$ LANGUAGE plpgsql;

ALTER TABLE Client ADD confirme boolean;

CREATE TABLE Admin (

no_admin serial PRIMARY KEY,

nom_admin varchar(30),

login varchar(50),

mpadmin varchar(50)
);