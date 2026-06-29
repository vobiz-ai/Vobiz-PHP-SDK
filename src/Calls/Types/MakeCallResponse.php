<?php

namespace Vobiz\Calls\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class MakeCallResponse extends JsonSerializableType
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
     * @var string $requestUuid
     */
    #[JsonProperty('request_uuid')]
    public string $requestUuid;

    /**
     * @param array{
     *   apiId: string,
     *   message: string,
     *   requestUuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->message = $values['message'];
        $this->requestUuid = $values['requestUuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
