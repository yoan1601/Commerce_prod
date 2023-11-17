CREATE OR REPLACE VIEW v_user_dept AS (
SELECT *
FROM employes emp 
LEFT JOIN postes p ON p.id_poste =emp.id_poste_emp
LEFT JOIN services s ON s.id_service = p.id_service_poste
LEFT JOIN departements d ON d.id_dept = s.id_dept_service
);