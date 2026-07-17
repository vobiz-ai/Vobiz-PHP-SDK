<?php

namespace Vobiz\Trunks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Trunks\Types\UpdateTrunkRequestTrunkDirection;
use Vobiz\Trunks\Types\UpdateTrunkRequestTrunkStatus;
use Vobiz\Trunks\Types\UpdateTrunkRequestTransport;
use Vobiz\Trunks\Types\UpdateTrunkRequestWebhookMethod;

class UpdateTrunkRequest extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<UpdateTrunkRequestTrunkDirection> $trunkDirection Direction of the trunk - `inbound` or `outbound` only.
     */
    #[JsonProperty('trunk_direction')]
    public ?string $trunkDirection;

    /**
     * @var ?value-of<UpdateTrunkRequestTrunkStatus> $trunkStatus
     */
    #[JsonProperty('trunk_status')]
    public ?string $trunkStatus;

    /**
     * @var ?bool $secure
     */
    #[JsonProperty('secure')]
    public ?bool $secure;

    /**
     * @var ?string $trunkDomain
     */
    #[JsonProperty('trunk_domain')]
    public ?string $trunkDomain;

    /**
     * @var ?value-of<UpdateTrunkRequestTransport> $transport
     */
    #[JsonProperty('transport')]
    public ?string $transport;

    /**
     * @var ?string $inboundDestination
     */
    #[JsonProperty('inbound_destination')]
    public ?string $inboundDestination;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $concurrentCallsLimit
     */
    #[JsonProperty('concurrent_calls_limit')]
    public ?int $concurrentCallsLimit;

    /**
     * @var ?int $cpsLimit
     */
    #[JsonProperty('cps_limit')]
    public ?int $cpsLimit;

    /**
     * @var ?string $credentialUuid
     */
    #[JsonProperty('credential_uuid')]
    public ?string $credentialUuid;

    /**
     * @var ?string $ipaclUuid
     */
    #[JsonProperty('ipacl_uuid')]
    public ?string $ipaclUuid;

    /**
     * @var ?string $primaryUriUuid
     */
    #[JsonProperty('primary_uri_uuid')]
    public ?string $primaryUriUuid;

    /**
     * @var ?string $fallbackUriUuid
     */
    #[JsonProperty('fallback_uri_uuid')]
    public ?string $fallbackUriUuid;

    /**
     * @var ?bool $recording
     */
    #[JsonProperty('recording')]
    public ?bool $recording;

    /**
     * @var ?bool $enableTranscription
     */
    #[JsonProperty('enable_transcription')]
    public ?bool $enableTranscription;

    /**
     * @var ?bool $piiRedaction
     */
    #[JsonProperty('pii_redaction')]
    public ?bool $piiRedaction;

    /**
     * @var ?string $piiEntityTypes
     */
    #[JsonProperty('pii_entity_types')]
    public ?string $piiEntityTypes;

    /**
     * @var ?string $webhookUrl Customer webhook for call-admission events (`CallInitiated` / `Hangup`). Public http/https URL; SSRF-validated. See [Trunk Webhooks](/trunks/webhook).
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?value-of<UpdateTrunkRequestWebhookMethod> $webhookMethod
     */
    #[JsonProperty('webhook_method')]
    public ?string $webhookMethod;

    /**
     * @var ?bool $recordingWebhookEnabled
     */
    #[JsonProperty('recording_webhook_enabled')]
    public ?bool $recordingWebhookEnabled;

    /**
     * @param array{
     *   name?: ?string,
     *   trunkDirection?: ?value-of<UpdateTrunkRequestTrunkDirection>,
     *   trunkStatus?: ?value-of<UpdateTrunkRequestTrunkStatus>,
     *   secure?: ?bool,
     *   trunkDomain?: ?string,
     *   transport?: ?value-of<UpdateTrunkRequestTransport>,
     *   inboundDestination?: ?string,
     *   description?: ?string,
     *   concurrentCallsLimit?: ?int,
     *   cpsLimit?: ?int,
     *   credentialUuid?: ?string,
     *   ipaclUuid?: ?string,
     *   primaryUriUuid?: ?string,
     *   fallbackUriUuid?: ?string,
     *   recording?: ?bool,
     *   enableTranscription?: ?bool,
     *   piiRedaction?: ?bool,
     *   piiEntityTypes?: ?string,
     *   webhookUrl?: ?string,
     *   webhookMethod?: ?value-of<UpdateTrunkRequestWebhookMethod>,
     *   recordingWebhookEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->trunkDirection = $values['trunkDirection'] ?? null;
        $this->trunkStatus = $values['trunkStatus'] ?? null;
        $this->secure = $values['secure'] ?? null;
        $this->trunkDomain = $values['trunkDomain'] ?? null;
        $this->transport = $values['transport'] ?? null;
        $this->inboundDestination = $values['inboundDestination'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->concurrentCallsLimit = $values['concurrentCallsLimit'] ?? null;
        $this->cpsLimit = $values['cpsLimit'] ?? null;
        $this->credentialUuid = $values['credentialUuid'] ?? null;
        $this->ipaclUuid = $values['ipaclUuid'] ?? null;
        $this->primaryUriUuid = $values['primaryUriUuid'] ?? null;
        $this->fallbackUriUuid = $values['fallbackUriUuid'] ?? null;
        $this->recording = $values['recording'] ?? null;
        $this->enableTranscription = $values['enableTranscription'] ?? null;
        $this->piiRedaction = $values['piiRedaction'] ?? null;
        $this->piiEntityTypes = $values['piiEntityTypes'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->webhookMethod = $values['webhookMethod'] ?? null;
        $this->recordingWebhookEnabled = $values['recordingWebhookEnabled'] ?? null;
    }
}
