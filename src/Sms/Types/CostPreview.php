<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * An estimate of what a message costs before you send it: how many segments the text splits into, and the price per segment and in total.
 */
class CostPreview extends JsonSerializableType
{
    /**
     * @var ?string $channel Channel the estimate is for: `sms`, `mms` or `rcs`, matching the `channel` you requested.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?int $segmentCount Number of segments the text splits into. A GSM-7 SMS fits 160 characters in one segment and 153 per segment when split; text with other characters uses UCS-2 (70 and 67).
     */
    #[JsonProperty('segmentCount')]
    public ?int $segmentCount;

    /**
     * @var ?float $unitCost Price of one segment, in `currency`.
     */
    #[JsonProperty('unitCost')]
    public ?float $unitCost;

    /**
     * @var ?float $totalCost Estimated price of the message to one recipient, in `currency`: `unitCost` multiplied by `segmentCount`.
     */
    #[JsonProperty('totalCost')]
    public ?float $totalCost;

    /**
     * @var ?string $currency ISO 4217 code of the currency the prices are in, for example `USD`.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $country ISO 3166-1 alpha-2 code of the destination country, for example `US`. Omitted when the destination country is not resolved.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @param array{
     *   channel?: ?string,
     *   segmentCount?: ?int,
     *   unitCost?: ?float,
     *   totalCost?: ?float,
     *   currency?: ?string,
     *   country?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->channel = $values['channel'] ?? null;
        $this->segmentCount = $values['segmentCount'] ?? null;
        $this->unitCost = $values['unitCost'] ?? null;
        $this->totalCost = $values['totalCost'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->country = $values['country'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
