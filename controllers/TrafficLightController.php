<?php

namespace TrafficLight\Controllers;

require 'models/TrafficLight.php';

use TrafficLight\Models\TrafficLight;

class TrafficLightController
{

    public function next()
    {
        $trafficLight = new TrafficLight();
        if (isset($_SESSION['l-sequence'])) {
            $trafficLight->setLightState($_SESSION['l-sequence']);
        }
        $trafficLight->nextState();
        $_SESSION['l-sequence'] = $trafficLight->getLightState();

        require 'views/home.php';
    }

    public function oos()
    {
    }
}
