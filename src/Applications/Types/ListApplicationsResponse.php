<?php

namespace Vobiz\Applications\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListApplicationsResponse extends JsonSerializableType
{
    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var ListApplicationsResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public ListApplicationsResponseMeta $meta;

    /**
     * @var array<ListApplicationsResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListApplicationsResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   apiId: string,
     *   meta: ListApplicationsResponseMeta,
     *   objects: array<ListApplicationsResponseObjectsItem>,
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
