<?php

require_once __DIR__ . '/classes/Elevator.php';
require_once __DIR__ . '/classes/Building.php';

//Create building with floors
$building = Building::getBuilding();
$building->setMaxFloor(10);
$building->setMinFloor(1);
//Create elevator for building
$client = new Elevator($building);

$client->callElevator(
    [
        'clientFloor' => 4,
        'elevatorButton' => 'up',
        'needfullFloor' => 7,
    ]
);

$client->callElevator(
    [
        'clientFloor' => 2,
        'elevatorButton' => 'down',
        'needfullFloor' => 1,
    ]
);

$client->callElevator(
    [
        'clientFloor' => -1,
        'elevatorButton' => 'down',
        'needfullFloor' => 1,
    ]
);

$client->callElevator(
    [
        'clientFloor' => 214,
        'elevatorButton' => 'down',
        'needfullFloor' => 1,
    ]
);

$client->callElevator(
    [
        'clientFloor' => 2,
        'elevatorButton' => 'some',
    ]
);

$client->callElevator(
    [
        'clientFloor' => 9,
        'elevatorButton' => 'down',
    ]
);


$client->callElevator(
    [
        'clientFloor' => 6,
        'elevatorButton' => 'up',
          'needfullFloor' => 11,
    ]
);