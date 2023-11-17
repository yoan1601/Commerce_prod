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