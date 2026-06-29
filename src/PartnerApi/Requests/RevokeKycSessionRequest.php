<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class RevokeKycSessionRequest extends JsonSerializableType
{
    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reason = $values['reason'] ?? null;
    }
}
