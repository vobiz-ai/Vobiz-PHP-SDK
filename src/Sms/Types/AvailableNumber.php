<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * A number in the inventory that you can buy, with its type, capabilities and price.
 */
class AvailableNumber extends JsonSerializableType
{
    /**
     * @var ?string $e164 The number in E.164 format. Pass it as `e164` on `POST /numbers/purchase`.
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $numberKey Opaque inventory key for the number. Pass it as `numberKey` on `POST /numbers/purchase` when it is not empty; it is empty for US numbers, which are bought by `e164` alone.
     */
    #[JsonProperty('numberKey')]
    public ?string $numberKey;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 code of the country the number belongs to.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?string $type Inventory type of the number in upper case, for example `VIRTUAL_LONG_NUMBER` or `TOLL_FREE`.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<string> $capabilities Upper-case capability labels for the number, for example `SMS`, `MMS` and `VOICE`. Order is not significant.
     */
    #[JsonProperty('capabilities'), ArrayType(['string'])]
    public ?array $capabilities;

    /**
     * @var ?string $network Name of the mobile network the number belongs to, when published. Empty string otherwise.
     */
    #[JsonProperty('network')]
    public ?string $network;

    /**
     * @var ?float $setupPrice One-time setup fee charged at purchase, in `currency`.
     */
    #[JsonProperty('setupPrice')]
    public ?float $setupPrice;

    /**
     * @var ?float $monthlyPrice Monthly rental charged at purchase for the first month and then on each renewal, in `currency`.
     */
    #[JsonProperty('monthlyPrice')]
    public ?float $monthlyPrice;

    /**
     * @var ?string $currency ISO 4217 code of the prices, which is your wallet currency, for example `USD`.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?bool $providerRequiresDocuments `true` when the number needs regulatory documents before it can be activated. Contact support to buy such a number; `POST /numbers/purchase` returns `422` for it.
     */
    #[JsonProperty('providerRequiresDocuments')]
    public ?bool $providerRequiresDocuments;

    /**
     * @param array{
     *   e164?: ?string,
     *   numberKey?: ?string,
     *   countryCode?: ?string,
     *   type?: ?string,
     *   capabilities?: ?array<string>,
     *   network?: ?string,
     *   setupPrice?: ?float,
     *   monthlyPrice?: ?float,
     *   currency?: ?string,
     *   providerRequiresDocuments?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->e164 = $values['e164'] ?? null;
        $this->numberKey = $values['numberKey'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
        $this->network = $values['network'] ?? null;
        $this->setupPrice = $values['setupPrice'] ?? null;
        $this->monthlyPrice = $values['monthlyPrice'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->providerRequiresDocuments = $values['providerRequiresDocuments'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
