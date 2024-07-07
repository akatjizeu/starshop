<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {

    }
    public function findAll(): array
    {
        $this->logger->info("Starships collection retrieved");
        return [
            new Starship(1, 'Uaueza', '4A','Ueii',StarshipStatusEnum::IN_PROGRESS),
            new Starship(2,'Casa','4B','CASA',STarshipStatusEnum::COMPLETED),
            new Starship(3,'Dasa','4C','DASA',StarshipStatusEnum::WAITING),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship)
        {
            if ($starship->getId() === $id)
            {
                return $starship;
            }
        }
        return null;
    }

}