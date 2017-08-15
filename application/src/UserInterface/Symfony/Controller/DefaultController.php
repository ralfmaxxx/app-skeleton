<?php

declare(strict_types=1);

namespace App\UserInterface\Symfony\Controller;

use App\Application\Command\Category\CreateCategoryCommand;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\Response;

final class DefaultController
{
    private const EMPTY_RESPONSE = '';

    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function execute(): Response
    {
        $command = new CreateCategoryCommand('aaa' . (string) rand(1, 1000), (string) rand(1, 1000));

        $this->commandBus->handle($command);

        return new Response(self::EMPTY_RESPONSE);
    }
}
