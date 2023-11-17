CREATE  TABLE categories ( 
	id_categorie         INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_categorie        VARCHAR(255)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE demande_proformas ( 
	id_demande           INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	date_demande         TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE departements ( 
	id_dept              INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_dept             VARCHAR(255)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE fournisseurs ( 
	id_fournisseur       INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_fournisseur      VARCHAR(255)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE mode_paiements ( 
	id_mode_paiement     INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_mode             VARCHAR(255)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE proformas ( 
	id_proforma          INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	date_proforma        TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   ,
	id_fournisseur_proforma INT    NOT NULL   ,
	delai_livraison_proforma TIMESTAMP    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE services ( 
	id_service           INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_service          VARCHAR(255)    NOT NULL   ,
	id_dept_service      INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE unites ( 
	id_unite             INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_unite            VARCHAR(255)    NOT NULL   ,
	symbole_unite        VARCHAR(35)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE articles ( 
	id_article           INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	nom_article          VARCHAR(255)    NOT NULL   ,
	id_unite_article     INT    NOT NULL   ,
	id_categorie_article INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE besoin_achats ( 
	id_besoin            INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_service_besoin    INT    NOT NULL   ,
	date_creation_besoin TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   ,
	delai_livraison_besoin TIMESTAMP    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE bon_commandes ( 
	id_bon               INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_fournisseur_bon   INT    NOT NULL   ,
	date_creation_bon    TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   ,
	numero_bon           VARCHAR(255)    NOT NULL   ,
	libelle_bon          VARCHAR(255)    NOT NULL   ,
	delai_livraison_bon  TIMESTAMP    NOT NULL   ,
	is_livraison_part_bon INT    NOT NULL   ,
	id_mode_paie_bon     INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE detail_besoin_achats ( 
	id_detail_besoin     INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_besoin_detail_besoin INT    NOT NULL   ,
	id_article_detail_besoin INT    NOT NULL   ,
	quantite_detail_besoin NUMERIC(10,2)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE detail_bon_commandes ( 
	id_detail_bon        INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_article_detail_bon INT    NOT NULL   ,
	quantite_detail_bon  NUMERIC(10,2)    NOT NULL   ,
	puht_detail_bon      NUMERIC(10,2)    NOT NULL   ,
	tva_detail_bon       NUMERIC(10,2)    NOT NULL   ,
	ttc_detail_bon       NUMERIC(10,2)    NOT NULL   ,
	id_bon_detail_bon    INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE detail_demande_proformas ( 
	id_detail_demande    INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_demande_detail_demande INT    NOT NULL   ,
	id_article_detail_demande INT    NOT NULL   ,
	quantite_detail_demande NUMERIC(10,2)    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE detail_proformas ( 
	id_detail_proforma   INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_article_detail_proforma INT    NOT NULL   ,
	quantite_detail_proforma NUMERIC(10,2)    NOT NULL   ,
	puht_detail_proforma NUMERIC(10,2)    NOT NULL   ,
	tva_detail_proforma  NUMERIC(10,2)    NOT NULL   ,
	ttc_detail_proforma  NUMERIC(10,2)    NOT NULL   ,
	id_proforma_detail_proforma INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE postes ( 
	id_poste             INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_service_poste     INT    NOT NULL   ,
	nom_poste            VARCHAR(255)    NOT NULL   ,
	niveau_poste         INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE employes ( 
	id_emp               INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	matricule_emp        VARCHAR(255)    NOT NULL   ,
	nom_emp              VARCHAR(255)    NOT NULL   ,
	id_poste_emp         INT    NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE validation_besoin_achats ( 
	id_valid_besoin      INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_emp_valid_besoin  INT    NOT NULL   ,
	id_besoin_valid_besoin INT    NOT NULL   ,
	date_valid_besoin    TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   
 ) engine=InnoDB;

CREATE  TABLE validation_bon_commande_dg ( 
	id_valid_bon_dg      INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_bon_valid_bon_dg  INT    NOT NULL   ,
	id_emp_valid_bon_dg  INT    NOT NULL   ,
	date_valid_bon_dg    TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   
 );

CREATE  TABLE validation_bon_commande_finances ( 
	id_valid_bon_fin     INT    NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	id_bon_valid_bon_fin INT    NOT NULL   ,
	id_emp_valid_bon_fin INT    NOT NULL   ,
	date_valid_bon_fin   TIMESTAMP  DEFAULT (CURRENT_TIMESTAMP)  NOT NULL   
 ) engine=InnoDB;

ALTER TABLE articles ADD CONSTRAINT fk_articles_unites FOREIGN KEY ( id_unite_article ) REFERENCES unites( id_unite ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE articles ADD CONSTRAINT fk_articles_categories FOREIGN KEY ( id_categorie_article ) REFERENCES categories( id_categorie ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE besoin_achats ADD CONSTRAINT fk_besoin_achats_services FOREIGN KEY ( id_service_besoin ) REFERENCES services( id_service ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE bon_commandes ADD CONSTRAINT fk_bon_commandes_fournisseurs FOREIGN KEY ( id_fournisseur_bon ) REFERENCES fournisseurs( id_fournisseur ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE bon_commandes ADD CONSTRAINT fk_bon_commandes_mode_paiements FOREIGN KEY ( id_mode_paie_bon ) REFERENCES mode_paiements( id_mode_paiement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_besoin_achats ADD CONSTRAINT fk_detail_besoin_achats_besoin_achats FOREIGN KEY ( id_besoin_detail_besoin ) REFERENCES besoin_achats( id_besoin ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_besoin_achats ADD CONSTRAINT fk_detail_besoin_achats_articles FOREIGN KEY ( id_article_detail_besoin ) REFERENCES articles( id_article ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_bon_commandes ADD CONSTRAINT fk_detail_bon_commandes_articles FOREIGN KEY ( id_article_detail_bon ) REFERENCES articles( id_article ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_bon_commandes ADD CONSTRAINT fk_detail_bon_commandes_bon_commandes FOREIGN KEY ( id_bon_detail_bon ) REFERENCES bon_commandes( id_bon ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_demande_proformas ADD CONSTRAINT fk_detail_demande_proformas_demande_proformas FOREIGN KEY ( id_demande_detail_demande ) REFERENCES demande_proformas( id_demande ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_demande_proformas ADD CONSTRAINT fk_detail_demande_proformas_articles FOREIGN KEY ( id_article_detail_demande ) REFERENCES articles( id_article ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_proformas ADD CONSTRAINT fk_detail_proformas_articles FOREIGN KEY ( id_article_detail_proforma ) REFERENCES articles( id_article ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE detail_proformas ADD CONSTRAINT fk_detail_proformas_proformas FOREIGN KEY ( id_proforma_detail_proforma ) REFERENCES proformas( id_proforma ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE employes ADD CONSTRAINT fk_employes_postes FOREIGN KEY ( id_poste_emp ) REFERENCES postes( id_poste ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE postes ADD CONSTRAINT fk_postes_services FOREIGN KEY ( id_service_poste ) REFERENCES services( id_service ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE proformas ADD CONSTRAINT fk_proformas_fournisseurs FOREIGN KEY ( id_fournisseur_proforma ) REFERENCES fournisseurs( id_fournisseur ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE services ADD CONSTRAINT fk_services_departements FOREIGN KEY ( id_dept_service ) REFERENCES departements( id_dept ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE validation_besoin_achats ADD CONSTRAINT fk_validation_besoin_achats_employes FOREIGN KEY ( id_emp_valid_besoin ) REFERENCES employes( id_emp ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE validation_besoin_achats ADD CONSTRAINT fk_validation_besoin_achats_besoin_achats FOREIGN KEY ( id_besoin_valid_besoin ) REFERENCES besoin_achats( id_besoin ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE validation_bon_commande_dg ADD CONSTRAINT fk_validation_bon_commande_dg_bon_commandes FOREIGN KEY ( id_bon_valid_bon_dg ) REFERENCES bon_commandes( id_bon ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE validation_bon_commande_dg ADD CONSTRAINT fk_validation_bon_commande_dg_employes FOREIGN KEY ( id_emp_valid_bon_dg ) REFERENCES employes( id_emp ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE validation_bon_commande_finances ADD CONSTRAINT fk_validation_bon_commande_finances_bon_commandes FOREIGN KEY ( id_bon_valid_bon_fin ) REFERENCES bon_commandes( id_bon ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE validation_bon_commande_finances ADD CONSTRAINT fk_validation_bon_commande_finances_employes FOREIGN KEY ( id_emp_valid_bon_fin ) REFERENCES employes( id_emp ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE commercial.employes ADD motdepasse VARCHAR(255)  NOT NULL DEFAULT (1234);