<?php

use TrafficLight\Controllers\TrafficLightController;

session_start();
require 'controllers/TrafficLightController.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

$trafficLightController = new TrafficLightController();
$action = $_GET['action'] ?? null;

switch ($action) {
    case 'next':
    default:
        $trafficLightController->next();
        break;
}
