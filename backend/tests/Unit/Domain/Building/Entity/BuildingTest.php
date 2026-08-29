<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Building\Entity;

use App\Domain\Building\Entity\Building;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class BuildingTest extends TestCase
{
    public function test_it_trims_the_building_name(): void
    {
        $building = new Building(
            id: 'uuid-123',
            name: '  Immeuble A  ',
            displayOrder: 1,
        );

        self::assertSame('Immeuble A', $building->name());
    }

    public function test_it_rejects_an_empty_building_name(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Building name cannot be empty.');

        new Building(
            id: 'uuid-123',
            name: '   ',
            displayOrder: 1,
        );
    }
}