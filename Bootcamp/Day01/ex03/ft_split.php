<?php

	function ft_split($str)
	{
		$star;
		$cnt;

		$star = NULL;
		$cnt = 0;
		if (str != '')
		{
			$star = explode(' ', $str);
			foreach ($star as $val)
			{
				if ($val == ' ' || $val == '')
				{
					unset($star[$cnt]);
				}
				$cnt = $cnt + 1;
			}
			sort($star);
		}
		return ($star);
	}

?>
