<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class GetNumberHealthResponse extends JsonSerializableType
{
    /**
     * @var ?string $e164
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $usageStatus Reputation/usage rating for the number.
     */
    #[JsonProperty('usage_status')]
    public ?string $usageStatus;

    /**
     * @var ?bool $isSpam
     */
    #[JsonProperty('is_spam')]
    public ?bool $isSpam;

    /**
     * @var ?string $granularity
     */
    #[JsonProperty('granularity')]
    public ?string $granularity;

    /**
     * @var ?GetNumberHealthResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public ?GetNumberHealthResponseSummary $summary;

    /**
     * @var ?array<GetNumberHealthResponseSnapshotsItem> $snapshots
     */
    #[JsonProperty('snapshots'), ArrayType([GetNumberHealthResponseSnapshotsItem::class])]
    public ?array $snapshots;

    /**
     * @param array{
     *   e164?: ?string,
     *   status?: ?string,
     *   usageStatus?: ?string,
     *   isSpam?: ?bool,
     *   granularity?: ?string,
     *   summary?: ?GetNumberHealthResponseSummary,
     *   snapshots?: ?array<GetNumberHealthResponseSnapshotsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->e164 = $values['e164'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->usageStatus = $values['usageStatus'] ?? null;
        $this->isSpam = $values['isSpam'] ?? null;
        $this->granularity = $values['granularity'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->snapshots = $values['snapshots'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
