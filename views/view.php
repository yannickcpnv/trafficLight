<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Traffic Light</title>
    <style>
      .dot {
        height: 100px;
        width: 100px;

        border-radius: 50%;
        display: block;
      }
    </style>
</head>
<body>
    <div>
        <?php
        /** @var $trafficLight TrafficLight\Models\TrafficLight */ ?>
        <!--<span class="dot" style="background-color: red;"></span>
        <span class="dot" style="background-color: yellow;"></span>
        <span class="dot" style="background-color: green;"></span>-->

        <span class="dot" style="background-color: #bbb;"></span>
        <span class="dot" style="background-color: #bbb;"></span>
        <span class="dot" style="background-color: #bbb;"></span>

        <form action="../index.php" method="post">
            <input type="hidden" name="sequence" value="<?php
            echo 'ok' ?>">
            <input type="submit" value="Change">
        </form>
    </div>
</body>
</html>
