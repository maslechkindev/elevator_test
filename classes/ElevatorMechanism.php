<?php

require_once __DIR__ . '/Building.php';

class ElevatorMechanism
{
    public static $currentFloor;
    public static $callFloor;
    public static $building;
    const DEFAULT_FLOOR = 1;
   
    function __construct($building = null)
    {
        self::$building = !empty(self::$building) ? self::$building : $building;
        self::$currentFloor = !empty(self::$currentFloor) ? self::$currentFloor : self::DEFAULT_FLOOR;
    }

    public function up()
    {
        if($this->checkCallFloor($this->getCallFloor())){
            if($this->getCallFloor() != self::$building->getMaxFloor()){
                $elevatorAction = $this->getCallFloor() > $this->getCurrentFloor() ? 'поднялся' : 'опустился';
                if($this->getCallFloor() != $this->getCurrentFloor()){
                    printf("<p>Лифт с %d этажа %s на ваш этаж (%d)</p>", $this->getCurrentFloor(), $elevatorAction, $this->getCallFloor());
                } else {
                    printf("<p>Лифт на вашем этаже (%d)</p>", $this->getCallFloor());
                }
                $this->openElevatorDoor();
                self::$currentFloor = $this->getCallFloor();
            } else {
                printf("<p>Лифт на последнем этаже (%d)</p>", $this->getCallFloor());
            }
        }
    }

    public function down()
    {
        if($this->checkCallFloor($this->getCallFloor())){
            if($this->getCallFloor() != self::$building->getMinFloor()){
                $elevatorAction = $this->getCallFloor() > $this->getCurrentFloor() ? 'поднялся' : 'опустился';
                if($this->getCallFloor() != $this->getCurrentFloor()){
                    printf("<p>Лифт с %d этажа %s на ваш этаж (%d)</p>", $this->getCurrentFloor(), $elevatorAction, $this->getCallFloor());
                } else {
                    printf("<p>Лифт на вашем этаже (%d)</p>", $this->getCallFloor());
                }
                $this->openElevatorDoor();
                self::$currentFloor = $this->getCallFloor();
            } else {
                printf("<p>Лифт на первом этаже (%d)</p>", $this->getCallFloor());
            }
        }
    }

    public function getCurrentFloor()
    {
        return self::$currentFloor;
    }

    public function setCurrentFloor($floor)
    {
        self::$currentFloor = $floor;
    }

    public function getCallFloor()
    {
        return self::$callFloor;
    }

    public function setCallFloor($floor)
    {
        if($this->checkCallFloor($floor)){
            self::$callFloor = $floor;
            return true;
        }
        return false;
    }

    private function checkCallFloor($callFloor)
    {
        if(self::$building != null &&
            ($callFloor > self::$building->getMaxFloor() ||
            $callFloor < self::$building->getMinFloor())){
            printf("<p>В здании нет такого этажа (%d)</p>", $callFloor);
            return false;
        }
        return true;
    }

    private function closeElevatorDoor(){
        echo "<p>Двери лифта закрываются</p>";
    }

    private function openElevatorDoor(){
        echo "<p>Двери лифта открываются</p>";
    }

    public function goToFloor($floor)
    {
        if($this->checkCallFloor($floor)){
            printf("<p>Вы нажали кнопку (%d)-го этажа</p>", $floor);
            if($floor != $this->getCurrentFloor()){
                $this->closeElevatorDoor();
                $elevatorAction = $floor > $this->getCurrentFloor() ? 'поднимается' : 'опускается';
                printf("<p>Лифт с %d этажа %s на ваш этаж (%d)</p>", $this->getCurrentFloor(), $elevatorAction, $floor);
                self::$currentFloor = $floor;
                printf("<p>Лифт приехал на ваш этаж (%d)</p>", $floor);
                $this->openElevatorDoor();
            } else {
                printf("<p>Лифт находится на этом этаже (%d)</p>", $floor);
            }
        }
    }

}