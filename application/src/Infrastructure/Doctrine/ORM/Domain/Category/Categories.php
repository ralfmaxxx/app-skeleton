<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\ORM\Domain\Category;

use App\Domain\Category\Categories as CategoriesRepository;
use App\Domain\Category\Category;
use Doctrine\ORM\EntityManagerInterface;

class Categories implements CategoriesRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(Category $category): void
    {
        $this->entityManager->persist($category);
        $this->entityManager->flush();
    }
}
