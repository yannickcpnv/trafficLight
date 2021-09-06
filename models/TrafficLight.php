<?php

namespace TrafficLight\Models;

require 'models/LightState.php';
require 'models/LampState.php';

class TrafficLight
{

    //region Fields
    private int $red;
    private int $yellow;
    private int $green;
    private int $lightState;
    //endregion

    //region Constructors
    public function __construct($lightState)
    {
        $this->red = 0;
        $this->yellow = 2;
        $this->green = 0;
        $this->lightState = $lightState;
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
     * @return int
     */
    public function getLightState(): int
    {
        return $this->lightState;
    }

    //endregion

    /**
     * @param int $lightState
     */
    public function setLightState(int $lightState): void
    {
        $this->lightState = $lightState;

        switch ($this->lightState) {
            case LightState::STOP:
                $this->red = LampState::ON;
                $this->yellow = LampState::OFF;
                $this->green = LampState::OFF;
                break;
            case LightState::PREPARATION:
                $this->red = LampState::ON;
                $this->yellow = LampState::ON;
                $this->green = LampState::OFF;
                break;
            case LightState::CIRCULATE:
                $this->red = LampState::OFF;
                $this->yellow = LampState::OFF;
                $this->green = LampState::ON;
                break;
            case LightState::WARNING:
                $this->red = LampState::OFF;
                $this->yellow = LampState::ON;
                $this->green = LampState::OFF;
                break;
            case LightState::OOS:
            default:
                $this->red = LampState::OFF;
                $this->yellow = LampState::OOS;
                $this->green = LampState::OFF;
                break;
        }
    }

    /**
     * Change to the next light state.
     */
    public function nextState()
    {
        switch ($this->lightState) {
            case LightState::STOP:
                $this->setLightState(LightState::PREPARATION);
                break;
            case LightState::PREPARATION:
                $this->setLightState(LightState::CIRCULATE);
                break;
            case LightState::CIRCULATE:
                $this->setLightState(LightState::WARNING);
                break;
            case LightState::WARNING:
            case LightState::OOS:
                $this->setLightState(LightState::STOP);
                break;
        }
    }

    /**
     * Set the light to HS.
     */
    public function stop()
    {
        $this->setLightState(LightState::OOS);
    }
}
