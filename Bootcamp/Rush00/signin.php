<?PHP

function user_exists($user_name, $filepath)
{
	$file;
	$ascsv;

	if (file_exists($filepath))
	{
		$file = fopen($filepath, "r");
		if ($file)
		{
			while (($line = fgets($file)) == TRUE)
			{
				$ascsv = str_getcsv($line, ",");
				if ($ascsv[0] == $user_name)
				 	return (TRUE);
			}
		}
	}
	return (FALSE);
}

function get_users($filepath)
{
	$file;
	$line;
	$users = array();

	if (!file_exists($filepath))
	{
		echo "No File Exists\n";
		return (NULL);
	}
	$file = fopen($filepath, "r");
	if ($file)
	{
		while (($line = fgets($file)) == TRUE)
		{
			$csvuser = str_getcsv($line);
			$usarr = array
			(
				"user_name" => $csvuser[0],
				"pwhash" => $csvuser[1],
			);
			array_push($users, $usarr);
		}
	}
	else
	{
		echo "FOPEN ERROR\n";
		return (NULL);
	}
	fclose($file);
	return ($users);
}

	$hashed;
	$usercsv;
	
	if (!$_POST['login'])
	{
		echo "Please enter a login\n";
		header("refresh:3;url=signin.html");
		exit();
	}
	if (!$_POST['passwd'])
	{
		echo "Please enter your password\n";
		header("refresh:3;url=signin.html");
		exit();
	}
	$hashed = hash("whirlpool", $_POST['passwd']);
	$users = get_users("./private/passwd");
	if (user_exists($_POST['login'], "./private/passwd") == TRUE)
	{
		foreach ($users as $user)
		{
			if ($hashed === $user['pwhash'])
			{
				echo "Welcome!\n";
				header("Location: http://localhost:8080/Rush00/index.php");
				exit();
			}
		}
		echo "Incorrect Password\n";
		header("refresh:3;url=signin.html");
		exit();
	}
?>