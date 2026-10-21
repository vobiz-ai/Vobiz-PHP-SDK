<?php

namespace Vobiz\Credentials\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Types\TrunkListMeta;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListCredentialsResponse extends JsonSerializableType
{
    /**
     * @var TrunkListMeta $meta
     */
    #[JsonProperty('meta')]
    public TrunkListMeta $meta;

    /**
     * @var array<ListCredentialsResponseObjectsItem> $objects
     */
    #[JsonProperty('objects'), ArrayType([ListCredentialsResponseObjectsItem::class])]
    public array $objects;

    /**
     * @param array{
     *   meta: TrunkListMeta,
     *   objects: array<ListCredentialsResponseObjectsItem>,
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
