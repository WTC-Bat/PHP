SELECT COUNT(*) AS 'movies' FROM member_history
WHERE `date` > '2006-10-30'
AND `date` < '2007-07-27'
AND `date` LIKE '%-12-24';
