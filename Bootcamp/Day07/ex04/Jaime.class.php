<?php
require_once("Lannister.class.php");

class Jaime extends Lannister
{
	/*Functions*/
	public function sleepWith($person)
	{
		if (is_object($person))
		{
			if (get_class($person) == "Tyrion")
				print("Not even if I'm drunk !" . PHP_EOL);
			else if (get_class($person) == "Sansa")
				print("Let's do this." . PHP_EOL);
			else if (get_class($person) == "Cersei")
				print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
		}
	}
}
?>
