CREATE OR REPLACE VIEW v_detail_demande_proforma AS (
    SELECT * 
    FROM detail_demande_proformas ddpf
    LEFT JOIN articles art ON art.id_article = ddpf.id_article_detail_demande
    LEFT JOIN unites u ON u.id_unite = art.id_unite_article
    LEFT JOIN categories c ON c.id_categorie = art.id_categorie_article
);

CREATE OR REPLACE VIEW v_besoin_grpByArticle AS (
    SELECT 
    art.id_article,
    art.nom_article,
    categ.id_categorie,
    categ.nom_categorie,
    SUM(quantite_detail_besoin) as qteTotale
    FROM v_besoiAchat_validation vbv
    LEFT JOIN detail_besoin_achats dba ON dba.id_besoin_detail_besoin = vbv.id_besoin
    LEFT JOIN articles art ON art.id_article = dba.id_article_detail_besoin
    LEFT JOIN categories categ ON categ.id_categorie = art.id_categorie_article
    WHERE id_valid_besoin IS NOT NULL 
    GROUP BY art.id_article, art.nom_article,categ.id_categorie, categ.nom_categorie
);

CREATE OR REPLACE VIEW v_besoiAchat_validation AS (
    SELECT * 
    FROM v_besoinAchat_dept v_bad 
    LEFT JOIN validation_besoin_achats vba ON vba.id_besoin_valid_besoin = v_bad.id_besoin  
);

CREATE OR REPLACE VIEW v_detail_besoin_article AS (
    SELECT * 
    FROM detail_besoin_achats dba 
    LEFT JOIN articles art ON art.id_article = dba.id_article_detail_besoin
    LEFT JOIN unites u ON u.id_unite = art.id_unite_article
    LEFT JOIN categories c ON c.id_categorie = art.id_categorie_article
);

CREATE OR REPLACE VIEW v_besoinAchat_dept AS (
    SELECT *
    FROM besoin_achats ba 
    LEFT JOIN services s ON s.id_service = ba.id_service_besoin
    LEFT JOIN departements d ON d.id_dept = s.id_dept_service
);

CREATE OR REPLACE VIEW v_article AS (
    SELECT *
    FROM articles art 
    LEFT JOIN categories categ ON categ.id_categorie = art.id_categorie_article
    LEFT JOIN unites u ON u.id_unite = art.id_unite_article
);

CREATE OR REPLACE VIEW v_user_dept AS (
SELECT *
FROM employes emp 
LEFT JOIN postes p ON p.id_poste =emp.id_poste_emp
LEFT JOIN services s ON s.id_service = p.id_service_poste
LEFT JOIN departements d ON d.id_dept = s.id_dept_service
);