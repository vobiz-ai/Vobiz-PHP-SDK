<?php

namespace Vobiz\Trunks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Trunks\Types\CreateTrunkRequestTrunkDirection;
use Vobiz\Trunks\Types\CreateTrunkRequestTrunkStatus;
use Vobiz\Trunks\Types\CreateTrunkRequestTransport;
use Vobiz\Trunks\Types\CreateTrunkRequestWebhookMethod;
use Vobiz\Core\Types\ArrayType;

class CreateTrunkRequest extends JsonSerializableType
{
    /**
     * @var string $name Trunk name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?value-of<CreateTrunkRequestTrunkDirection> $trunkDirection Direction of the trunk - **`inbound` or `outbound` only** (a trunk is one direction, not both).
     */
    #[JsonProperty('trunk_direction')]
    public ?string $trunkDirection;

    /**
     * @var ?value-of<CreateTrunkRequestTrunkStatus> $trunkStatus Trunk status - `enabled` or `disabled` (note: not `active`).
     */
    #[JsonProperty('trunk_status')]
    public ?string $trunkStatus;

    /**
     * @var ?bool $secure
     */
    #[JsonProperty('secure')]
    public ?bool $secure;

    /**
     * @var ?string $trunkDomain SIP domain. Auto-generated as `{first8ofUUID}.sip.vobiz.ai` if omitted.
     */
    #[JsonProperty('trunk_domain')]
    public ?string $trunkDomain;

    /**
     * @var ?value-of<CreateTrunkRequestTransport> $transport
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
     * @var ?int $concurrentCallsLimit Stored on the trunk. The **enforced** concurrency limit is account-level (account base + channel subscriptions), not this field.
     */
    #[JsonProperty('concurrent_calls_limit')]
    public ?int $concurrentCallsLimit;

    /**
     * @var ?int $cpsLimit Stored on the trunk. The **enforced** CPS is account-level, not this field.
     */
    #[JsonProperty('cps_limit')]
    public ?int $cpsLimit;

    /**
     * @var ?string $credentialUuid Attach an existing SIP credential (username / password / realm) by UUID.
     */
    #[JsonProperty('credential_uuid')]
    public ?string $credentialUuid;

    /**
     * @var ?string $ipaclUuid Attach an existing IP access-control list (IP-based auth) by UUID.
     */
    #[JsonProperty('ipacl_uuid')]
    public ?string $ipaclUuid;

    /**
     * @var ?string $primaryUriUuid Primary origination URI UUID.
     */
    #[JsonProperty('primary_uri_uuid')]
    public ?string $primaryUriUuid;

    /**
     * @var ?string $fallbackUriUuid Fallback origination URI UUID.
     */
    #[JsonProperty('fallback_uri_uuid')]
    public ?string $fallbackUriUuid;

    /**
     * @var ?bool $recording Enable call recording.
     */
    #[JsonProperty('recording')]
    public ?bool $recording;

    /**
     * @var ?bool $enableTranscription Auto-transcribe recordings when `recording=true`.
     */
    #[JsonProperty('enable_transcription')]
    public ?bool $enableTranscription;

    /**
     * @var ?bool $piiRedaction Redact PII from transcriptions.
     */
    #[JsonProperty('pii_redaction')]
    public ?bool $piiRedaction;

    /**
     * @var ?string $piiEntityTypes Comma-separated list of entity types to redact.
     */
    #[JsonProperty('pii_entity_types')]
    public ?string $piiEntityTypes;

    /**
     * Customer webhook for call-admission events (`CallInitiated` / `Hangup`).
     * Must be a valid **public** http/https URL. SSRF-validated - localhost,
     * private (RFC1918), and cloud-metadata (`169.254.169.254`) URLs are
     * rejected with `invalid webhook_url`. See [Trunk Webhooks](/trunks/webhook).
     *
     * @var ?string $webhookUrl
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?value-of<CreateTrunkRequestWebhookMethod> $webhookMethod HTTP method for the webhook callback.
     */
    #[JsonProperty('webhook_method')]
    public ?string $webhookMethod;

    /**
     * @var ?bool $recordingWebhookEnabled Fire a `recording.completed` webhook to `webhook_url` after a recording is saved.
     */
    #[JsonProperty('recording_webhook_enabled')]
    public ?bool $recordingWebhookEnabled;

    /**
     * @var ?string $username Deprecated - use `credential_uuid`.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $password Deprecated - use `credential_uuid`.
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?array<string> $ipWhitelist Deprecated - use `ipacl_uuid`.
     */
    #[JsonProperty('ip_whitelist'), ArrayType(['string'])]
    public ?array $ipWhitelist;

    /**
     * @param array{
     *   name: string,
     *   trunkDirection?: ?value-of<CreateTrunkRequestTrunkDirection>,
     *   trunkStatus?: ?value-of<CreateTrunkRequestTrunkStatus>,
     *   secure?: ?bool,
     *   trunkDomain?: ?string,
     *   transport?: ?value-of<CreateTrunkRequestTransport>,
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
     *   webhookMethod?: ?value-of<CreateTrunkRequestWebhookMethod>,
     *   recordingWebhookEnabled?: ?bool,
     *   username?: ?string,
     *   password?: ?string,
     *   ipWhitelist?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
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
        $this->username = $values['username'] ?? null;
        $this->password = $values['password'] ?? null;
        $this->ipWhitelist = $values['ipWhitelist'] ?? null;
    }
}
