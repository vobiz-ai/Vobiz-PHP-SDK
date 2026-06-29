<?php

namespace Vobiz\Recordings\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListRecordingsResponse extends JsonSerializableType
{
    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var ListRecordingsResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public ListRecordingsResponseMeta $meta;

    /**
     * @var array<ListRecordingsResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListRecordingsResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   apiId: string,
     *   meta: ListRecordingsResponseMeta,
     *   objects: array<ListRecordingsResponseObjectsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->meta = $values['meta'];
        $this->objects = $values['objects'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
