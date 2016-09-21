<?php
class Color
{
	public static $verbose;
	public $red;
	public $green;
	public $blue;

	$verbose = FALSE;
	$red = 0;
	$green = 0;
	$blue = 0;

	function __construct(array $args)
	{
		if ($args['rgb'])
		{
			$this->red = ($args['rgb'] >> 16) & 255;
			$this->green = ($args['rgb'] >> 8) & 255;
			$this->blue = $args['rgb'] & 255;
		}
		if ($args['red'])
			$this->red = $args['red'];
		if ($args['green'])
			$this->green = $args['green'];
		if ($args['blue'])
			$this->blue = $args['blue'];
		if (self::verbose == TRUE)
			self.__toString();
	}

	function __destruct()
	{
		if (self::verbose == TRUE)
			self.__toString();
	}

	public static function doc()
	{
		return (file_get_contents("./Color.doc.txt"));
	}

	function __toString()
	{
		return (sprintf("Color(red: %3d, green: %3d, blue: %3d) destructed.",
				$this->red, $this->green, $this->blue));
	}

	public function add(Color $colorObj)
	{
		return new Color(
			array(
				"red" => ($colorObj->red + $this->red),
				"green" => ($colorObj->green + $this->green),
				"blue" => ($colorObj->blue + $this->blue)
			);
		);
	}

	public function sub(Color $colorObj)
	{
		return new Color(
			array(
				"red" => ($colorObj->red - $this->red),
				"green" => ($colorObj->green - $this->green),
				"blue" => ($colorObj->blue - $this->blue)
			);
		);
	}

	public function mult($multiplier)
	{
		return new Color(
			array(
				"red" => ($this->red * $multiplier),
				"green" => ($this->green * $multiplier),
				"blue" => ($this->blue * $multiplier)
			);
		);
	}
}
?>
