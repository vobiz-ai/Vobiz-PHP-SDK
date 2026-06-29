<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class Application extends JsonSerializableType
{
    /**
     * @var ?string $appId
     */
    #[JsonProperty('app_id')]
    public ?string $appId;

    /**
     * @var ?string $appName
     */
    #[JsonProperty('app_name')]
    public ?string $appName;

    /**
     * @var ?string $applicationType
     */
    #[JsonProperty('application_type')]
    public ?string $applicationType;

    /**
     * @var ?string $answerUrl
     */
    #[JsonProperty('answer_url')]
    public ?string $answerUrl;

    /**
     * @var ?value-of<ApplicationAnswerMethod> $answerMethod
     */
    #[JsonProperty('answer_method')]
    public ?string $answerMethod;

    /**
     * @var ?string $hangupUrl
     */
    #[JsonProperty('hangup_url')]
    public ?string $hangupUrl;

    /**
     * @var ?value-of<ApplicationHangupMethod> $hangupMethod
     */
    #[JsonProperty('hangup_method')]
    public ?string $hangupMethod;

    /**
     * @var ?string $fallbackAnswerUrl
     */
    #[JsonProperty('fallback_answer_url')]
    public ?string $fallbackAnswerUrl;

    /**
     * @var ?value-of<ApplicationFallbackMethod> $fallbackMethod
     */
    #[JsonProperty('fallback_method')]
    public ?string $fallbackMethod;

    /**
     * @var ?string $messageUrl
     */
    #[JsonProperty('message_url')]
    public ?string $messageUrl;

    /**
     * @var ?value-of<ApplicationMessageMethod> $messageMethod
     */
    #[JsonProperty('message_method')]
    public ?string $messageMethod;

    /**
     * @var ?bool $defaultNumberApp
     */
    #[JsonProperty('default_number_app')]
    public ?bool $defaultNumberApp;

    /**
     * @var ?bool $defaultEndpointApp
     */
    #[JsonProperty('default_endpoint_app')]
    public ?bool $defaultEndpointApp;

    /**
     * @var ?bool $defaultApp
     */
    #[JsonProperty('default_app')]
    public ?bool $defaultApp;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?bool $logIncomingMessage
     */
    #[JsonProperty('log_incoming_message')]
    public ?bool $logIncomingMessage;

    /**
     * @var ?bool $publicUri
     */
    #[JsonProperty('public_uri')]
    public ?bool $publicUri;

    /**
     * @var ?string $sipTransferUrl
     */
    #[JsonProperty('sip_transfer_url')]
    public ?string $sipTransferUrl;

    /**
     * @var ?value-of<ApplicationSipTransferMethod> $sipTransferMethod
     */
    #[JsonProperty('sip_transfer_method')]
    public ?string $sipTransferMethod;

    /**
     * @var ?string $sipUri
     */
    #[JsonProperty('sip_uri')]
    public ?string $sipUri;

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
     *   appId?: ?string,
     *   appName?: ?string,
     *   applicationType?: ?string,
     *   answerUrl?: ?string,
     *   answerMethod?: ?value-of<ApplicationAnswerMethod>,
     *   hangupUrl?: ?string,
     *   hangupMethod?: ?value-of<ApplicationHangupMethod>,
     *   fallbackAnswerUrl?: ?string,
     *   fallbackMethod?: ?value-of<ApplicationFallbackMethod>,
     *   messageUrl?: ?string,
     *   messageMethod?: ?value-of<ApplicationMessageMethod>,
     *   defaultNumberApp?: ?bool,
     *   defaultEndpointApp?: ?bool,
     *   defaultApp?: ?bool,
     *   enabled?: ?bool,
     *   logIncomingMessage?: ?bool,
     *   publicUri?: ?bool,
     *   sipTransferUrl?: ?string,
     *   sipTransferMethod?: ?value-of<ApplicationSipTransferMethod>,
     *   sipUri?: ?string,
     *   subAccount?: ?string,
     *   resourceUri?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->appId = $values['appId'] ?? null;
        $this->appName = $values['appName'] ?? null;
        $this->applicationType = $values['applicationType'] ?? null;
        $this->answerUrl = $values['answerUrl'] ?? null;
        $this->answerMethod = $values['answerMethod'] ?? null;
        $this->hangupUrl = $values['hangupUrl'] ?? null;
        $this->hangupMethod = $values['hangupMethod'] ?? null;
        $this->fallbackAnswerUrl = $values['fallbackAnswerUrl'] ?? null;
        $this->fallbackMethod = $values['fallbackMethod'] ?? null;
        $this->messageUrl = $values['messageUrl'] ?? null;
        $this->messageMethod = $values['messageMethod'] ?? null;
        $this->defaultNumberApp = $values['defaultNumberApp'] ?? null;
        $this->defaultEndpointApp = $values['defaultEndpointApp'] ?? null;
        $this->defaultApp = $values['defaultApp'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->logIncomingMessage = $values['logIncomingMessage'] ?? null;
        $this->publicUri = $values['publicUri'] ?? null;
        $this->sipTransferUrl = $values['sipTransferUrl'] ?? null;
        $this->sipTransferMethod = $values['sipTransferMethod'] ?? null;
        $this->sipUri = $values['sipUri'] ?? null;
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
