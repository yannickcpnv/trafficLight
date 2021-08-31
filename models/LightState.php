<?php

namespace TrafficLight\Models;

abstract class LightState
{

    const STOP        = 0;
    const WARNING     = 1;
    const CIRCULATE   = 2;
    const PREPARATION = 3;
    const OOS         = 4;
}
