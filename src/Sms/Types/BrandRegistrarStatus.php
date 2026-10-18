<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The brand's state at one registrar, read live from the US 10DLC registry.
 */
class BrandRegistrarStatus extends JsonSerializableType
{
    /**
     * @var ?string $registrar Registrar that reviewed the brand.
     */
    #[JsonProperty('registrar')]
    public ?string $registrar;

    /**
     * @var ?string $state The brand's registration state at this registrar, for example `ACTIVE`, `PENDING` or `REJECTED`.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $brandIdentityStatus Identity verification result from this registrar, for example `VERIFIED`. Present only when the registrar reports one.
     */
    #[JsonProperty('brandIdentityStatus')]
    public ?string $brandIdentityStatus;

    /**
     * @var ?string $brandAuthenticationStatus Brand-authentication (2FA) status for `TENDLC_PUBLIC_COMPANY` brands. Present only when the registrar reports one.
     */
    #[JsonProperty('brandAuthenticationStatus')]
    public ?string $brandAuthenticationStatus;

    /**
     * @var ?string $rejectionReason Why the registrar rejected the brand. Present only when `state` is a rejection.
     */
    #[JsonProperty('rejectionReason')]
    public ?string $rejectionReason;

    /**
     * @param array{
     *   registrar?: ?string,
     *   state?: ?string,
     *   brandIdentityStatus?: ?string,
     *   brandAuthenticationStatus?: ?string,
     *   rejectionReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->registrar = $values['registrar'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->brandIdentityStatus = $values['brandIdentityStatus'] ?? null;
        $this->brandAuthenticationStatus = $values['brandAuthenticationStatus'] ?? null;
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
