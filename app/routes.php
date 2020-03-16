<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\Task\GetTasksAction;
use App\Application\Actions\Task\GetTaskAction;
use App\Application\Actions\Task\CreateTaskAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/task', function(Group $group) {
        $group->get('', GetTasksAction::class);
        $group->post('', CreateTaskAction::class);
        $group->get('/{id}', GetTaskAction::class);
    });
};
