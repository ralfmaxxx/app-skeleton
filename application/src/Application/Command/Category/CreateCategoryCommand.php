<?php

declare(strict_types=1);

namespace App\Application\Command\Category;

use App\Application\Command\Command;

final class CreateCategoryCommand implements Command
{
    private $uuid;
    private $name;

    public function __construct(string $uuid, string $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
