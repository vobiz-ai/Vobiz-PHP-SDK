<?php

namespace Vobiz\Applications\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class RetrieveApplicationResponse extends JsonSerializableType
{
    /**
     * @var string $answerMethod
     */
    #[JsonProperty('answer_method')]
    public string $answerMethod;

    /**
     * @var string $answerUrl
     */
    #[JsonProperty('answer_url')]
    public string $answerUrl;

    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var string $appId
     */
    #[JsonProperty('app_id')]
    public string $appId;

    /**
     * @var string $appName
     */
    #[JsonProperty('app_name')]
    public string $appName;

    /**
     * @var string $applicationType
     */
    #[JsonProperty('application_type')]
    public string $applicationType;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var bool $defaultApp
     */
    #[JsonProperty('default_app')]
    public bool $defaultApp;

    /**
     * @var bool $defaultEndpointApp
     */
    #[JsonProperty('default_endpoint_app')]
    public bool $defaultEndpointApp;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var mixed $fallbackAnswerUrl
     */
    #[JsonProperty('fallback_answer_url')]
    public mixed $fallbackAnswerUrl;

    /**
     * @var string $fallbackMethod
     */
    #[JsonProperty('fallback_method')]
    public string $fallbackMethod;

    /**
     * @var string $hangupMethod
     */
    #[JsonProperty('hangup_method')]
    public string $hangupMethod;

    /**
     * @var string $hangupUrl
     */
    #[JsonProperty('hangup_url')]
    public string $hangupUrl;

    /**
     * @var bool $logIncomingMessage
     */
    #[JsonProperty('log_incoming_message')]
    public bool $logIncomingMessage;

    /**
     * @var string $messageMethod
     */
    #[JsonProperty('message_method')]
    public string $messageMethod;

    /**
     * @var mixed $messageUrl
     */
    #[JsonProperty('message_url')]
    public mixed $messageUrl;

    /**
     * @var bool $publicUri
     */
    #[JsonProperty('public_uri')]
    public bool $publicUri;

    /**
     * @var string $resourceUri
     */
    #[JsonProperty('resource_uri')]
    public string $resourceUri;

    /**
     * @var string $sipTransferMethod
     */
    #[JsonProperty('sip_transfer_method')]
    public string $sipTransferMethod;

    /**
     * @var mixed $sipTransferUrl
     */
    #[JsonProperty('sip_transfer_url')]
    public mixed $sipTransferUrl;

    /**
     * @var string $sipUri
     */
    #[JsonProperty('sip_uri')]
    public string $sipUri;

    /**
     * @var mixed $subAccount
     */
    #[JsonProperty('sub_account')]
    public mixed $subAccount;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   answerMethod: string,
     *   answerUrl: string,
     *   apiId: string,
     *   appId: string,
     *   appName: string,
     *   applicationType: string,
     *   createdAt: string,
     *   defaultApp: bool,
     *   defaultEndpointApp: bool,
     *   enabled: bool,
     *   fallbackMethod: string,
     *   hangupMethod: string,
     *   hangupUrl: string,
     *   logIncomingMessage: bool,
     *   messageMethod: string,
     *   publicUri: bool,
     *   resourceUri: string,
     *   sipTransferMethod: string,
     *   sipUri: string,
     *   updatedAt: string,
     *   fallbackAnswerUrl?: mixed,
     *   messageUrl?: mixed,
     *   sipTransferUrl?: mixed,
     *   subAccount?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->answerMethod = $values['answerMethod'];
        $this->answerUrl = $values['answerUrl'];
        $this->apiId = $values['apiId'];
        $this->appId = $values['appId'];
        $this->appName = $values['appName'];
        $this->applicationType = $values['applicationType'];
        $this->createdAt = $values['createdAt'];
        $this->defaultApp = $values['defaultApp'];
        $this->defaultEndpointApp = $values['defaultEndpointApp'];
        $this->enabled = $values['enabled'];
        $this->fallbackAnswerUrl = $values['fallbackAnswerUrl'] ?? null;
        $this->fallbackMethod = $values['fallbackMethod'];
        $this->hangupMethod = $values['hangupMethod'];
        $this->hangupUrl = $values['hangupUrl'];
        $this->logIncomingMessage = $values['logIncomingMessage'];
        $this->messageMethod = $values['messageMethod'];
        $this->messageUrl = $values['messageUrl'] ?? null;
        $this->publicUri = $values['publicUri'];
        $this->resourceUri = $values['resourceUri'];
        $this->sipTransferMethod = $values['sipTransferMethod'];
        $this->sipTransferUrl = $values['sipTransferUrl'] ?? null;
        $this->sipUri = $values['sipUri'];
        $this->subAccount = $values['subAccount'] ?? null;
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
