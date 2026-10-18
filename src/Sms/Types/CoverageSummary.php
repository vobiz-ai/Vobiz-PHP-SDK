<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * One row of the coverage list, with the key rules for a destination country. Call `GET /coverage/{country}` for the full record.
 */
class CoverageSummary extends JsonSerializableType
{
    /**
     * @var ?string $country ISO 3166-1 alpha-2 code of the country. Pass it to `GET /coverage/{country}`.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $name English name of the country or territory, for example `United States`.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $region Geographic region the country belongs to, for example `Northern America`. `null` when not assigned.
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?string $dialCode Country calling code without the `+`, for example `1` or `44`.
     */
    #[JsonProperty('dialCode')]
    public ?string $dialCode;

    /**
     * @var ?CoverageSenders $senders Which sender types the country accepts, for local and international traffic.
     */
    #[JsonProperty('senders')]
    public ?CoverageSenders $senders;

    /**
     * @var ?LocalIntl $registrationRequired Whether senders must be registered before sending, for local and international traffic.
     */
    #[JsonProperty('registrationRequired')]
    public ?LocalIntl $registrationRequired;

    /**
     * @var ?bool $twoWay `true` when recipients can reply to your messages, `false` when they cannot, `null` when unknown.
     */
    #[JsonProperty('twoWay')]
    public ?bool $twoWay;

    /**
     * @var ?bool $optOutMandatory `true` when messages must offer an opt-out, such as replying STOP. `null` when unknown.
     */
    #[JsonProperty('optOutMandatory')]
    public ?bool $optOutMandatory;

    /**
     * @var ?bool $hasSendWindow `true` when the country restricts sending to certain hours. Read `sendWindow` on `GET /coverage/{country}` for the hours.
     */
    #[JsonProperty('hasSendWindow')]
    public ?bool $hasSendWindow;

    /**
     * @param array{
     *   country?: ?string,
     *   name?: ?string,
     *   region?: ?string,
     *   dialCode?: ?string,
     *   senders?: ?CoverageSenders,
     *   registrationRequired?: ?LocalIntl,
     *   twoWay?: ?bool,
     *   optOutMandatory?: ?bool,
     *   hasSendWindow?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->country = $values['country'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->dialCode = $values['dialCode'] ?? null;
        $this->senders = $values['senders'] ?? null;
        $this->registrationRequired = $values['registrationRequired'] ?? null;
        $this->twoWay = $values['twoWay'] ?? null;
        $this->optOutMandatory = $values['optOutMandatory'] ?? null;
        $this->hasSendWindow = $values['hasSendWindow'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
