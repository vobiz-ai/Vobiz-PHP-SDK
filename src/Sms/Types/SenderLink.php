<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A labelled link shown on an RCS sender's info page, used for the privacy policy and terms of service.
 */
class SenderLink extends JsonSerializableType
{
    /**
     * @var ?string $url Public HTTPS URL of the page, for example `https://example.com/privacy`.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $label Text shown for the link, for example `Privacy policy`.
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
