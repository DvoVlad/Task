<?php
class Rectangle {
    private $height;
    private $width;
    private $x1;
    private $y1;
    private $x2;
    private $y2;
    private $x3;
    private $y3;
    private $x4;
    private $y4;
    public $Sresult;
    
    public function __construct($height, $width, $x1, $y1) {
        $this->height = $height;
        $this->width = $width;
        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $this->x1;
        $this->y2 = $this->y1 + $this->height;
        $this->x3 = $this->x1 + $this->width;
        $this->y3 = $this->y1;
        $this->x4 = $this->x1 + $this->width;
        $this->y4 = $this->y1 + $this->height;
    }
    
    public function S() {
        if(($this->height != 0)&&($this->width != 0)) {
            $this ->Sresult = $this->height * $this->width;
            return $this ->Sresult;
        }else{
			return 0;
		}
    }
}

class Circle {
    private $Rad;
    private $x;
    private $y;
    
    public $Sresult;
    
    public function __construct($rad, $x, $y) {
        $this->Rad = $rad;
        $this->x = $x;
        $this->y = $y;
    }
    
    public function S() {
        $this->Sresult = 3,14 * sqr($Rad);
    }
}

class Pyramid {
    private $h
    private $height;
    private $width;
    private $a;
    
    public $Sresult;
    
    public function __construct($h, $a, $width, $height) {
        $P = 2*($width + $height);
        $this->a = $a;
        $this->Sresult = 1/2*$P*$this->a;
    }
    
    public function S(){
        if(($this->Sresult != 0) && ($height !=0) && ($width !=0) && ($this->a!=0) && ($this->h!=0)) {
            return $this->Sresult;
        } else {
            return 0;
		}
	}
}

class RandCreator{
    private $randType;
    
    public $figures = Array();
    
    public __construct() {
		$this->rand();   
    }
    
    public function createFigure() {
        switch($randType) {
            case 1:
                $height = rand(1,100);
                $width = rand(1,100);
                $x1 = rand(1,100);
                $y1 = rand(1,100);
                $this->figures[] = new Rectangle($height, $width, $x1, $y1);
            break;
            case 2:
				$rad = rand(1,100)
				$x = rand(1,10);
				$y = rand(1,10);
				$this->figures[] = new Circle($rad, $x, $y);
            break;
            case 3:
                $h = rand(1,100)
                $a = rand(1,100)
                $width = rand(1,100)
                $height = rand(1,100)
                $this->figures[] = new Pyramid($h, $a, $width, $height);
            break;
        }
    }
    
    public rand() {
        $this->randType = rand(1,3);
    }
    
    public function sort() {
        foreach($this->figures as &$n => $obj) {
        	$n = $obj->Sresult;	
        }
        krsort($this->figures);
        $num = 0;
        foreach($this->figures; as &$n => $obj) {
        	$n = $num;
        	$num++;	
        }
        
        echo '<pre>';
        print_r($this->figures);
        echo '</pre>';	    
    }
    
    public function serializeToFile(){
		$ser = serialize($this->figures);
        file_put_contents('serialize.txt', $ser);
    }
    
    public function unserializeFromFile(){
        $ser = file_get_contents('serialize.txt');
        return unserialize($ser); 
    }
}
