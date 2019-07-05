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
    public $italianTitle;

    /**
     * @var string
     */
    public $englishTitle;

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
     * @param $englishTitle
     * @param $italianTitle
     * @param int $year
     * @internal param string $title
     */
    private function __construct($id, $englishTitle, $italianTitle, $year)
    {
        $this->id = $id;
        $this->englishTitle = $englishTitle;
        $this->italianTitle = $italianTitle;
        $this->year = $year;
    }

    /**
     * @param $id
     * @param $englishTitle
     * @param $italianTitle
     * @param $year
     * @return Movie
     * @internal param $title
     */
    public static function create($id, $englishTitle, $italianTitle, $year): self
    {
        return new self($id, $englishTitle, $italianTitle, $year);
    }

    /**
     * @param string $language
     * @return string
     */
    public function getTitle(string $language) : string
    {
        switch ($language) {
            case 'it':
                $title = $this->getItalianTitle();
                break;
            default:
                $title = $this->getEnglishTitle();
        }

        return $title;
    }

    /**
     * @return string
     */
    public function getItalianTitle() : string
    {
        return $this->italianTitle;
    }

    /**
     * @return string
     */
    public function getEnglishTitle() : string
    {
        return $this->englishTitle;
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