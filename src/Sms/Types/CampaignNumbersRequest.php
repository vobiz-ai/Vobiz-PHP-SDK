<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Numbers to add to, remove from or re-register on a campaign. Provide `numbers`, `numberKeys`, or both; if both are empty the request returns `400` with `invalid request: numbers or numberKeys is required`.
 */
class CampaignNumbersRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $numbers Phone numbers on your account, as digits with country code and no `+` (for example `14155550100`). These values also update the campaign's `numbers` list on add and remove.
     */
    #[JsonProperty('numbers'), ArrayType(['string'])]
    public ?array $numbers;

    /**
     * @var ?array<string> $numberKeys Registry number keys from `GET /10dlc/campaigns/{id}/numbers`, as an alternative to `numbers`.
     */
    #[JsonProperty('numberKeys'), ArrayType(['string'])]
    public ?array $numberKeys;

    /**
     * @param array{
     *   numbers?: ?array<string>,
     *   numberKeys?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->numbers = $values['numbers'] ?? null;
        $this->numberKeys = $values['numberKeys'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
