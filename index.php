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

$devices = json_decode(file_get_contents("devices.json"));

foreach ($devices as $room) {

    echo "<h1>".$room->name."</h1>";
    newline();

    foreach ($room->devices as $device) {
        echo "<h2>".$device->name."</h2>";
        newline();

        if ($device->type == "shelly.roller") {
            echo "<button onclick='Roller.open(`".$device->ip."`, ".$device->index.")' >Jalousie hoch</button>";
            newline();
            echo "<button onclick='Roller.close(`".$device->ip."`, ".$device->index.")' >Jalousie runter</button>";
            newline();
        }

        if ($device->type == "shelly.relay") {
            echo "<button onclick='Relay.on(`".$device->ip."`, ".$device->index.")' >Licht an</button>";
            newline();
            echo "<button onclick='Relay.off(`".$device->ip."`, ".$device->index.")' >Licht aus</button>";
            newline();
            echo "<button onclick='Relay.toggle(`".$device->ip."`, ".$device->index.")' >Licht umschalten</button>";
            newline();
        }

    }


}

?>
</body>
</html>



