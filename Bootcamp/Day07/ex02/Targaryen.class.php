<?php
class Targaryen
{
	/*Functions*/
	function getBurned()
	{
		if ($this->resistsFire() == TRUE)
			return ("emerges naked but unharmed");
		else
			return ("burns alive");
	}

	public function resistsFire()
	{
		return (FALSE);
	}
}
?>
