<?php

require_once 'vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;
use Phpml\ModelManager;

$samples = [['vento', 'nublado', 'frio'], ['vento', 'claro', 'frio'], ['sem-vento', 'claro', 'frio'], ['sem-vento', 'nublado', 'calor']];
$labels = ['chove', 'sol', 'sol', 'sol'];

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

$filepath = './model/knn/knn2.model';
$modelManager = new ModelManager();
$modelManager->saveToFile($classifier, $filepath);

$restoredClassifier = $modelManager->restoreFromFile($filepath);
$result = $restoredClassifier->predict(['vento', 'claro', 'calor']);

var_dump($result);
