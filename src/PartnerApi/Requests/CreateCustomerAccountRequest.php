<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateCustomerAccountRequest extends JsonSerializableType
{
    /**
     * @var string $name Customer's full name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $email Customer's email. KYC link is sent here.
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $phone E.164 format.
     */
    #[JsonProperty('phone')]
    public string $phone;

    /**
     * @var string $password Min 8 chars, must include a number and a special character.
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @var ?string $company Legal company or business name.
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var string $country ISO 2-letter country code.
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @param array{
     *   name: string,
     *   email: string,
     *   phone: string,
     *   password: string,
     *   country: string,
     *   company?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->password = $values['password'];
        $this->company = $values['company'] ?? null;
        $this->country = $values['country'];
    }
}
