<?php

namespace App\Domain;

class Movie
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $year;

    /**
     * @var Actor[]
     */
    private $actors;

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return Actor[]
     */
    public function getActors(): array
    {
        return $this->actors;
    }
}