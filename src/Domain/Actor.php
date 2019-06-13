<?php

namespace App\Domain;

class Actor
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array[int]
     */
    public $movieIds;

    /**
     * @param $id
     * @param string $name
     * @param array[int] $movieIds
     */
    private function __construct($id, $name, array $movieIds)
    {
        $this->id = $id;
        $this->name = $name;
        $this->movieIds = $movieIds;
    }

    /**
     * @param $id
     * @param $name
     * @param array[int] $movieIds
     * @return Actor
     */
    public static function create($id, $name, array $movieIds)
    {
        return new self($id, $name, $movieIds);
    }
}