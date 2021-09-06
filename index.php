<?php

use TrafficLight\Models\LightState;
use TrafficLight\Models\TrafficLight;
use TrafficLight\Controllers\TrafficLightController;

require 'controllers/TrafficLightController.php';

// For debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');

$action = $_GET['action'] ?? null;
$trafficLight = new TrafficLight($_GET['l-sequence'] ?? LightState::STOP);
$trafficLightController = new TrafficLightController($trafficLight);

switch ($action) {
    case 'next':
        $trafficLightController->next();
        break;
    case 'oos':
    default:
        $trafficLightController->oos();
        break;
}
