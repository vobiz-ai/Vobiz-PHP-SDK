<?php

namespace Vobiz\OriginationUri\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateOriginationUriRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $priority
     */
    #[JsonProperty('priority')]
    public int $priority;

    /**
     * @param array{
     *   name: string,
     *   priority: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->priority = $values['priority'];
    }
}
