<?php

class Kibiras3 {

    protected $akmenuKiekis;

    public function __construct()
    {
        $this->akmenuKiekis = 0;
    }

    public function pridetiAkmeni() : void
    {
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu(int $kiekis) : void
    {
        $this->akmenuKiekis =+ $kiekis;
    }

    public function kiekPririnktaAkmenu() : void
    {
        echo '<h1>Pririnkta: '.$this->akmenuKiekis.'</h1>';
    }
}