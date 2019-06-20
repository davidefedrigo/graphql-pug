<?php

namespace App\Domain;

class Movie
{
    /**
     * @var int
     */
    public $id;

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
     * Movie constructor.
     * @param $id
     * @param string $title
     * @param int $year
     */
    private function __construct($id, $title, $year)
    {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
    }

    /**
     * @param $id
     * @param $title
     * @param $year
     * @return Movie
     */
    public static function create($id, $title, $year): self
    {
        return new self($id, $title, $year);
    }

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