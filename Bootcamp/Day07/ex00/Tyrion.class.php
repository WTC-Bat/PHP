<?php
class Tyrion extends Lannister
{
	/*Constructor*/
	function __construct()
	{
		parent::__construct();
		print("My name is Tyrion" . PHP_EOL);
	}

	/*Destructor*/
	function __destruct()
	{
	}

	/*Functions*/
	public function getSize()
	{
		return ("Short");
	}
}
?>
