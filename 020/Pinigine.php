<?php

class Pinigine {

    private $popieriniaiPinigai;
    private $metaliniaiPinigai;

    public function __construct()
    {
        $this->popieriniaiPinigai = 0;
        $this->metaliniaiPinigai = 0;
    }
    
    public function ideti(int $kiekis) : void
    {
        if($kiekis > 2){
            $this->popieriniaiPinigai += $kiekis;
        }else{
            $this->metaliniaiPinigai += $kiekis;
        }
        
    }
    public function skaiciuoti() : void
    {
        echo '<h1>Popieriniai: '.$this->popieriniaiPinigai.'</h1>';
        echo '<h1>Metaliniai: '.$this->metaliniaiPinigai.'</h1>';
    }
}