<?php

namespace Vobiz\LiveCalls\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetQueuedCallResponse extends JsonSerializableType
{
    /**
     * @var string $apiId Unique identifier for this API request
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var string $callStatus Always queued for this endpoint
     */
    #[JsonProperty('call_status')]
    public string $callStatus;

    /**
     * @var string $callUuid
     */
    #[JsonProperty('call_uuid')]
    public string $callUuid;

    /**
     * @var string $requestUuid
     */
    #[JsonProperty('request_uuid')]
    public string $requestUuid;

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
     * @var string $to
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @param array{
     *   apiId: string,
     *   callStatus: string,
     *   callUuid: string,
     *   requestUuid: string,
     *   callerName: string,
     *   direction: string,
     *   from: string,
     *   to: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->callStatus = $values['callStatus'];
        $this->callUuid = $values['callUuid'];
        $this->requestUuid = $values['requestUuid'];
        $this->callerName = $values['callerName'];
        $this->direction = $values['direction'];
        $this->from = $values['from'];
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
