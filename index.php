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
    "shelly.roller" => function ($ip, $index) {
        echo "<button onclick='Roller.open(`".$ip."`, ".$index.")' >Jalousie hoch</button>";
        newline();
        echo "<button onclick='Roller.close(`".$ip."`, ".$index.")' >Jalousie runter</button>";
        newline();
    },
    "shelly.relay" => function ($ip, $index) {
        echo "<button onclick='Relay.on(`".$ip."`, ".$index.")' >Licht an</button>";
        newline();
        echo "<button onclick='Relay.off(`".$ip."`, ".$index.")' >Licht aus</button>";
        newline();
        echo "<button onclick='Relay.toggle(`".$ip."`, ".$index.")' >Licht umschalten</button>";
        newline();
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
            $devicetypes[$device->type]($device->ip, $device->index);
        } else {
            echo("Der Gerätetyp <i>".$device->type."</i> existiert nicht...");
        }
    }


}

?>
</body>
</html>



