<?php 

class  Computer 
{
public static $nr_of_computers = 0;

public static function getNrOfComputers () {
    return static::$nr_of_computers;
}

public static function clearNrOfComputers () {
    static::$nr_of_computers = 0;
}

public static function makeNewObject () {
    echo "Making object of class" . static::class;
    return new static; //creates an object of this class
}



    public $model = null;
    public $operating_system = null;
    public $is_portable = false;
    public $status = 'off';

public function __construct() {
    static::$nr_of_computers = 0;
}

public function switchedOff (){
    $this->status = "off";
}

public function toggleSwitch (){
    
    if ($this->status === "off") {
        $this->status = "on";
    } else {
        $this->status = "off";
    }
}


}