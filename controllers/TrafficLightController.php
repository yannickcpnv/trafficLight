<?php

namespace TrafficLight\Controllers;

use TrafficLight\Models\TrafficLight;

class TrafficLightController
{

    public function getHomePage()
    {
        $trafficLight = new TrafficLight();
        require 'views/view.php';
    }
}
