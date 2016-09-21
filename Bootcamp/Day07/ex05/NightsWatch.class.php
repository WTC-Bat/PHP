<?php
require_once("IFighter.class.php");

class NightsWatch implements IFighter
{
	/*Properties*/
	private $_fighters;

	/*Constructor*/
	function __construct()
	{
		$_fighters = array();
	}

	/*Destructor*/
	function __destruct()
	{
	}

	/*Functions*/
	public function recruit($person)
	{
		if (is_object($person))
		{
			if ($person instanceof IFighter)
			{
				if (count($this->_fighters) < 1)
					$this->_fighters[0] = $person;
				else
					array_push($this->_fighters, $person);
			}
		}
	}

	public function fight()
	{
		foreach ($this->_fighters as $fighter)
		{
			$fighter->fight();
		}
	}
}
?>
