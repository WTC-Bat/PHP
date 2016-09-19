<?php
function auth($login, $passwd)
{
	$userial;
	$phash;

	if (!$login || !$passwd)
		return (FALSE);
	$userial = unserialize(file_get_contents("../private/passwd"));
	foreach ($userial as $us)
	{
		if ($us["login"] === $login)
		{
			$phash = hash("whirlpool", $passwd);
			if ($us["passwd"] === $phash)
			{
				return (TRUE);
			}
		}
	}
	return (FALSE);
}
?>
