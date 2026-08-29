<?php

declare(strict_types=1);

namespace App\Domain\Building\Entity;

use InvalidArgumentException;

final class Building
{
    public function __construct(
        private readonly string $id,
        private string $name,
        private int $displayOrder,
    ) {
        $this->rename($name);
        $this->changeDisplayOrder($displayOrder);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function displayOrder(): int
    {
        return $this->displayOrder;
    }

    public function rename(string $name): void
    {
        $name = trim($name);

        if ($name === '') {
            throw new InvalidArgumentException('Building name cannot be empty.');
        }

        $this->name = $name;
    }

    public function changeDisplayOrder(int $displayOrder): void
    {
        if ($displayOrder < 0) {
            throw new InvalidArgumentException('Display order cannot be negative.');
        }

        $this->displayOrder = $displayOrder;
    }
}