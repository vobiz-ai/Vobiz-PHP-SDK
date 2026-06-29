<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class Endpoint extends JsonSerializableType
{
    /**
     * @var ?string $endpointId
     */
    #[JsonProperty('endpoint_id')]
    public ?string $endpointId;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $alias
     */
    #[JsonProperty('alias')]
    public ?string $alias;

    /**
     * @var ?string $sipUri
     */
    #[JsonProperty('sip_uri')]
    public ?string $sipUri;

    /**
     * @var ?value-of<EndpointSipRegistered> $sipRegistered
     */
    #[JsonProperty('sip_registered')]
    public ?string $sipRegistered;

    /**
     * @var ?string $sipContact
     */
    #[JsonProperty('sip_contact')]
    public ?string $sipContact;

    /**
     * @var ?DateTime $sipExpires
     */
    #[JsonProperty('sip_expires'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sipExpires;

    /**
     * @var ?string $sipUserAgent
     */
    #[JsonProperty('sip_user_agent')]
    public ?string $sipUserAgent;

    /**
     * @var ?EndpointApplication $application
     */
    #[JsonProperty('application')]
    public ?EndpointApplication $application;

    /**
     * @var ?bool $allowVoice
     */
    #[JsonProperty('allow_voice')]
    public ?bool $allowVoice;

    /**
     * @var ?bool $allowMessage
     */
    #[JsonProperty('allow_message')]
    public ?bool $allowMessage;

    /**
     * @var ?bool $allowVideo
     */
    #[JsonProperty('allow_video')]
    public ?bool $allowVideo;

    /**
     * @var ?bool $allowSameDomain
     */
    #[JsonProperty('allow_same_domain')]
    public ?bool $allowSameDomain;

    /**
     * @var ?bool $allowOtherDomains
     */
    #[JsonProperty('allow_other_domains')]
    public ?bool $allowOtherDomains;

    /**
     * @var ?bool $allowPhones
     */
    #[JsonProperty('allow_phones')]
    public ?bool $allowPhones;

    /**
     * @var ?bool $allowApps
     */
    #[JsonProperty('allow_apps')]
    public ?bool $allowApps;

    /**
     * @var ?string $subAccount
     */
    #[JsonProperty('sub_account')]
    public ?string $subAccount;

    /**
     * @var ?string $resourceUri
     */
    #[JsonProperty('resource_uri')]
    public ?string $resourceUri;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   endpointId?: ?string,
     *   username?: ?string,
     *   alias?: ?string,
     *   sipUri?: ?string,
     *   sipRegistered?: ?value-of<EndpointSipRegistered>,
     *   sipContact?: ?string,
     *   sipExpires?: ?DateTime,
     *   sipUserAgent?: ?string,
     *   application?: ?EndpointApplication,
     *   allowVoice?: ?bool,
     *   allowMessage?: ?bool,
     *   allowVideo?: ?bool,
     *   allowSameDomain?: ?bool,
     *   allowOtherDomains?: ?bool,
     *   allowPhones?: ?bool,
     *   allowApps?: ?bool,
     *   subAccount?: ?string,
     *   resourceUri?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->endpointId = $values['endpointId'] ?? null;
        $this->username = $values['username'] ?? null;
        $this->alias = $values['alias'] ?? null;
        $this->sipUri = $values['sipUri'] ?? null;
        $this->sipRegistered = $values['sipRegistered'] ?? null;
        $this->sipContact = $values['sipContact'] ?? null;
        $this->sipExpires = $values['sipExpires'] ?? null;
        $this->sipUserAgent = $values['sipUserAgent'] ?? null;
        $this->application = $values['application'] ?? null;
        $this->allowVoice = $values['allowVoice'] ?? null;
        $this->allowMessage = $values['allowMessage'] ?? null;
        $this->allowVideo = $values['allowVideo'] ?? null;
        $this->allowSameDomain = $values['allowSameDomain'] ?? null;
        $this->allowOtherDomains = $values['allowOtherDomains'] ?? null;
        $this->allowPhones = $values['allowPhones'] ?? null;
        $this->allowApps = $values['allowApps'] ?? null;
        $this->subAccount = $values['subAccount'] ?? null;
        $this->resourceUri = $values['resourceUri'] ?? null;
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
