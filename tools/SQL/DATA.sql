-- Insertion de données dans la table 'categories'
INSERT INTO categories (nom_categorie) VALUES
('Électronique'),
('Vêtements'),
('Articles ménagers');

-- Insertion de données dans la table 'unites'
INSERT INTO unites (nom_unite, symbole_unite) VALUES
('Pièce', 'pcs'),
('Kilogramme', 'kg'),
('Litre', 'L');

-- Insertion de données dans la table 'articles'
INSERT INTO articles (nom_article, id_unite_article, id_categorie_article) VALUES
('Smartphone', 1, 1),
('Chemise élégante', 2, 2),
('Robot de cuisine', 3, 3);


-- Insertion de données dans la table 'departements'
INSERT INTO departements (nom_dept) VALUES
('Ventes'),
('Logistique');

-- Insertion de données dans la table 'services'
INSERT INTO services (nom_service, id_dept_service) VALUES
('Service clientèle', 1),
('Marketing', 1),
('Gestion des stocks', 2),
('Expédition', 2),
('Direction générale', 1);

-- Insertion de données dans la table 'postes'
INSERT INTO postes (id_service_poste, nom_poste, niveau_poste) VALUES
(1, 'Représentant des ventes', 1),
(1, 'Responsable du service clientèle', 11),
(2, 'Spécialiste marketing', 1),
(2, 'Chef de marketing', 11),
(3, 'Agent de logistique', 1),
(3, 'Chef de la gestion des stocks', 11),
(4, 'Préparateur de commandes', 1),
(4, 'Responsable d expédition', 11),
(5, 'PDG', 11);

-- Insertion de données dans la table 'employes'
INSERT INTO employes (matricule_emp, nom_emp, id_poste_emp) VALUES
('E001', 'Jean Dupont', 1),
('E002', 'Marie Martin', 2),
('E003', 'Pierre Lefevre', 3),
('E004', 'Sophie Dubois', 4),
('E005', 'Pauline Girard', 5);

-- Insertion de données dans la table 'fournisseurs'
INSERT INTO fournisseurs (nom_fournisseur) VALUES
('Fournisseur Electronics'),
('Vêtements Direct'),
('Maison Accessoires');
