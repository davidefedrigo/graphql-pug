<?php

namespace App\Domain;

class Episode
{
    /**
     * @var int
     */
    private $runningTime;

    /**
     * @param int $runningTime
     */
    public function __construct(int $runningTime)
    {
        $this->runningTime = $runningTime;
    }

    /**
     * @return int
     */
    public function getRunningTime(): int
    {
        return $this->runningTime;
    }
}