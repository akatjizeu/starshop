<?php

namespace App\Repository;

use App\Model\Starship;
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
            new Starship(1, 'Uaueza', '4A','Ueii','Beautiful'),
            new Starship(2,'Casa','4B','CASA','Better'),
            new Starship(3,'Dasa','4C','DASA','Not At all')
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