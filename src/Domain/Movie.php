<?php

namespace App\Domain;

class Movie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $italianTitle;

    /**
     * @var string
     */
    private $englishTitle;

    /**
     * @var int
     */
    private $runningTime;
    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $year;

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
     * @param $runningTime
     * @internal param string $title
     */
    private function __construct($id, $englishTitle, $italianTitle, $year, $runningTime)
    {
        $this->id = $id;
        $this->englishTitle = $englishTitle;
        $this->italianTitle = $italianTitle;
        $this->year = $year;
        $this->runningTime = $runningTime;;
    }

    /**
     * @param $id
     * @param $englishTitle
     * @param $italianTitle
     * @param $year
     * @param $runningTime
     * @return Movie
     * @internal param $title
     */
    public static function create($id, $englishTitle, $italianTitle, $year, $runningTime): self
    {
        return new self($id, $englishTitle, $italianTitle, $year, $runningTime);
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
    public function getRunningTime(): int
    {
        return $this->runningTime;
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}