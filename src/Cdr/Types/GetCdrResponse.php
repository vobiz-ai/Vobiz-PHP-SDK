<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetCdrResponse extends JsonSerializableType
{
    /**
     * @var GetCdrResponseData $data
     */
    #[JsonProperty('data')]
    public GetCdrResponseData $data;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   data: GetCdrResponseData,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
