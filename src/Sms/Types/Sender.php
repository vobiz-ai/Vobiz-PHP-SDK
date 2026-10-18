<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * An RCS sender (agent): the verified brand identity that recipients see instead of a phone number. Send RCS from it by passing its `senderName` as `from` with `channel: rcs`.
 */
class Sender extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the sender on Vobiz (UUID). Use it in every `/senders/{id}` path.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (`MA_...`) that owns the sender.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $senderName Unique technical name of the sender on the RCS platform. Pass it as `from` when you send RCS. Fixed after creation.
     */
    #[JsonProperty('senderName')]
    public ?string $senderName;

    /**
     * @var ?string $displayName The brand name recipients see at the top of the conversation.
     */
    #[JsonProperty('displayName')]
    public ?string $displayName;

    /**
     * @var ?string $description Short description shown on the sender's info page.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $billingCategory How the RCS platform bills conversations from this sender, for example `CONVERSATIONAL` or `NON_CONVERSATIONAL`.
     */
    #[JsonProperty('billingCategory')]
    public ?string $billingCategory;

    /**
     * @var ?string $useCase The kind of traffic the sender carries, for example `OTP`, `TRANSACTIONAL`, `PROMOTIONAL` or `MULTI_USE`.
     */
    #[JsonProperty('useCase')]
    public ?string $useCase;

    /**
     * @var ?string $hostingRegion The region where the RCS platform hosts the sender, for example `NORTH_AMERICA`, `EUROPE` or `ASIA_PACIFIC`. Fixed after creation.
     */
    #[JsonProperty('hostingRegion')]
    public ?string $hostingRegion;

    /**
     * @var ?string $status Launch status reported by the RCS platform, stored on your account. `pending` until the platform reports otherwise. Call `GET /senders/{id}/status` to refresh it.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?SenderBrand $brand The brand the sender represents. Omitted when not set.
     */
    #[JsonProperty('brand')]
    public ?SenderBrand $brand;

    /**
     * @var ?string $color Accent colour as a hex code. Omitted when not set.
     */
    #[JsonProperty('color')]
    public ?string $color;

    /**
     * @var ?array<SenderPhone> $phones Contact phone numbers shown on the sender's info page. Omitted when none are set.
     */
    #[JsonProperty('phones'), ArrayType([SenderPhone::class])]
    public ?array $phones;

    /**
     * @var ?array<SenderEmail> $emails Contact email addresses shown on the sender's info page. Omitted when none are set.
     */
    #[JsonProperty('emails'), ArrayType([SenderEmail::class])]
    public ?array $emails;

    /**
     * @var ?array<SenderWebsite> $websites Websites shown on the sender's info page. Omitted when none are set.
     */
    #[JsonProperty('websites'), ArrayType([SenderWebsite::class])]
    public ?array $websites;

    /**
     * @var ?string $bannerUrl HTTPS URL of the banner image. Omitted when not set.
     */
    #[JsonProperty('bannerUrl')]
    public ?string $bannerUrl;

    /**
     * @var ?string $logoUrl HTTPS URL of the logo image. Omitted when not set.
     */
    #[JsonProperty('logoUrl')]
    public ?string $logoUrl;

    /**
     * @var ?SenderLink $privacy Link to your privacy policy.
     */
    #[JsonProperty('privacy')]
    public ?SenderLink $privacy;

    /**
     * @var ?SenderLink $termsOfService Link to your terms of service.
     */
    #[JsonProperty('termsOfService')]
    public ?SenderLink $termsOfService;

    /**
     * @var ?SenderPlatform $platform Identifiers the RCS platform assigned to your agent. Omitted when not set.
     */
    #[JsonProperty('platform')]
    public ?SenderPlatform $platform;

    /**
     * @var ?DateTime $createdAt When the sender was created on your account (ISO 8601, UTC).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the sender last changed, including status refreshes (ISO 8601, UTC).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   provider?: ?string,
     *   senderName?: ?string,
     *   displayName?: ?string,
     *   description?: ?string,
     *   billingCategory?: ?string,
     *   useCase?: ?string,
     *   hostingRegion?: ?string,
     *   status?: ?string,
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
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->senderName = $values['senderName'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->billingCategory = $values['billingCategory'] ?? null;
        $this->useCase = $values['useCase'] ?? null;
        $this->hostingRegion = $values['hostingRegion'] ?? null;
        $this->status = $values['status'] ?? null;
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
        $this->createdAt = $values['createdAt'] ?? null;
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
