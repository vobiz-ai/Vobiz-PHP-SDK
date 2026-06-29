<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class Call extends JsonSerializableType
{
    /**
     * @var ?string $apiId
     */
    #[JsonProperty('api_id')]
    public ?string $apiId;

    /**
     * @var ?string $requestUuid
     */
    #[JsonProperty('request_uuid')]
    public ?string $requestUuid;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   apiId?: ?string,
     *   requestUuid?: ?string,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiId = $values['apiId'] ?? null;
        $this->requestUuid = $values['requestUuid'] ?? null;
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
