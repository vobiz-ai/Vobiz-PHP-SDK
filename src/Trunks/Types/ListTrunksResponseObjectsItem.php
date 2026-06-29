<?php

namespace Vobiz\Trunks\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListTrunksResponseObjectsItem extends JsonSerializableType
{
    /**
     * @var string $trunkId
     */
    #[JsonProperty('trunk_id')]
    public string $trunkId;

    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $trunkDomain
     */
    #[JsonProperty('trunk_domain')]
    public string $trunkDomain;

    /**
     * @var string $trunkStatus
     */
    #[JsonProperty('trunk_status')]
    public string $trunkStatus;

    /**
     * @var bool $secure
     */
    #[JsonProperty('secure')]
    public bool $secure;

    /**
     * @var string $trunkDirection
     */
    #[JsonProperty('trunk_direction')]
    public string $trunkDirection;

    /**
     * @var int $concurrentCallsLimit
     */
    #[JsonProperty('concurrent_calls_limit')]
    public int $concurrentCallsLimit;

    /**
     * @var int $cpsLimit
     */
    #[JsonProperty('cps_limit')]
    public int $cpsLimit;

    /**
     * @var ?string $credentialUuid
     */
    #[JsonProperty('credential_uuid')]
    public ?string $credentialUuid;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $transport
     */
    #[JsonProperty('transport')]
    public string $transport;

    /**
     * @var bool $recording
     */
    #[JsonProperty('recording')]
    public bool $recording;

    /**
     * @var bool $enableTranscription
     */
    #[JsonProperty('enable_transcription')]
    public bool $enableTranscription;

    /**
     * @var bool $piiRedaction
     */
    #[JsonProperty('pii_redaction')]
    public bool $piiRedaction;

    /**
     * @var string $webhookMethod
     */
    #[JsonProperty('webhook_method')]
    public string $webhookMethod;

    /**
     * @var bool $recordingWebhookEnabled
     */
    #[JsonProperty('recording_webhook_enabled')]
    public bool $recordingWebhookEnabled;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @var ?string $primaryUriUuid
     */
    #[JsonProperty('primary_uri_uuid')]
    public ?string $primaryUriUuid;

    /**
     * @var ?string $inboundDestination
     */
    #[JsonProperty('inbound_destination')]
    public ?string $inboundDestination;

    /**
     * @var ?string $piiEntityTypes
     */
    #[JsonProperty('pii_entity_types')]
    public ?string $piiEntityTypes;

    /**
     * @var ?string $webhookUrl
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @param array{
     *   trunkId: string,
     *   accountId: string,
     *   name: string,
     *   trunkDomain: string,
     *   trunkStatus: string,
     *   secure: bool,
     *   trunkDirection: string,
     *   concurrentCallsLimit: int,
     *   cpsLimit: int,
     *   description: string,
     *   transport: string,
     *   recording: bool,
     *   enableTranscription: bool,
     *   piiRedaction: bool,
     *   webhookMethod: string,
     *   recordingWebhookEnabled: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   credentialUuid?: ?string,
     *   primaryUriUuid?: ?string,
     *   inboundDestination?: ?string,
     *   piiEntityTypes?: ?string,
     *   webhookUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->trunkId = $values['trunkId'];
        $this->accountId = $values['accountId'];
        $this->name = $values['name'];
        $this->trunkDomain = $values['trunkDomain'];
        $this->trunkStatus = $values['trunkStatus'];
        $this->secure = $values['secure'];
        $this->trunkDirection = $values['trunkDirection'];
        $this->concurrentCallsLimit = $values['concurrentCallsLimit'];
        $this->cpsLimit = $values['cpsLimit'];
        $this->credentialUuid = $values['credentialUuid'] ?? null;
        $this->description = $values['description'];
        $this->transport = $values['transport'];
        $this->recording = $values['recording'];
        $this->enableTranscription = $values['enableTranscription'];
        $this->piiRedaction = $values['piiRedaction'];
        $this->webhookMethod = $values['webhookMethod'];
        $this->recordingWebhookEnabled = $values['recordingWebhookEnabled'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->primaryUriUuid = $values['primaryUriUuid'] ?? null;
        $this->inboundDestination = $values['inboundDestination'] ?? null;
        $this->piiEntityTypes = $values['piiEntityTypes'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
