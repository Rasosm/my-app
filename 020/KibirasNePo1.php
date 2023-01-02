<?php

class KibirasNePo1 extends Kibiras3 {

    protected $akmenuKiekis;
    
    public function pridetiAkmeni() : void
    {
        $this->akmenuKiekis += rand(2,5);
        
        
    }
}