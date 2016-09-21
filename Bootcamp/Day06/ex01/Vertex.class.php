<?php
require_once("Color.class.php");

class Vertex
{
	/*Properties*/
	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;

	/*Constructor*/
	function __construct(array $args)
	{
		if ((isset($args["x"])) && (isset($args["y"])) && (isset($args["z"])))
		{
			$this->_x = $args["x"];
			$this->_y = $args["y"];
			$this->_z = $args["z"];
			if (isset($args["w"]))
				$this->_w = $args["w"];
			if (isset($args["color"]))
			{
				$this->_color = $args["color"];
			}
			else
			{
				$this->_color = new Color
				(
					array
					(
						"red" => 255,
						"green" => 255,
						"blue" => 255
					)
				);
			}
			if (self::$verbose == TRUE)
				print($this . " constructed." . PHP_EOL);
		}
		else
		{
			print("Error:Requires at least the x, y and z coordinates." . PHP_EOL);
		}
	}

	/*Destructor*/
	function __destruct()
	{
		if (self::$verbose == TRUE)
			print($this . " destructed." . PHP_EOL);
	}

	/*Methods*/
	public static function doc()
	{
		return (file_get_contents("Vertex.doc.txt"));
	}

	function __toString()
	{
		$vstring = sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f",
							$this->_x, $this->_y, $this->_z, $this->_w);
		if (self::$verbose == TRUE)
			$vstring .= sprintf(", %s )", $this->_color);
		else
			$vstring .= " )";
		return ($vstring);
	}

	public function getX() { return ($this->_x); }

	public function getY() { return ($this->_y); }

	public function getZ() { return ($this->_z); }

	public function getW() { return ($this->_w); }

	public function getColor() { return ($this->_color); }

	public function setX($num) { $this->_x = $num; }

	public function setY($num) { $this->_y = $num; }

	public function setZ($num) { $this->_z = $num; }

	public function setW($num) { $this->_w = $num; }

	public function setColor(Color $color) { $this->_color = $color; }
}
?>
