<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * The full coverage record for one destination country, returned by `GET /coverage/{country}`.
 */
class CoverageDetail extends JsonSerializableType
{
    /**
     * @var ?string $country ISO 3166-1 alpha-2 code of the country.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $name English name of the country or territory, for example `United States`.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $region Geographic region the country belongs to, for example `Northern America`. Use this value with the `region` filter on `GET /coverage`. `null` when not assigned.
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?string $dialCode Country calling code without the `+`, for example `1` or `44`.
     */
    #[JsonProperty('dialCode')]
    public ?string $dialCode;

    /**
     * @var ?string $mcc Mobile country code (MCC) of the country's networks, for example `311`. `null` when not published.
     */
    #[JsonProperty('mcc')]
    public ?string $mcc;

    /**
     * @var ?bool $numberPortability `true` when subscribers can keep their number when they change network, `null` when unknown.
     */
    #[JsonProperty('numberPortability')]
    public ?bool $numberPortability;

    /**
     * @var ?bool $localVsInternationalTraffic `true` when the country applies different rules to local (in-country) and international senders. When `true`, read the `local` and `international` values of each rule separately.
     */
    #[JsonProperty('localVsInternationalTraffic')]
    public ?bool $localVsInternationalTraffic;

    /**
     * @var ?CoverageSenders $senders Which sender types the country accepts, for local and international traffic.
     */
    #[JsonProperty('senders')]
    public ?CoverageSenders $senders;

    /**
     * @var ?CoverageRegistration $registration Whether senders must be registered, and what registration involves.
     */
    #[JsonProperty('registration')]
    public ?CoverageRegistration $registration;

    /**
     * @var ?CoverageUrls $urls Rules for links in message bodies.
     */
    #[JsonProperty('urls')]
    public ?CoverageUrls $urls;

    /**
     * @var ?bool $optOutMandatory `true` when messages must offer an opt-out, such as replying STOP. `null` when unknown.
     */
    #[JsonProperty('optOutMandatory')]
    public ?bool $optOutMandatory;

    /**
     * @var ?bool $twoWay `true` when recipients can reply to your messages, `false` when they cannot, `null` when unknown.
     */
    #[JsonProperty('twoWay')]
    public ?bool $twoWay;

    /**
     * @var ?array<string> $prohibitedTopics Content categories that may not be sent to the country, for example `Gambling` or `Phishing`. Empty array when none are listed.
     */
    #[JsonProperty('prohibitedTopics'), ArrayType(['string'])]
    public ?array $prohibitedTopics;

    /**
     * @var ?string $prohibitedNotes Free-text detail on prohibited or restricted content. `null` when none.
     */
    #[JsonProperty('prohibitedNotes')]
    public ?string $prohibitedNotes;

    /**
     * @var ?CoverageSendWindow $sendWindow Hours during which you may send, by day type. `null` when the country has no sending window.
     */
    #[JsonProperty('sendWindow')]
    public ?CoverageSendWindow $sendWindow;

    /**
     * @var ?string $marketNotes Free-text guidance on sending to this market, such as sender behaviour and local rules. `null` when none.
     */
    #[JsonProperty('marketNotes')]
    public ?string $marketNotes;

    /**
     * @var ?DateTime $updatedAt When the coverage dataset was last refreshed (ISO 8601).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   country?: ?string,
     *   name?: ?string,
     *   region?: ?string,
     *   dialCode?: ?string,
     *   mcc?: ?string,
     *   numberPortability?: ?bool,
     *   localVsInternationalTraffic?: ?bool,
     *   senders?: ?CoverageSenders,
     *   registration?: ?CoverageRegistration,
     *   urls?: ?CoverageUrls,
     *   optOutMandatory?: ?bool,
     *   twoWay?: ?bool,
     *   prohibitedTopics?: ?array<string>,
     *   prohibitedNotes?: ?string,
     *   sendWindow?: ?CoverageSendWindow,
     *   marketNotes?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->country = $values['country'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->dialCode = $values['dialCode'] ?? null;
        $this->mcc = $values['mcc'] ?? null;
        $this->numberPortability = $values['numberPortability'] ?? null;
        $this->localVsInternationalTraffic = $values['localVsInternationalTraffic'] ?? null;
        $this->senders = $values['senders'] ?? null;
        $this->registration = $values['registration'] ?? null;
        $this->urls = $values['urls'] ?? null;
        $this->optOutMandatory = $values['optOutMandatory'] ?? null;
        $this->twoWay = $values['twoWay'] ?? null;
        $this->prohibitedTopics = $values['prohibitedTopics'] ?? null;
        $this->prohibitedNotes = $values['prohibitedNotes'] ?? null;
        $this->sendWindow = $values['sendWindow'] ?? null;
        $this->marketNotes = $values['marketNotes'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
