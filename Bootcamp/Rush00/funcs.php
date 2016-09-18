<?php

/*
Functions:
	get_products($filepath)
	get_users($filepath)
	clear_file($filepath)
	user_exists($user, $filename)
	add_user($user, $filename)
	remove_user($user_name)
*/

/*
**	Return an array of products found in the file specified in $filepath.
**	The array returned contains product arrays.
**	Eg:
**	array
**	(
		array (User_name, User_pass)
		arrat (User2_name, User2_pass)
**	)
*/
function get_products($filepath)
{
	$file;
	$line;
	$products = array();

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
			$csvarr = str_getcsv($line, ",", '"');
			$parr = array
			(
				"product_name" => $csvarr[0],
				"product_id" => $csvarr[1],
				"product_category" => $csvarr[2],
				"product_img" => $csvarr[3],
				"product_price" => $csvarr[4],
				"product_desc" => $csvarr[5],
			);
			array_push($products, $parr);
		}
	}
	fclose($file);
	return ($products);
}

/*
**	Return an array of users found in the file specified in $filepath
**	$filename	-	$file to append user to (eg. ../private/passwd)
*/
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

function clear_file($filepath)
{
	$file;

	if (file_exists($filepath))
	{
		$file = fopen($filepath, "r+");
		if ($file)
		{
			ftruncate($file, 0);
		}
		fclose($file);
	}
}

/*
**	Check specified file if the specified user (FROM ARRAY) exists.
**
**	$user		-	single user array (eg. ("USER_NAME", "USER_PASS"))
**	$filename	-	$file to append user to (eg. ../private/passwd)
*/
/*
function user_exists($user, $filename)
{
	$file;
	$line;
	$ascsv;

	if (file_exists($filename))
	{
		$file = fopen($filename, "r");
		if ($file)
		{
			while (($line = fgets($file)) == TRUE)
			{
				$ascsv = str_getcsv($line, ",");
				if ($ascsv[0] == $user[0])
					return (TRUE);
			}
		}
	}
	return (FALSE);
}
*/

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

/*
**	Add specified user (FROM ARRAY) to the file specified in $filepath.
**
**	$user		-	single user array (eg. ("USER_NAME", "USER_PASS"))
**	$filename	-	$file to append user to (eg. ../private/passwd)
*/
/*
function add_user($user, $filepath)	//$user is array
{
	$file;

	if (file_exists($filepath))
	{
		$file = fopen($filepath, "a");
		if ($file)
		{
			if (user_exists($user, $filepath) == FALSE)
				fputcsv($file, $user);
			else
				echo "User already exists\n";
		}
		fclose($file);
	}
}
*/

function check_user_path()
{
	if (!file_exists("./tst"))
		mkdir ("./tst");
	if (!file_exists("./tst/TEST"))
		touch ("./tst/TEST");
}

function add_user($login, $passwd, $filepath)
{
	$hashed;
	$usercsv;

	check_user_path();
	return ;

	if (!file_exists($filepath))
	{
		//mkdir ("$filepath");
		mkdir ("./random/filing");
	}
	$hashed = hash("whirlpool", $passwd);
	$usercsv = $login . "," . $hashed . "\n";
	if (user_exists($login, $filepath) == FALSE)
		file_put_contents($filepath, $usercsv, FILE_APPEND);
	else
		echo "User already exists!\n";
	/*
	if (file_exists($filepath))
	{
		$hashed = hash("whirlpool", $passwd);
		$usercsv = $login . "," . $hashed . "\n";
		if (user_exists($login, $filepath) == FALSE)
			file_put_contents($filepath, $usercsv, FILE_APPEND);
		else
			echo "User already exists!\n";
	}
	*/
}

function remove_user($user_name)
{
	$users;

	//if (file_exists("../private/passwd"))		//Assumes passwd is a csv file
	if (file_exists("./private/passwd"))
	{
		//$users = get_users("../private/passwd");
		$users = get_users("./private/passwd");
	}
	else
	{
		echo "PASSWD FILE DOES NOT EXIST\n";
	}
	foreach ($users as $u)
	{
		//echo "Unsetting: \n";
		//echo $u["user_name"] . ": ";
		//echo $u["pwhash"] . "\n";
		unset($u);
		//echo "User Removed\n";
		//echo "User: " . $u["user_name"] . "\n";
		//echo "Hash: " . $u["pwhash"] . "\n";
	}
	clear_file("./private/passwd");
	foreach ($users as $u)
	{
		add_user($u["user_name"], $u["pwhash"], "./private/passwd");
	}
}
?>
