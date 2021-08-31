<?php
/** @var $trafficLight TrafficLight\Models\TrafficLight */

use TrafficLight\Models\LampState;

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
    <div class="row">
        <div>
            <span class="dot <?= $trafficLight->getRed() == LampState::ON ? 'l-red' : 'off' ?>"></span>
            <span class="dot <?= $trafficLight->getYellow() == LampState::ON ? 'l-yellow' : 'off' ?>"></span>
            <span class="dot <?= $trafficLight->getGreen() == LampState::ON ? 'l-green' : 'off' ?>"></span>
        </div>
    </div>


    <a
      class="btn btn-primary"
      href="index.php?action=next&l-sequence=<?= $trafficLight->getLightState() ?>"
    >Suivant</a>
</body>
</html>
