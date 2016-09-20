/*SELECT ?fiche_personne?.name AS 'NAME', ?fiche_personne?.first_name, subscriptions.price*/
SELECT fiche_personne.nom AS 'NAME', fiche_personne.prenom, abonnement.prix
/*FROM ?fiche_personne?*/
FROM fiche_personne
/*INNER JOIN members*/
INNER JOIN membre
/*ON ?fiche_personne?.id_person = members.id_?fiche?_person*/
ON fiche_personne.id_perso = membre.id_fiche_perso
/*INNER JOIN subscriptions*/
INNER JOIN abonnement
/*ON members.id_sub = subscription.id_sub*/
ON membre.id_abo = abonnement.id_abo
/*WHERE subscriptions.price > 42*/
WHERE abonnement.prix > 42
/*ORDER BY ?fiche_personne?.name ASC, ?fiche_personne?.first_name ASC*/
ORDER BY fiche_personne.nom ASC, fiche_personne.prenom ASC;
