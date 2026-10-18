<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Rules for links in message bodies sent to a destination country.
 */
class CoverageUrls extends JsonSerializableType
{
    /**
     * @var ?LocalIntl $allowed Whether message bodies may contain URLs, for local and international traffic.
     */
    #[JsonProperty('allowed')]
    public ?LocalIntl $allowed;

    /**
     * @var ?LocalIntl $whitelistingRequired Whether the domains you link to must be registered (whitelisted) in advance, for local and international traffic.
     */
    #[JsonProperty('whitelistingRequired')]
    public ?LocalIntl $whitelistingRequired;

    /**
     * @param array{
     *   allowed?: ?LocalIntl,
     *   whitelistingRequired?: ?LocalIntl,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowed = $values['allowed'] ?? null;
        $this->whitelistingRequired = $values['whitelistingRequired'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
