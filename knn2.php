<?php

require_once 'vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;

$samples = [['vento', 'nublado', 'frio'], ['vento', 'claro', 'frio'], ['sem-vento', 'claro', 'frio'], ['sem-vento', 'nublado', 'calor']];
$labels = ['chove', 'sol', 'sol', 'sol'];

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

$result = $classifier->predict(['vento', 'claro', 'calor']);

var_dump($result);
