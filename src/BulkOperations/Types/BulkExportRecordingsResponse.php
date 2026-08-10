<?php

namespace Vobiz\BulkOperations\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class BulkExportRecordingsResponse extends JsonSerializableType
{
    /**
     * @var ?string $apiId
     */
    #[JsonProperty('api_id')]
    public ?string $apiId;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   apiId?: ?string,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiId = $values['apiId'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
