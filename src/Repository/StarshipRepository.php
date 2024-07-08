<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use DateTimeImmutable;
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
            new Starship(
                1,
                'USS LeafyCruiser (NCC-001)',
                'Garden',
                'Jean-Luc-Pickles',
                StarshipStatusEnum::IN_PROGRESS,
                new \DateTimeImmutable('-45 week')),
            new Starship(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick',
                StarshipStatusEnum::COMPLETED,
                new \DateTimeImmutable('-45 day')),
            new Starship(
                3,
                'USS Wanderlust (NCC-)',
                'Delta Tourist',
                'Kathryn Journeyway',
                StarshipStatusEnum::WAITING,
                new \DateTimeImmutable('-45 months')),
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