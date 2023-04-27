<?php

namespace App\Service;

class Bike
{
    private int $weehls;
    public int $gears;
    private string $name;


    public function __construct($name){
        echo "I am called";
        $this->name = $name;
    }
    public function drive(){
        echo 'I am driving';
    }
    public function setWheels(int $weehls){
        $this->weehls =  $weehls;
    }
    public function getWheels(){
//        $this->weehls =  $weehls;
        return $this->weehls;
    }


}
