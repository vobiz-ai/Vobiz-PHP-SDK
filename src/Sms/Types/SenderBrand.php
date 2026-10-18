<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The brand an RCS sender represents.
 */
class SenderBrand extends JsonSerializableType
{
    /**
     * @var ?string $brandName Your brand or business name as the RCS platform should record it for review.
     */
    #[JsonProperty('brandName')]
    public ?string $brandName;

    /**
     * @param array{
     *   brandName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandName = $values['brandName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
