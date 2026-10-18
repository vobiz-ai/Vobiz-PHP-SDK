<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Which sender types a destination accepts, each split into local and international traffic.
 */
class CoverageSenders extends JsonSerializableType
{
    /**
     * @var ?LocalIntl $alphanumeric Whether alphanumeric sender IDs (a brand name such as `ACME` in place of a number) are accepted.
     */
    #[JsonProperty('alphanumeric')]
    public ?LocalIntl $alphanumeric;

    /**
     * @var ?LocalIntl $shortCode Whether short codes (5 or 6 digit numbers) are accepted as senders.
     */
    #[JsonProperty('shortCode')]
    public ?LocalIntl $shortCode;

    /**
     * @var ?LocalIntl $longNumber Whether long numbers (standard-length phone numbers, such as US 10DLC numbers) are accepted as senders.
     */
    #[JsonProperty('longNumber')]
    public ?LocalIntl $longNumber;

    /**
     * @param array{
     *   alphanumeric?: ?LocalIntl,
     *   shortCode?: ?LocalIntl,
     *   longNumber?: ?LocalIntl,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->alphanumeric = $values['alphanumeric'] ?? null;
        $this->shortCode = $values['shortCode'] ?? null;
        $this->longNumber = $values['longNumber'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
