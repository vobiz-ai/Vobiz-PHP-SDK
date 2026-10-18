<?php

namespace Vobiz\Sms\Brands\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Brands\Types\BrandVetRequestType;
use Vobiz\Core\Json\JsonProperty;

class BrandVetRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<BrandVetRequestType> $type Kind of vet to request: `STANDARD` (the default), `ENHANCED` (a deeper review) or `POLITICAL` (for political organisations). Case-insensitive; any other value returns `400` with `invalid request: type must be one of STANDARD, ENHANCED, POLITICAL`.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   type?: ?value-of<BrandVetRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
    }
}
