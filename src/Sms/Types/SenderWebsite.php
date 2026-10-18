<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A website shown on an RCS sender's info page.
 */
class SenderWebsite extends JsonSerializableType
{
    /**
     * @var ?string $url Public HTTPS URL of the website, for example `https://example.com`.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $label Text shown for the link, for example `Website`.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   url?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->url = $values['url'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
