<?php

namespace TrafficLight\Models;

class TrafficLight
{

    //region Fields
    private int $red;
    private int $green;
    private int $yellow;
    private int $lightState;
    //endregion

    //region Constructors
    public function __construct()
    {
        $this->red = 0;
        $this->green = 0;
        $this->yellow = 2;
        $this->lightState = LightState::HS;
    }
    //endregion

    //region Accessors

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @param mixed $red
     */
    public function setRed(int $red)
    {
        $this->red = $red;
    }

    /**
     * @return mixed
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @param mixed $green
     */
    public function setGreen(int $green)
    {
        $this->green = $green;
    }

    /**
     * @return mixed
     */
    public function getYellow(): int
    {
        return $this->yellow;
    }

    /**
     * @param mixed $yellow
     */
    public function setYellow(int $yellow)
    {
        $this->yellow = $yellow;
    }

    /**
     * @return int
     */
    public function getLightState(): int
    {
        return $this->lightState;
    }

    /**
     * @param int $lightState
     */
    public function setLightState(int $lightState): void
    {
        $this->lightState = $lightState;
    }
    //endregion
}
