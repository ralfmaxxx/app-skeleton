<?php

declare(strict_types=1);

namespace App\Domain\Category;

final class Category
{
    private $uuid;
    private $name;

    public function __construct(string $uuid, string $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
    }
}
