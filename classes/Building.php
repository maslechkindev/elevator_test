<?php

class Building
{
    private static $building = null;
    protected static $minFloor;
    protected static $maxFloor;

    public static function getBuilding()
    {
        if (null === self::$building)
        {
            self::$building = new self();
        }
        return self::$building;
    }

    function __clone(){}
    function __construct(){}

    public function getMaxFloor()
    {
        return self::$maxFloor;
    }

    public function getMinFloor()
    {
        return self::$minFloor;
    }

    public function setMaxFloor($floor)
    {
        self::$maxFloor = $floor;
    }

    public function setMinFloor($floor)
    {
        self::$minFloor = $floor;
    }
}