<?php
include("./Bootcamp/Day06/ex00/Color.class.php");

//print("Color(array \$args): Construction Complete\n");

print("TESTING:<br />");
print("========<br /><br />");

Color::$verbose = TRUE;
$col = new Color(array("red" => 128, "green" => 64, "blue" => 255));
?>
