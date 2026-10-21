<?php

namespace Vobiz\OriginationUri\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Types\TrunkListMeta;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListOriginationUrisResponse extends JsonSerializableType
{
    /**
     * @var TrunkListMeta $meta
     */
    #[JsonProperty('meta')]
    public TrunkListMeta $meta;

    /**
     * @var array<ListOriginationUrisResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListOriginationUrisResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   meta: TrunkListMeta,
     *   objects: array<ListOriginationUrisResponseObjectsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
