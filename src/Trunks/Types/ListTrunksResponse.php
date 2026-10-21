<?php

namespace Vobiz\Trunks\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Types\TrunkListMeta;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListTrunksResponse extends JsonSerializableType
{
    /**
     * @var TrunkListMeta $meta
     */
    #[JsonProperty('meta')]
    public TrunkListMeta $meta;

    /**
     * @var array<ListTrunksResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListTrunksResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   meta: TrunkListMeta,
     *   objects: array<ListTrunksResponseObjectsItem>,
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
