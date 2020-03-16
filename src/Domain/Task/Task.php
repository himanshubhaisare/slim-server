<?php
declare(strict_types=1);

namespace App\Domain\Task;

use JsonSerializable;

class Task implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $submitterId;

    /**
     * @var string
     */
    private $processorId;

    /**
     * @var string
     */
    private $command;

    /**
     * @param int|null  $id
     * @param string    $submitterId
     * @param string    $processorId
     * @param string    $command
     */
    public function __construct(?int $id, string $submitterId, string $processorId, string $command)
    {
        $this->id = $id;
        $this->submitterId = strtolower($submitterId);
        $this->processorId = ucfirst($processorId);
        $this->command = ucfirst($command);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSubmitterId(): string
    {
        return $this->submitterId;
    }

    /**
     * @return string
     */
    public function getProcessorId(): string
    {
        return $this->processorId;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'submitterId' => $this->submitterId,
            'processorId' => $this->processorId,
            'command' => $this->command,
        ];
    }
}
