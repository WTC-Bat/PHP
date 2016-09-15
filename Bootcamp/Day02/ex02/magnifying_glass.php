#!/usr/bin/php
<?php

$html;
$dom;

if (argc == 1)
	exit(0);
if (is_readable($argv[1]) == FALSE)
	exit(1);
$html = file_get_contents($argv[1]);
/*  "(.*)" <-regex for strings surrounded by "  */
$dom = new DOMDocument;
$dom->loadHTML($html);
foreach ($dom->getElementsByTagName("*") as $node)
{
	//print "$node->localName\n";
	if ($node->localName == "a")
	{
		$node->nodeValue = strtoupper($node->nodeValue);
	}
	if ($node->hasAttribute("title") == TRUE)
	{
		foreach ($node->attributes as $att)
		{
			if ($att->name == "title")
			{
				$att->value = strtoupper($att->value);
			}
		}
	}
}
$new_html = $dom->saveHTML();
print $new_html;

?>
