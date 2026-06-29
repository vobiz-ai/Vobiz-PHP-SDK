<?php

namespace Vobiz\Applications\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateApplicationResponse extends JsonSerializableType
{
    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   apiId: string,
     *   message: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
