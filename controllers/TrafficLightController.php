<?php

namespace TrafficLight\Controllers;

require 'models/TrafficLight.php';

use TrafficLight\Models\TrafficLight;

class TrafficLightController
{

    private TrafficLight $trafficLight;

    /**
     * @param TrafficLight $trafficLight
     */
    public function __construct(TrafficLight $trafficLight) { $this->trafficLight = $trafficLight; }

    /**
     * Change light to next state.
     */
    public function next()
    {
        $this->trafficLight->nextState();

        require 'views/home.php';
    }

    /**
     * Change light to OOS state.
     */
    public function oos()
    {
        $this->trafficLight->stop();

        require 'views/home.php';
    }
}
