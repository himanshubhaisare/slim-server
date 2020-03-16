<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use App\Application\Actions\Action;
use App\Domain\task\taskRepository;
use Psr\Log\LoggerInterface;

abstract class TaskAction extends Action
{
    /**
     * @var taskRepository
     */
    protected $taskRepository;

    /**
     * @param LoggerInterface $logger
     * @param taskRepository  $taskRepository
     */
    public function __construct(LoggerInterface $logger, taskRepository $taskRepository)
    {
        parent::__construct($logger);
        $this->taskRepository = $taskRepository;
    }
}
