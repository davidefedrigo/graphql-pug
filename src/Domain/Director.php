<?php

namespace App\Domain;

class Director
{
    // Filmography

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $country;

    /**
     * Director constructor.
     * @param $id
     * @param string $name
     * @param string $country
     */
    private function __construct($id, $name, $country)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
    }

    /**
     * @param $id
     * @param $name
     * @param $country
     * @return Director
     */
    public static function create($id, $name, $country)
    {
        return new self($id, $name, $country);
    }
}