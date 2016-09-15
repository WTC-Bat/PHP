#!/usr/bin/php
<?php

	$html;

	if (argc == 1)
		exit(0);
	if (is_readable($argv[1]) == FALSE)
		exit(1);
	$html = get_file_contents($argv[1])

?>
