<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Acknowledgement that the registry accepted a brand-authentication or 2FA resend request. The outcome arrives later on the brand.
 */
class BrandAuthRequested extends JsonSerializableType
{
    /**
     * @var ?string $status Always `requested`. Follow the result in the brand's `registrationStatus` or in `GET /10dlc/brands/{id}/registrar-statuses`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
