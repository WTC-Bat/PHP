<?php
class Color
{
	/*Properties*/
	public static $verbose;
	public $red;
	public $green;
	public $blue;

	/*Property Initialization*/
	$verbose = FALSE;
	$red = 0;
	$green = 0;
	$blue = 0;

	/*Constructor*/
	function __construct(array $args)
	{
		if ($args['rgb'])
		{
			$this->red = ($args['rgb'] >> 16) & 255;	// % 256?
			$this->green = ($args['rgb'] >> 8) & 255;	// % 256?
			$this->blue = $args['rgb'] & 255;			// % 256?
		}
		if ($args['red'])							//if (isset($args['red']))?
			$this->red = $args['red'];
		if ($args['green'])							//if (isset($args['red']))?
			$this->green = $args['green'];
		if ($args['blue'])							//if (isset($args['red']))?
			$this->blue = $args['blue'];
		if (self::verbose == TRUE)
			self.__toString();
		/*
		if (self::verbose == TRUE)
		{
			printf("Color(red: %3d, green: %3d, blue: %3d) constructed.",
					$this->red, $this->green, $this->blue);
		}
		*/
	}

	/*Destructor*/
	function __destruct()
	{
		if (self::verbose == TRUE)
			self.__toString();
		/*
		if (self::verbose == TRUE)
		{
			printf("Color(red: %3d, green: %3d, blue: %3d) destructed.",
					$this->red, $this->green, $this->blue);
		}
		*/
	}

	/*Methods*/
	public static function doc()
	{
		return (file_get_contents("./Color.doc.txt"));
	}

	function __toString()
	{
		return (sprintf("Color(red: %3d, green: %3d, blue: %3d) destructed.",
				$this->red, $this->green, $this->blue))
	}

	//Don't know if it should be
	//colorObj + this
	//-OR-
	//this + colorObj
	public function add(Color $colorObj)
	{
		return new Color
		(
			array
			(
				"red" => ($colorObj->red + $this->red),
				"green" => ($colorObj->green + $this->green),
				"blue" => ($colorObj->blue + $this->blue)
			);
		);

		//return new Color(array())	<- array may need to have the ( after it.
	}

	//Don't know if it should be
	//colorObj - this
	//-OR-
	//this - colorObj
	public function sub(Color $colorObj)
	{
		return new Color
		(
			array
			(
				"red" => ($colorObj->red - $this->red),
				"green" => ($colorObj->green - $this->green),
				"blue" => ($colorObj->blue - $this->blue)
			);
		);
	}

	//Don't know if it should be
	//colorObj * this
	//-OR-
	//this * colorObj
	public function mult(Color $colorObj)
	{
		return new Color
		(
			array
			(
				"red" => ($this->red * $colorObj->red),
				"green" => ($this->green * $colorObj->green),
				"blue" => ($this->blue * $colorObj->blue)
			);
		);
	}
}
?>
