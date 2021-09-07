<?php

namespace TrafficLight\Models;

require 'models/LightState.php';
require 'models/LampState.php';

class TrafficLight
{

    //region Fields
    private int   $red;
    private int   $yellow;
    private int   $green;
    private int   $state;
    private float $duration;
    //endregion

    //region Constructors
    public function __construct($lightState)
    {
        $this->red = 0;
        $this->yellow = 2;
        $this->green = 0;
        $this->state = $lightState;
    }
    //endregion

    //region Accessors
    /**
     * @return int
     */
    public function getRed(): int { return $this->red; }

    /**
     * @return mixed
     */
    public function getYellow(): int { return $this->yellow; }

    /**
     * @return mixed
     */
    public function getGreen(): int { return $this->green; }

    /**
     * @return int
     */
    public function getState(): int { return $this->state; }

    /**
     * @param int $state
     */
    public function setState(int $state)
    {
        $this->state = $state;

        switch ($this->state) {
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

    public function getDuration(): float
    {
        $this->duration = 1000 * match ($this->getState()) {
                LightState::STOP => 3,
                LightState::WARNING => 2,
                LightState::CIRCULATE => 1,
                LightState::PREPARATION => 1.5,
                default => 0,
            };

        return $this->duration;
    }
    //endregion

    //region Methods
    /**
     * Change to the next light state.
     */
    public function nextState()
    {
        switch ($this->state) {
            case LightState::STOP:
                $this->setState($this->isHourStoppable() ? LightState::OOS : LightState::PREPARATION);
                break;
            case LightState::PREPARATION:
                $this->setState(LightState::CIRCULATE);
                break;
            case LightState::CIRCULATE:
                $this->setState($this->isHourStoppable() ? LightState::OOS : LightState::WARNING);
                break;
            case LightState::WARNING:
            case LightState::OOS:
                $this->setState(LightState::STOP);
                break;
        }
    }

    /**
     * Set the light to HS.
     */
    public function stop($isManual = null)
    {
        switch ($this->state) {
            case LightState::STOP:
            case LightState::CIRCULATE:
                if ($this->isStateStoppable()) {
                    $this->setState(LightState::OOS);
                }
                break;
            default:
                break;
        }
    }

    /**
     * If the state can be OOS.
     *
     * @return bool
     */
    public function isStateStoppable(): bool
    {
        return $this->state == LightState::STOP || $this->state == LightState::CIRCULATE;
    }

    /**
     * Convert to JSON with values needed in javascript.
     *
     * @return bool|string
     */
    public function toJSON(): bool|string
    {
        return json_encode([
                               'state'           => $this->getState(),
                               'duration'        => $this->getDuration(),
                               'isHourStoppable' => $this->isHourStoppable(),
                           ]);
    }

    private function isHourStoppable(): bool
    {
        $currentTime = strtotime(date('H:i'));
        $startSlot = strtotime('13:15');
        $endSlot = strtotime('13:27');

        return $currentTime >= $startSlot && $currentTime <= $endSlot;
    }
    //endregion
}
