<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Task;

use App\Domain\Task\Task;
use App\Domain\Task\TaskNotFoundException;
use App\Domain\Task\TaskRepository;

class InMemoryTaskRepository implements TaskRepository
{
    /**
     * @var Task[]
     */
    private $tasks;

    /**
     * InMemoryTaskRepository constructor.
     *
     * @param array|null $tasks
     */
    public function __construct(array $tasks = null)
    {
        $this->tasks = $tasks ?? [
            1 => new Task(1, 'bill.gates_submitter', 'Bill_processor', 'cp /var/log/log.txt .'),
            2 => new Task(2, 'steve.jobs_submitter', 'Steve_processor', 'cp /var/log/log.txt .'),
            3 => new Task(3, 'mark.zuckerberg_submitter', 'Mark_processor', 'cp /var/log/log.txt .'),
            4 => new Task(4, 'evan.spiegel_submitter', 'Evan_processor', 'cp /var/log/log.txt .'),
            5 => new Task(5, 'jack.dorsey_submitter', 'Jack_processor', 'cp /var/log/log.txt .'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->tasks);
    }

    /**
     * {@inheritdoc}
     */
    public function findTaskOfId(int $id): Task
    {
        if (!isset($this->tasks[$id])) {
            throw new TaskNotFoundException();
        }

        return $this->tasks[$id];
    }
}
