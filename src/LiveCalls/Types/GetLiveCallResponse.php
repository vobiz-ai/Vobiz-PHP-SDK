<?php

namespace Vobiz\LiveCalls\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetLiveCallResponse extends JsonSerializableType
{
    /**
     * @var string $apiId Unique identifier for this API request
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var string $callStatus Current state of the call (e.g. in-progress)
     */
    #[JsonProperty('call_status')]
    public string $callStatus;

    /**
     * @var string $callUuid
     */
    #[JsonProperty('call_uuid')]
    public string $callUuid;

    /**
     * @var string $callerName
     */
    #[JsonProperty('caller_name')]
    public string $callerName;

    /**
     * @var string $direction
     */
    #[JsonProperty('direction')]
    public string $direction;

    /**
     * @var string $from
     */
    #[JsonProperty('from')]
    public string $from;

    /**
     * @var string $requestUuid
     */
    #[JsonProperty('request_uuid')]
    public string $requestUuid;

    /**
     * @var string $sessionStart
     */
    #[JsonProperty('session_start')]
    public string $sessionStart;

    /**
     * @var string $stirAttestation
     */
    #[JsonProperty('stir_attestation')]
    public string $stirAttestation;

    /**
     * @var string $stirVerification
     */
    #[JsonProperty('stir_verification')]
    public string $stirVerification;

    /**
     * @var string $to
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @param array{
     *   apiId: string,
     *   callStatus: string,
     *   callUuid: string,
     *   callerName: string,
     *   direction: string,
     *   from: string,
     *   requestUuid: string,
     *   sessionStart: string,
     *   stirAttestation: string,
     *   stirVerification: string,
     *   to: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->callStatus = $values['callStatus'];
        $this->callUuid = $values['callUuid'];
        $this->callerName = $values['callerName'];
        $this->direction = $values['direction'];
        $this->from = $values['from'];
        $this->requestUuid = $values['requestUuid'];
        $this->sessionStart = $values['sessionStart'];
        $this->stirAttestation = $values['stirAttestation'];
        $this->stirVerification = $values['stirVerification'];
        $this->to = $values['to'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
