<?php
class Color
{
	/*Properties*/
	public static $verbose = FALSE;
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	/*Constructor*/
	function __construct(array $args)
	{
		if (isset($args["rgb"]))
		{
			$this->red = ($args["rgb"] >> 16) & 255;
			$this->green = ($args["rgb"] >> 8) & 255;
			$this->blue = $args["rgb"] & 255;
		}
		if (isset($args["red"]))
			if (((int)$args["red"]) > 0 && ((int)$args["red"] < 256))
				$this->red = $args["red"];
		if (isset($args["green"]))
			if (((int)$args["green"]) > 0 && ((int)$args["green"] < 256))
				$this->green = $args["green"];
		if (isset($args["blue"]))
			if (((int)$args["blue"]) > 0 && ((int)$args["blue"] < 256))
				$this->blue = $args["blue"];
		if (self::$verbose == TRUE)
			print($this . " constructed". PHP_EOL);
	}

	/*Destructor*/
	function __destruct()
	{
		if (self::$verbose == TRUE)
			print($this . " destructed" . PHP_EOL);
	}

	/*Functions*/
	public static function doc()
	{
		return (file_get_contents("Color.doc.txt"));
	}

	function __toString()
	{
		return (sprintf("Color(red: %3d, green: %3d, blue: %3d)",
							$this->red, $this->green, $this->blue));
	}

	public function add(Color $colorObj)
	{
		return new Color
		(
			array
			(
				"red" => ($colorObj->red + $this->red),
				"green" => ($colorObj->green + $this->green),
				"blue" => ($colorObj->blue + $this->blue)
			)
		);
	}

	public function sub(Color $colorObj)
	{
		return new Color
		(
			array
			(
				"red" => ($this->red - $colorObj->red),
				"green" => ($this->green - $colorObj->green),
				"blue" => ($this->blue - $colorObj->blue)
			)
		);
	}

	/*
	//Don't know if it should be
	//colorObj * this
	//-OR-
	//this * colorObj
	public function mult(Color $colorObj)
	{
		return new Color(
			array(
				"red" => ($this->red * $colorObj->red),
				"green" => ($this->green * $colorObj->green),
				"blue" => ($this->blue * $colorObj->blue)
			);
		);
	}
	*/

	public function mult($multiplier)
	{
		return new Color
		(
			array
			(
				"red" => ($this->red * $multiplier),
				"green" => ($this->green * $multiplier),
				"blue" => ($this->blue * $multiplier)
			)
		);
	}
}
?>
