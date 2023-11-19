INSERT INTO employes (matricule_emp, nom_emp, id_poste_emp) VALUES('E009', 'Finn LeComte', 13);
INSERT INTO employes (matricule_emp, nom_emp, id_poste_emp) VALUES ('E010', 'David Guy', 9);

INSERT INTO departements (nom_dept) VALUES
('Achats');

INSERT INTO services (nom_service, id_dept_service) VALUES
('Service achat', 3);

INSERT INTO postes (id_service_poste, nom_poste, niveau_poste) VALUES
(6, 'Responsable achat', 111);

INSERT INTO employes (matricule_emp, nom_emp, id_poste_emp) VALUES
('E008', 'Vola', 12);