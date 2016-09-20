-- SELECT floor_number AS 'floor', seats as 'seats FROM cinema'
SELECT etage_salle AS 'floor', nbr_siege AS 'seats' FROM salle
-- ORDER BY seats DESC;
ORDER BY nbr_siege DESC;
