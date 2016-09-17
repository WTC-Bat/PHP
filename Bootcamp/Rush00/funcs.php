<?php
//filepath -gen.- ./products.csv
//Get an array of products from specified file
function get_products($filepath)
{
	$file;
	$line;
	$products = array();

	if (!file_exists($filepath))
	{
		echo "No File Exists\n";
		return (NULL);
	}
	$file = fopen($filepath);
	if ($file)
	{
		while (($line = fgets($file)) == TRUE)
		{
			$csvarr = str_getcsv($line, ",");
			$parr = array
			(
				"product_name" => $csvarr[0];
				"product_id" => $csvarr[1];
				"product_img" => $csvarr[2];
				"product_price" => $csvarr[3];
				"product_desc" => $csvarr[4];
			)
			array_push($products, $parr);

		}
	}
	$fclose($file);
	return ($products);
}
?>
