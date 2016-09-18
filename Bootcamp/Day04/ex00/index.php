<?php
session_start();
if ($_GET["submit"] == "OK")
{
	if (!$_GET["login"])
	{
		echo "Please enter a valid Login.\n";
	}
	else if (!$_GET["passwd"])
	{
		echo "Please enter a valid Password.\n";
	}
	else
	{
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];
	}
}
?>
<html>
	<head>
		<title>Ex00 - index.php</title>
	</head>
	<body>
		<form>
			<p>Login: <input name="login" value="<?PHP echo $_SESSION['login'];?>" /></p>
			<p>Password: <input name="passwd" value="<?PHP echo $_SESSION['passwd'];?>" /></p>
			<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
