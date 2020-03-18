<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Domain\Task\TaskRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Infrastructure\Persistence\Task\InMemoryTaskRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        TaskRepository::class => \DI\autowire(InMemoryTaskRepository::class),
    ]);
};
