<?php

namespace Vobiz\SubAccounts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\SubAccounts\Types\CreateSubaccountRequestKycMode;
use Vobiz\SubAccounts\Types\CreateSubaccountRequestBusinessType;

class CreateSubaccountRequest extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name for the sub-account.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $email Required when `kyc_mode` is `customer_use`.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $password Login password for the sub-account.
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * `personal_use` inherits parent KYC. `customer_use` requires
     * the sub-account to complete its own KYC and requires `email`.
     *
     * @var ?value-of<CreateSubaccountRequestKycMode> $kycMode
     */
    #[JsonProperty('kyc_mode')]
    public ?string $kycMode;

    /**
     * @var ?value-of<CreateSubaccountRequestBusinessType> $businessType Legal constitution of the customer. Drives which KYC documents are required.
     */
    #[JsonProperty('business_type')]
    public ?string $businessType;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   name: string,
     *   email?: ?string,
     *   password?: ?string,
     *   kycMode?: ?value-of<CreateSubaccountRequestKycMode>,
     *   businessType?: ?value-of<CreateSubaccountRequestBusinessType>,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->email = $values['email'] ?? null;
        $this->password = $values['password'] ?? null;
        $this->kycMode = $values['kycMode'] ?? null;
        $this->businessType = $values['businessType'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }
}
