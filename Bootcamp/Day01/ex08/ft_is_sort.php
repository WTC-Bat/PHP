<?php

	function ft_is_sort($tab)
	{
		$cnt;
		$sort_tab;

		$cnt = 0;
		$sort_tab = $tab;
		sort($sort_tab);
		foreach ($tab as $entry)
		{
			if ($tab[$cnt] != $sort_tab[$cnt])
				return (FALSE);
			$cnt++;
		}
		return (TRUE);
	}

?>
