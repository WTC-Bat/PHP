<?php
require_once("Vertex.class.php");

class Vector
{
	/*Properties*/
	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w;

	/*Constructor*/
	function __construct(array $args)
	{
		if (isset($args["dest"]))
		{
			$origin;
			$dest = $args["dest"];
			if (isset($args["orig"]) == FALSE)
			{
				$origin = new Vertex
				(
					array
					(
						"x" => 0,
						"y" => 0,
						"z" => 0,
						"w" => 1.0
					)
				);
			}
			else
			{
				$origin = $args["orig"];
			}
			$this->_x = (($dest->getX()) - ($origin->getX()));
			$this->_y = (($dest->getY()) - ($origin->getY()));
			$this->_z = (($dest->getZ()) - ($origin->getZ()));
			$this->_w = (($dest->getW()) - ($origin->getW()));
		}
		if ($this->verbose == TRUE)
		{
			printf("%s constructed" . PHP_EOL, $this);
		}
	}

	/*Destruct*/
	function __destruct()
	{
		if ($this->verbose == TRUE)
		{
			printf("%s destructed" . PHP_EOL, $this);
		}
	}

	/*Functions*/
	function __toString()
	{
		return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w));
	}

	public static function doc()
	{
		return (file_get_contents("Vector.doc.txt"));
	}

	public function add($vect)
	{
		$ax = $this->_x + $vect->getX();
		$ay = $this->_y + $vect->getY();
		$az = $this->_z + $vect->getZ();
		$vtex = new Vertex(array("x" => $ax, "y" => $ay, "z" => $az));
		return new Vector(array("dest" => $vtex));
	}

	public function cos()
	{

	}

	public function crossProduct($vect)
	{
		$px = ($this->_y * $vect->_z) - ($this->_z * $vect->_y);
		$py = ($this->_z * $vect->_x) - ($this->_x * $vect->_z);
		$pz = ($this->_x * $vect->_y) - ($this->_y * $this->_x);
		$vtex = new Vertex(array("x" => $px, "y" => $py, "z" => $pz));
		return (new Vector(array("dest" => $vtex)));
	}

	public function dotProduct($vect)
	{
		$fx = ($this->_x * $vect->getX());
		$fy = ($this->_y * $vect->getY());
		$fz = ($this->_z * $vect->getZ());
		return ((float)($fx + $fy + $fz));
	}

	public function magnitude()
	{
		$powx = pow($this->_x, 2);
		$powy = pow($this->_y, 2);
		$powz = pow($this->_z, 2);
		return (sqrt($powx + $powy + $powz));
	}

	public function normalize()
	{
		$nx;
		$ny;
		$nz;
		$vtex;
		$mag = $this->magnitude();
		if ($mag == 1)
			return clone ($this);
		else
		{
			$nx = ($this->getX() / $mag);
			$ny = ($this->getY() / $mag);
			$nz = ($this->getZ() / $mag);
			$vtex = new Vertex(array("x" => $nx, "y" => $ny, "z" => $nz));
			return (new Vector(array("dest" => $vtex)));
		}
	}

	public function opposite()
	{
		$ox = -$this->_x;
		$oy = -$this->_y;
		$oz = -$this->_z;
		$vtex = new Vertex(array("x" => $ox, "y" => $oy, "z" => $oz));
		return (new Vector(array("dest" => $vtex)));
	}

	public function scalarProduct($scalar)
	{
		$px = $this->_x * $scalar;
		$py = $this->_y * $scalar;
		$pz = $this->_z * $scalar;
		$vtex = new Vertex(array("x" => $px, "y" => $py, "z" => $pz));
		return (new Vector(array("dest" => $vtex)));
	}

	public function sub($vect)
	{
		$sx = $this->_x - $vect->getX();
		$sy = $this->_y - $vect->getY();
		$sz = $this->_z - $vect->getZ();
		$vtex = new Vertex(array("x" => $sx, "y" => $sy, "z" => $sz));
		return new Vector(array("dest" => $vtex));
	}

	public function getX()
	{
		return ($this->_x);
	}

	public function getY()
	{
		return ($this->_y);
	}

	public function getZ()
	{
		return ($this->_z);
	}

	public function getW()
	{
		return ($this->_w);
	}
}
?>
