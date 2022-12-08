<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Smarthome</title>
    <script src="calls.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
function linebreak(){
    echo "<br>";
}
function newline(){
    echo "\n";
}


$devicetypes = [
    "shelly.roller" => function ($device) {
        echo "<button onclick='Control.Shelly.Roller.open(`".$device->ip."`, ".$device->index.")' >Jalousie hoch</button>";
        newline();
        echo "<button onclick='Control.Shelly.Roller.close(`".$device->ip."`, ".$device->index.")' >Jalousie runter</button>";
        newline();
    },
    "shelly.relay" => function ($device) {
        echo "<button onclick='Control.Shelly.Relay.on(`".$device->ip."`, ".$device->index.")' >Licht an</button>";
        newline();
        echo "<button onclick='Control.Shelly.Relay.off(`".$device->ip."`, ".$device->index.")' >Licht aus</button>";
        newline();
        echo "<button onclick='Control.Shelly.Relay.toggle(`".$device->ip."`, ".$device->index.")' >Licht umschalten</button>";
        newline();
    },
    "shelly.dimmer" => function ($device) {
        echo("<div id='".$device->ip."-".$device->index."'><script>dimmer('".$device->ip."', '".$device->index."')</script></div>");
    }
];

$devices = json_decode(file_get_contents("devices.json"));

foreach ($devices as $room) {

    echo "<h1>".$room->name."</h1>";
    newline();

    foreach ($room->devices as $device) {
        echo "<h2>".$device->name."</h2>";
        newline();

        if (key_exists($device->type, $devicetypes)) {
            $devicetypes[$device->type]($device);
        } else {
            echo("Der Gerätetyp <i>".$device->type."</i> existiert nicht...");
        }
    }

}

?>
</body>
</html>



