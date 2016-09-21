<?php
require_once("Lannister.class.php");

class Tyrion extends Lannister
{
	/*Functions*/
	public function sleepWith($person)
	{
		if (get_class($person) == "Jaime")
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (get_class($person) == "Sansa")
			print("Let's do this." . PHP_EOL);
		else if (get_class($person) == "Cersei")
			print("Not even if I'm drunk !" . PHP_EOL);
	}
}
?>
