<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * The template rendered for the first pending recipients, with the information you need to check a broadcast before launching it.
 */
class BroadcastPreview extends JsonSerializableType
{
    /**
     * @var ?array<BroadcastPreviewSample> $samples The template rendered for up to `limit` pending recipients, in upload order. Empty when no recipient is pending.
     */
    #[JsonProperty('samples'), ArrayType([BroadcastPreviewSample::class])]
    public ?array $samples;

    /**
     * @var ?array<string> $missingVariables Placeholders in the template that have no matching upload column. They render as empty text; an empty array means every placeholder is filled.
     */
    #[JsonProperty('missingVariables'), ArrayType(['string'])]
    public ?array $missingVariables;

    /**
     * @var ?int $estimatedSegments Total SMS segments across all pending recipients. Multiply by your per-segment rate to estimate the cost of the launch.
     */
    #[JsonProperty('estimatedSegments')]
    public ?int $estimatedSegments;

    /**
     * @param array{
     *   samples?: ?array<BroadcastPreviewSample>,
     *   missingVariables?: ?array<string>,
     *   estimatedSegments?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->samples = $values['samples'] ?? null;
        $this->missingVariables = $values['missingVariables'] ?? null;
        $this->estimatedSegments = $values['estimatedSegments'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
