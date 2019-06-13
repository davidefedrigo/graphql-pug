<?php

namespace App\Domain;

class Season
{
    /**
     * @var array
     */
    private $episodes;

    /**
     * @param array $episodes
     */
    public function __construct(array $episodes)
    {
        $this->episodes = $episodes;
    }

    /**
     * @return array
     */
    public function getEpisodes(): array
    {
        return $this->episodes;
    }
}