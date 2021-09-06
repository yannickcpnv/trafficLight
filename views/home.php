<?php
/** @var $trafficLight \TrafficLight\Models\TrafficLight */
/** @var $this \TrafficLight\Controllers\TrafficLightController */

use TrafficLight\Models\LampState;
use TrafficLight\Models\LightState;

$isOOS = $this->trafficLight->getLightState() == LightState::OOS;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Traffic Light</title>
    <link rel="stylesheet" href="/views/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center mt-1">
        <div class="d-flex flex-column">
            <div class="light mb-1">
                <span class="dot <?= $this->trafficLight->getRed() == LampState::ON ? 'bg-danger' : 'off' ?>"></span>
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
                <span class="dot <?= $this->trafficLight->getGreen() == LampState::ON ? 'bg-success' : 'off' ?>"></span>
            </div>

            <a
              class="btn btn-primary align-self-center mb-1"
              href="index.php?action=next&l-sequence=<?= $this->trafficLight->getLightState() ?>"
            >
                Suivant
            </a>

            <?php
            if (!$isOOS): ?>
                <a
                  class="btn btn-warning align-self-center"
                  href="index.php?action=oos"
                >
                    Hors service
                </a>
            <?php
            endif ?>
        </div>
    </div>
</body>
</html>
