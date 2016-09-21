<?php
class Fighter
{
	/*Properties*/
	public $fighterType;

	/*Constructor*/
	function __construct($fType)
	{
		if (is_string($fType))
			$this->fighterType = $fType;
	}

	/*Destructor*/
	function __destruct()
	{
	}
}
?>
