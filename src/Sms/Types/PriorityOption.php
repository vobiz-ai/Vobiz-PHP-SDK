<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A priority option available to your account at the US 10DLC registry. Pass its `id` as `priorityId` when you create or register a toll-free campaign; other keys follow the registry's schema.
 */
class PriorityOption extends JsonSerializableType
{
    /**
     * @var ?string $id ID (UUID) of the priority option. Pass it as `priorityId`.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @param array{
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
