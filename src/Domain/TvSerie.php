<?php

namespace App\Domain;

class TvSerie
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
     * @var Season[]
     */
    private $seasons;

    /**
     * Movie constructor.
     * @param $id
     * @param $englishTitle
     * @param $italianTitle
     * @param array $seasons
     * @internal param string $title
     */
    private function __construct($id, $englishTitle, $italianTitle, $seasons)
    {
        $this->id = $id;
        $this->englishTitle = $englishTitle;
        $this->italianTitle = $italianTitle;
        $this->seasons = $seasons;
    }

    /**
     * @param $id
     * @param $englishTitle
     * @param $italianTitle
     * @param $seasons
     * @return TvSerie
     * @internal param $title
     */
    public static function create($id, $englishTitle, $italianTitle, $seasons): self
    {
        return new self($id, $englishTitle, $italianTitle, $seasons);
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
     * @return Season[]
     */
    public function getSeasons(): array
    {
        return $this->seasons;
    }
}