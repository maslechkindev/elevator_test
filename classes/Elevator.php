<?php
require_once __DIR__ . '/ElevatorMechanism.php';

class Elevator extends ElevatorMechanism
{
    public function callElevator($data = [])
    {
        if(!empty($data['clientFloor'])){

            if($this->setCallFloor($data['clientFloor'])){
                if(!empty($data['elevatorButton']) && method_exists($this, $data['elevatorButton'])){
                    $data['elevatorButton'] == 'up' ? $this->up() :
                        $data['elevatorButton'] == 'down' ? $this->down() : null;

                    if(!empty($data['needfullFloor'])){
                        $this->goToFloor($data['needfullFloor']);
                    }
                } else {
                    printf("<p>Такой кнопки не существует, произошла ошибка</p>");
                }

            };
        }


    }

}