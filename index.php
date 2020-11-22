<?php include 'app.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="http://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png" type="image/x-icon">
</head>

<body>
    <div class="location">
        <h1 class="location-timezone"><?php echo $timezone; ?></h1>
        <img class="location-icon" src="http://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png">
    </div>
    <div class="temperature">
        <div class="degree-section">
            <h2 class="temperature-degree"><?php echo (int)$degree; ?></h2>
            <span>ºC</span>
        </div>
        <div class="temperature-description"><?php echo strtoupper($Ddegree); ?></div>
    </div>
</body>

</html>