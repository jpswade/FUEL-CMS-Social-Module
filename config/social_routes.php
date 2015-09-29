<?php

$path = 'social';

$controllers = array('icons');

foreach ($controllers as $c) {
    $route[FUEL_ROUTE . $path . '/' . $c] = FUEL_FOLDER . '/module';
    $route[FUEL_ROUTE . $path . '/' . $c . '/(.*)'] = FUEL_FOLDER . '/module/$1';
}