#!/usr/bin/php
<?php
if (!file_exists("./private"))
	mkdir ("./private");
if (!file_exists("./private/passwd"))
	touch ("./private/passwd");

$admin = "admin,6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94";
file_put_contents("./private/passwd", $admin);
header("Location: /");
exit();
?>