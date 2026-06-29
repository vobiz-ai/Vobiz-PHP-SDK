<?php

namespace Vobiz\Endpoints\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class RetrieveEndpointResponse extends JsonSerializableType
{
    /**
     * @var string $alias
     */
    #[JsonProperty('alias')]
    public string $alias;

    /**
     * @var string $application
     */
    #[JsonProperty('application')]
    public string $application;

    /**
     * @var string $endpointId
     */
    #[JsonProperty('endpoint_id')]
    public string $endpointId;

    /**
     * @var string $resourceUri
     */
    #[JsonProperty('resource_uri')]
    public string $resourceUri;

    /**
     * @var string $sipRegistered
     */
    #[JsonProperty('sip_registered')]
    public string $sipRegistered;

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
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @param array{
     *   alias: string,
     *   application: string,
     *   endpointId: string,
     *   resourceUri: string,
     *   sipRegistered: string,
     *   sipUri: string,
     *   username: string,
     *   subAccount?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->alias = $values['alias'];
        $this->application = $values['application'];
        $this->endpointId = $values['endpointId'];
        $this->resourceUri = $values['resourceUri'];
        $this->sipRegistered = $values['sipRegistered'];
        $this->sipUri = $values['sipUri'];
        $this->subAccount = $values['subAccount'] ?? null;
        $this->username = $values['username'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
