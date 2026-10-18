<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * One number attached to a campaign at the US 10DLC registry.
 */
class CampaignNumberPreview extends JsonSerializableType
{
    /**
     * @var ?string $numberKey Registry key for the number. Pass it in `numberKeys` on campaign number requests.
     */
    #[JsonProperty('numberKey')]
    public ?string $numberKey;

    /**
     * @var ?string $number The number, as digits with country code and no `+` (for example `14155550100`).
     */
    #[JsonProperty('number')]
    public ?string $number;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 country code of the number, for example `US`.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @param array{
     *   numberKey?: ?string,
     *   number?: ?string,
     *   countryCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->numberKey = $values['numberKey'] ?? null;
        $this->number = $values['number'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
