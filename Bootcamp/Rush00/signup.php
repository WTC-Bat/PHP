<?PHP

function create_user_path()
{
	if (!file_exists("./private"))
		mkdir ("./private");
	if (!file_exists("./private/passwd"))
		touch ("./private/passwd");
}

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

	$hashed;
	$usercsv;
	
	if (!$_POST['login'])
	{
		echo "Please enter a login\n";
		header("refresh:3;url=signup.html");
		exit();
	}
	create_user_path();
	$hashed = hash("whirlpool", $_POST['passwd']);
	$usercsv = $_POST['login'] . "," . $hashed . "\n";
	if (user_exists($_POST['login'], "./private/passwd") == FALSE)
	{

		if ($_POST['passwd'] === $_POST['confirmpass'])
		{
			file_put_contents("./private/passwd", $usercsv, FILE_APPEND);
			header("Location: http://localhost:8080/Rush00/index.php");
			exit();
		}
		else
		{
			echo "Passwords don't match\n";
		  	header("refresh:3;url=signup.html");
		  	exit();
		}

	}
	else
	{
		echo "User already exists!\n";
		header("refresh:3;url=signin.html");
		exit();
	}

?>
