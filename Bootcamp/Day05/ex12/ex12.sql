/*SELECT name, first_name FROM ?fiche_personne?*/
SELECT nom, prenom FROM fiche_personne
/*WHERE name LIKE '%-%' OR first_name LIKE '%-%'*/
WHERE nom LIKE '%-%' OR prenom LIKE '%-%'
/*ORDER BY name ASC, first_name ASC*/
ORDER BY nom ASC, prenom ASC;
