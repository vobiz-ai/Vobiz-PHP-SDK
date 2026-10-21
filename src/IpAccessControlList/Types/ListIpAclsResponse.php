<?php

namespace Vobiz\IpAccessControlList\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Types\TrunkListMeta;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListIpAclsResponse extends JsonSerializableType
{
    /**
     * @var TrunkListMeta $meta
     */
    #[JsonProperty('meta')]
    public TrunkListMeta $meta;

    /**
     * @var array<ListIpAclsResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListIpAclsResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   meta: TrunkListMeta,
     *   objects: array<ListIpAclsResponseObjectsItem>,
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
