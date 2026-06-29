<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class Error extends JsonSerializableType
{
    /**
     * @var ?string $apiId
     */
    #[JsonProperty('api_id')]
    public ?string $apiId;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   apiId?: ?string,
     *   error?: ?string,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiId = $values['apiId'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->message = $values['message'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
