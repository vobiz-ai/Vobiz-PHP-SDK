<?php

namespace Vobiz\Endpoints\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListEndpointsResponse extends JsonSerializableType
{
    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var ListEndpointsResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public ListEndpointsResponseMeta $meta;

    /**
     * @var array<ListEndpointsResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListEndpointsResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   apiId: string,
     *   meta: ListEndpointsResponseMeta,
     *   objects: array<ListEndpointsResponseObjectsItem>,
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
