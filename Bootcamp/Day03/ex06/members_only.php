<?php
if ($_SERVER["AUTH_PHP_USER"] == "zaz" && $_SERVER["AUTH_PHP_PW"] == "ilovemylittleponey")
{
	header("Content-Type: text/html");
	print("<html><body>Hello Zaz<br />\n<img src='data:image/png;base64,");
	print(base64_encode(file_get_contents("../img/42.png")));
	print("'>\n</body></head>\n");
}
else
{
	header("WWW-Authenticate: Basic realm='Members Area'");
	header("HTTP/1.0 401 Unauthorized");
	print("<html><body>The area is accesible for members only</body></html>");
}
?>
