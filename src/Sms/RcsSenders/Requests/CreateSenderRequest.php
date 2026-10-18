<?php

namespace Vobiz\Sms\RcsSenders\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Sms\Types\SenderBrand;
use Vobiz\Sms\Types\SenderPhone;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Sms\Types\SenderEmail;
use Vobiz\Sms\Types\SenderWebsite;
use Vobiz\Sms\Types\SenderLink;
use Vobiz\Sms\Types\SenderPlatform;

class CreateSenderRequest extends JsonSerializableType
{
    /**
     * @var string $provider The routing identifier your account was provisioned with for RCS. Contact support if you are unsure which value to use; an unknown value returns `400`.
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var string $senderName Unique technical name of the sender on the RCS platform. You pass it as `from` when you send RCS, and it cannot be changed later.
     */
    #[JsonProperty('senderName')]
    public string $senderName;

    /**
     * @var ?string $displayName The brand name recipients see at the top of the conversation.
     */
    #[JsonProperty('displayName')]
    public ?string $displayName;

    /**
     * @var ?string $description Short description of your business or the sender's purpose, shown on the sender's info page.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $billingCategory How the RCS platform bills conversations from this sender. Values accepted by the platform include `CONVERSATIONAL` and `NON_CONVERSATIONAL`.
     */
    #[JsonProperty('billingCategory')]
    public ?string $billingCategory;

    /**
     * @var ?string $useCase The kind of traffic the sender carries, reviewed by the RCS platform. Values accepted by the platform include `OTP`, `TRANSACTIONAL`, `PROMOTIONAL` and `MULTI_USE`.
     */
    #[JsonProperty('useCase')]
    public ?string $useCase;

    /**
     * @var ?string $hostingRegion The region where the RCS platform hosts the sender. Values accepted by the platform include `NORTH_AMERICA`, `EUROPE` and `ASIA_PACIFIC`. Cannot be changed later.
     */
    #[JsonProperty('hostingRegion')]
    public ?string $hostingRegion;

    /**
     * @var ?SenderBrand $brand The brand the sender represents.
     */
    #[JsonProperty('brand')]
    public ?SenderBrand $brand;

    /**
     * @var ?string $color Accent colour for the sender's buttons and header, as a hex code such as `#1A73E8`.
     */
    #[JsonProperty('color')]
    public ?string $color;

    /**
     * @var ?array<SenderPhone> $phones Contact phone numbers shown on the sender's info page, each with a label.
     */
    #[JsonProperty('phones'), ArrayType([SenderPhone::class])]
    public ?array $phones;

    /**
     * @var ?array<SenderEmail> $emails Contact email addresses shown on the sender's info page, each with a label.
     */
    #[JsonProperty('emails'), ArrayType([SenderEmail::class])]
    public ?array $emails;

    /**
     * @var ?array<SenderWebsite> $websites Websites shown on the sender's info page, each with a label.
     */
    #[JsonProperty('websites'), ArrayType([SenderWebsite::class])]
    public ?array $websites;

    /**
     * @var ?string $bannerUrl Publicly reachable HTTPS URL of the banner image shown at the top of the sender's info page.
     */
    #[JsonProperty('bannerUrl')]
    public ?string $bannerUrl;

    /**
     * @var ?string $logoUrl Publicly reachable HTTPS URL of the logo shown next to every message.
     */
    #[JsonProperty('logoUrl')]
    public ?string $logoUrl;

    /**
     * @var ?SenderLink $privacy Link to your privacy policy, shown on the sender's info page.
     */
    #[JsonProperty('privacy')]
    public ?SenderLink $privacy;

    /**
     * @var ?SenderLink $termsOfService Link to your terms of service, shown on the sender's info page.
     */
    #[JsonProperty('termsOfService')]
    public ?SenderLink $termsOfService;

    /**
     * @var ?SenderPlatform $platform Identifiers the RCS platform has already assigned to your agent, if you have any.
     */
    #[JsonProperty('platform')]
    public ?SenderPlatform $platform;

    /**
     * @param array{
     *   provider: string,
     *   senderName: string,
     *   displayName?: ?string,
     *   description?: ?string,
     *   billingCategory?: ?string,
     *   useCase?: ?string,
     *   hostingRegion?: ?string,
     *   brand?: ?SenderBrand,
     *   color?: ?string,
     *   phones?: ?array<SenderPhone>,
     *   emails?: ?array<SenderEmail>,
     *   websites?: ?array<SenderWebsite>,
     *   bannerUrl?: ?string,
     *   logoUrl?: ?string,
     *   privacy?: ?SenderLink,
     *   termsOfService?: ?SenderLink,
     *   platform?: ?SenderPlatform,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->senderName = $values['senderName'];
        $this->displayName = $values['displayName'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->billingCategory = $values['billingCategory'] ?? null;
        $this->useCase = $values['useCase'] ?? null;
        $this->hostingRegion = $values['hostingRegion'] ?? null;
        $this->brand = $values['brand'] ?? null;
        $this->color = $values['color'] ?? null;
        $this->phones = $values['phones'] ?? null;
        $this->emails = $values['emails'] ?? null;
        $this->websites = $values['websites'] ?? null;
        $this->bannerUrl = $values['bannerUrl'] ?? null;
        $this->logoUrl = $values['logoUrl'] ?? null;
        $this->privacy = $values['privacy'] ?? null;
        $this->termsOfService = $values['termsOfService'] ?? null;
        $this->platform = $values['platform'] ?? null;
    }
}
