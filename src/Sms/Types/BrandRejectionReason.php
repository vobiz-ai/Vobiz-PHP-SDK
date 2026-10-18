<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * One rejection recorded by a registrar for the brand.
 */
class BrandRejectionReason extends JsonSerializableType
{
    /**
     * @var ?string $registrar Registrar that recorded the rejection.
     */
    #[JsonProperty('registrar')]
    public ?string $registrar;

    /**
     * @var ?string $state The brand's state at that registrar when the rejection was recorded. Omitted when not reported.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $rejectionReason The registrar's explanation of what to fix before you register again.
     */
    #[JsonProperty('rejectionReason')]
    public ?string $rejectionReason;

    /**
     * @param array{
     *   registrar?: ?string,
     *   state?: ?string,
     *   rejectionReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->registrar = $values['registrar'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->rejectionReason = $values['rejectionReason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
