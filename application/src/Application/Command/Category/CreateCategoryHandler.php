<?php

declare(strict_types=1);

namespace App\Application\Command\Category;

use App\Application\Command\Command;
use App\Application\Command\Handler;
use App\Application\Command\HandlerException;
use App\Domain\Category\Categories;
use App\Domain\Category\Category;

final class CreateCategoryHandler implements Handler
{
    private $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @throws HandlerException
     */
    public function handle(Command $command): void
    {
        /** @var CreateCategoryCommand $command */
        $category = new Category($command->getUuid(), $command->getName());

        $this->categories->add($category);
    }
}
