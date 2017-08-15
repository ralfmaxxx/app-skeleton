<?php

declare(strict_types=1);

namespace App\Domain\Category;

interface Categories
{
    public function add(Category $category): void;
}
