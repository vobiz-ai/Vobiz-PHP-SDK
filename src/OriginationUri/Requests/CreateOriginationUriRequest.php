<?php

namespace Vobiz\OriginationUri\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateOriginationUriRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $sipUri
     */
    #[JsonProperty('sip_uri')]
    public string $sipUri;

    /**
     * @var int $priority
     */
    #[JsonProperty('priority')]
    public int $priority;

    /**
     * @param array{
     *   name: string,
     *   sipUri: string,
     *   priority: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->sipUri = $values['sipUri'];
        $this->priority = $values['priority'];
    }
}
