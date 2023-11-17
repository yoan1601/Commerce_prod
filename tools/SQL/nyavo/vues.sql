create or replace view v_proforma_details as
    select *
    from proformas
    join detail_proformas on proformas.id_proforma=detail_proformas.id_proforma_detail_proforma;

create or replace view v_proforma_fournisseurs as
    select *
    from proformas
    join fournisseurs on proformas.id_fournisseur_proforma=fournisseurs.id_fournisseur;

create or replace view v_detail_proforma_article as
    select *
    from detail_proformas
    join articles on detail_proformas.id_article_detail_proforma=articles.id_article
    join unites on articles.id_unite_article=unites.id_unite;

create or replace view v_bon_commande_details as
    select *
    from bon_commandes
    join detail_bon_commandes as db on bon_commandes.id_bon=db.id_bon_detail_bon;

create or replace view v_bon_commande_non_valide as
    select *
    from v_bon_commande_details as vb
    left join validation_bon_commande_finances as vbf on vb.id_bon=vbf.id_bon_valid_bon_fin
    where vbf.id_valid_bon_fin is null;

create or replace view v_bon_commande_non_valide_montant as
    select vb.date_creation_bon, vb.numero_bon, fournisseurs.nom_fournisseur, sum(vb.ttc_detail_bon) as montant
    from v_bon_commande_non_valide as vb
    join fournisseurs on vb.id_fournisseur_bon=fournisseurs.id_fournisseur
    group by vb.date_creation_bon, vb.numero_bon, fournisseurs.nom_fournisseur;