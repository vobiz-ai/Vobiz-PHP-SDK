<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Identifiers the RCS platform has assigned to your agent. Set them only when you already have them.
 */
class SenderPlatform extends JsonSerializableType
{
    /**
     * @var ?string $applicationId The application ID of your agent on the RCS platform.
     */
    #[JsonProperty('applicationId')]
    public ?string $applicationId;

    /**
     * @var ?string $entityId The entity ID of your agent on the RCS platform.
     */
    #[JsonProperty('entityId')]
    public ?string $entityId;

    /**
     * @param array{
     *   applicationId?: ?string,
     *   entityId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applicationId = $values['applicationId'] ?? null;
        $this->entityId = $values['entityId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
