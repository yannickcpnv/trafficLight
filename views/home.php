<?php
/** @var $trafficLight \TrafficLight\Models\TrafficLight */

/** @var $this \TrafficLight\Controllers\TrafficLightController */

use TrafficLight\Models\LampState;
use TrafficLight\Models\LightState;

ob_start();

$isOOS = $this->trafficLight->getState() == LightState::OOS;
?>

<div id="light-js" data-traffic-light="<?= htmlspecialchars($this->trafficLight->toJSON()) ?>"></div>

<div class="d-flex justify-content-center mt-1">
    <div class="d-flex flex-column">
        <div class="light mb-1">
            <span class="dot <?= $this->trafficLight->getRed() == LampState::ON ? 'l-red' : 'off' ?>"></span>
            <?php
            if ($isOOS):
                ?>
                <span class="dot l-yellow blink"></span>
            <?php
            else: ?>
                <span class="dot <?= $this->trafficLight->getYellow() == LampState::ON ? 'l-yellow' : 'off'
                ?>"></span>
            <?php
            endif ?>
            <span class="dot <?= $this->trafficLight->getGreen() == LampState::ON ? 'l-green' : 'off' ?>"></span>
        </div>

        <?php
        if ($isOOS): ?>
            <a
              class="btn btn-primary align-self-center mb-1"
              href="/index.php?action=next&lastState=<?= LightState::OOS ?>"
            >
                Suivant
            </a>
        <?php
        endif;
        if ($this->trafficLight->isStateStoppable()): ?>
            <a
              class="btn btn-warning align-self-center"
              href="/index.php?action=oos&l-sequence=<?= $this->trafficLight->getState() ?>"
            >
                Hors service
            </a>
        <?php
        endif ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once "views/includes/layout.php";
?>
