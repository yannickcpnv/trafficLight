<?php

namespace TrafficLight\Controllers;

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

$sessionController = new SessionController();
$sessionController->createSession();

$trafficLightController = new TrafficLightController();
$trafficLightController->getHomePage();
