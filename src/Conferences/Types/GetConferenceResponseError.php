<?php

namespace Vobiz\Conferences\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetConferenceResponseError extends JsonSerializableType
{
    /**
     * @var value-of<GetConferenceResponseErrorError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @param array{
     *   error: value-of<GetConferenceResponseErrorError>,
     *   apiId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->apiId = $values['apiId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
