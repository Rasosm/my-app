<?php

// require __DIR__ . '/Kibiras1.php';

// $k1 = new Kibiras1;
// $k2 = new Kibiras1;
// $k3 = new Kibiras1;

// $k1->pridetiAkmeni();
// $k2->pridetiDaugAkmenu(8);

// $k1->kiekPririnktaAkmenu();
// $k2->kiekPririnktaAkmenu();
// $k3->kiekPririnktaAkmenu();

require __DIR__ . '/Pinigine.php';

$p = new Pinigine;

$p->ideti(9);
$p->ideti(1);

$p->skaiciuoti();

require __DIR__ . '/Kibiras2.php';

// Kibiras2:: akmenuKiekisVisuoseKibiruose();

// $k1 = new Kibiras2;
// $k2 = new Kibiras2;
// $k3 = new Kibiras2;

// $k1->pridetiAkmeni();
// $k2->pridetiDaugAkmenu(8);

// $k1->kiekPririnktaAkmenu();
// $k2->kiekPririnktaAkmenu();
// $k3->kiekPririnktaAkmenu();
// Kibiras2:: akmenuKiekisVisuoseKibiruose();

require __DIR__ . '/Kibiras3.php';
require __DIR__ . '/KibirasNePo1.php';

$k1 = new KibirasNePo1;
$k2 = new KibirasNePo1;
$k3 = new KibirasNePo1;

$k1->pridetiAkmeni();
$k2->pridetiDaugAkmenu(8);
$k3->pridetiAkmeni();
$k3->pridetiAkmeni();
$k3->pridetiAkmeni();

$k1->kiekPririnktaAkmenu();
$k2->kiekPririnktaAkmenu();
$k3->kiekPririnktaAkmenu();

require __DIR__ . '/Grybas.php';
require __DIR__ . '/Krepsys.php';

$kr = new Krepsys;

while ($kr->grybauti(new Grybas) ){}

print_r($kr);