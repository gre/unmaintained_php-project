
insert into admin (no_admin, nom_admin, login, mpadmin) values (1, 'Greg Iluvatar', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

insert into client (code_client, nom_client, adresse_cl, raison_sociale, identclient, mpclient, confirme) values('Dav770', 'David Oleg', '1 rue de Paris, 77000 Melun', 'MicroFrost', 'client', 'd2a04d71301a8915217dd5faf81d12cffd6cd958', true);

insert into ingenieur (no_employe, nom_ing, adresse_ing, niv_salaire, categorie, login, mping) values
(2,'Bob Linger','45 rue de Evry, 77000 Melun',1,'autre','ingenieur','f6277e16693d7a9f862699dbb7d69fef3045e0b4');

insert into domaine(nom_dom,ch_aff_cours,ch_aff_hl,ch_aff_vente,num_responsable) values
('dom',0,0,0,2);
insert into logiciel (nom_log,nom_dom,type_log,prix_log_ttc,prix_log_ht) values
('logik','dom','libre',11.96,10);
insert into cours (nom_c,nom_dom,type_c,nom_log,prix_c_ttc,prix_c_ht,duree_c,description_c) values
('Utiliser logik','dom','GENERAL','logik',119.60,100,3,'Comment maitriser logik?'),
('Maitriser logik','dom','GENERAL','logik',119.60,100,3,'Comment maitriser logik?');
insert into session (nom_c, date_deb_ses, date_fin_ses, nb_max_part, nb_part_ins) values 
('Utiliser logik', '2011-06-30', '2011-07-02', 30, 0),
('Utiliser logik', '2011-07-05', '2011-07-08', 20, 0),
('Maitriser logik', '2011-07-15', '2011-07-18', 40, 0);

insert into participant (nom_c,date_deb_ses,code_client,nom_part,date_inscrpt) values
('Utiliser logik','2011-06-30','Dav770', 'Pierre Gérard', '2011-06-30 22:43:37.529898'),
('Utiliser logik','2011-06-30','Dav770','Jacques Vertu','2011-06-30 22:43:37.529898'),
('Utiliser logik','2011-06-30','Dav770','Jean Normant','2011-06-30 22:43:37.529898'),
('Utiliser logik','2011-06-30','Dav770','David Michel','2011-06-30 22:43:37.529898');
