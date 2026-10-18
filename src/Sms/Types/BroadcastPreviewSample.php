<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The template rendered for one recipient, with the encoding and segment count it will be sent with.
 */
class BroadcastPreviewSample extends JsonSerializableType
{
    /**
     * @var ?string $to The recipient's number in E.164 format.
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?string $text The exact message text this recipient will receive, with their variables filled.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var ?int $segments Number of SMS segments this text is sent and billed as.
     */
    #[JsonProperty('segments')]
    public ?int $segments;

    /**
     * @var ?value-of<BroadcastPreviewSampleEncoding> $encoding `GSM-7` when every character is in the GSM alphabet (160 characters in a single segment). `UCS-2` when the text contains other characters, such as emoji or most non-Latin scripts (70 characters in a single segment).
     */
    #[JsonProperty('encoding')]
    public ?string $encoding;

    /**
     * @param array{
     *   to?: ?string,
     *   text?: ?string,
     *   segments?: ?int,
     *   encoding?: ?value-of<BroadcastPreviewSampleEncoding>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->to = $values['to'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->encoding = $values['encoding'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
