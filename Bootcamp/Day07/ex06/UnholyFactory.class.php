<?php
include_once("Fighter.class.php");

class UnholyFactory
{
	/*Properties*/
	private $_fighters;

	/*Functions*/
	public function absorb($fighter)
	{
		if ($fighter instanceof Fighter)
		{
			if ($this->_hasFighter($fighter->fighterType) == TRUE)
			{
				printf("(Factory already absorbed a fighter of type %s)" .
						PHP_EOL, $fighter->fighterType);
			}
			else
			{
				if ($fighter instanceof Fighter)
				{
					if (count($this->_fighters) < 1)
						$this->_fighters[0] = $fighter;
					else
						array_push($this->_fighters, $fighter);
					printf("(Factory absorbed a fighter of type %s)" . PHP_EOL,
							$fighter->fighterType);
				}
			}
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	public function fabricate($fighterType)
	{
		foreach ($this->_fighters as $fighter)
		{
			if ($fighterType == $fighter->fighterType)
			{
				printf("(Factory fabricates a fighter of type %s)". PHP_EOL,
						$fighter->fighterType);
				return clone ($fighter);
			}
		}
		printf("(Factory hasn't absorbed any of type %s)" . PHP_EOL,
				$fighterType);
	}

	private function _hasFighter($fighterType)
	{
		if ($this->_fighters != NULL)
		{
			foreach ($this->_fighters as $fighter)
			{
				if ($fighter->fighterType == $fighterType)
					return (TRUE);
			}
		}
		return (FALSE);
	}
}
?>
