<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetCdrResponseData extends JsonSerializableType
{
    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var string $answerTime
     */
    #[JsonProperty('answer_time')]
    public string $answerTime;

    /**
     * @var int $billsec
     */
    #[JsonProperty('billsec')]
    public int $billsec;

    /**
     * @var string $bridgeUuid
     */
    #[JsonProperty('bridge_uuid')]
    public string $bridgeUuid;

    /**
     * @var string $callDirection
     */
    #[JsonProperty('call_direction')]
    public string $callDirection;

    /**
     * @var string $callerIdName
     */
    #[JsonProperty('caller_id_name')]
    public string $callerIdName;

    /**
     * @var string $callerIdNumber
     */
    #[JsonProperty('caller_id_number')]
    public string $callerIdNumber;

    /**
     * @var mixed $campaignId
     */
    #[JsonProperty('campaign_id')]
    public mixed $campaignId;

    /**
     * @var mixed $carrierIp
     */
    #[JsonProperty('carrier_ip')]
    public mixed $carrierIp;

    /**
     * @var string $codec
     */
    #[JsonProperty('codec')]
    public string $codec;

    /**
     * @var string $context
     */
    #[JsonProperty('context')]
    public string $context;

    /**
     * @var float $cost
     */
    #[JsonProperty('cost')]
    public float $cost;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var mixed $customerEndpoint
     */
    #[JsonProperty('customer_endpoint')]
    public mixed $customerEndpoint;

    /**
     * @var string $destinationNumber
     */
    #[JsonProperty('destination_number')]
    public string $destinationNumber;

    /**
     * @var int $duration
     */
    #[JsonProperty('duration')]
    public int $duration;

    /**
     * @var string $endTime
     */
    #[JsonProperty('end_time')]
    public string $endTime;

    /**
     * @var mixed $failureCode
     */
    #[JsonProperty('failure_code')]
    public mixed $failureCode;

    /**
     * @var mixed $failureReason
     */
    #[JsonProperty('failure_reason')]
    public mixed $failureReason;

    /**
     * @var string $hangupCause
     */
    #[JsonProperty('hangup_cause')]
    public string $hangupCause;

    /**
     * @var int $hangupCauseCode
     */
    #[JsonProperty('hangup_cause_code')]
    public int $hangupCauseCode;

    /**
     * @var string $hangupCauseName
     */
    #[JsonProperty('hangup_cause_name')]
    public string $hangupCauseName;

    /**
     * @var string $hangupDisposition
     */
    #[JsonProperty('hangup_disposition')]
    public string $hangupDisposition;

    /**
     * @var string $hangupSource
     */
    #[JsonProperty('hangup_source')]
    public string $hangupSource;

    /**
     * @var int $id
     */
    #[JsonProperty('id')]
    public int $id;

    /**
     * @var float $jitter
     */
    #[JsonProperty('jitter')]
    public float $jitter;

    /**
     * @var float $mos
     */
    #[JsonProperty('mos')]
    public float $mos;

    /**
     * @var string $networkAddr
     */
    #[JsonProperty('network_addr')]
    public string $networkAddr;

    /**
     * @var string $originationRegion
     */
    #[JsonProperty('origination_region')]
    public string $originationRegion;

    /**
     * @var int $packetLoss
     */
    #[JsonProperty('packet_loss')]
    public int $packetLoss;

    /**
     * @var string $progressTime
     */
    #[JsonProperty('progress_time')]
    public string $progressTime;

    /**
     * @var string $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var int $ringTime
     */
    #[JsonProperty('ring_time')]
    public int $ringTime;

    /**
     * @var string $sipCallId
     */
    #[JsonProperty('sip_call_id')]
    public string $sipCallId;

    /**
     * @var string $sipUserAgent
     */
    #[JsonProperty('sip_user_agent')]
    public string $sipUserAgent;

    /**
     * @var string $startTime
     */
    #[JsonProperty('start_time')]
    public string $startTime;

    /**
     * @var int $streamingCost
     */
    #[JsonProperty('streaming_cost')]
    public int $streamingCost;

    /**
     * @var mixed $terminatedTo
     */
    #[JsonProperty('terminated_to')]
    public mixed $terminatedTo;

    /**
     * @var float $totalCost
     */
    #[JsonProperty('total_cost')]
    public float $totalCost;

    /**
     * @var mixed $trunkId
     */
    #[JsonProperty('trunk_id')]
    public mixed $trunkId;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @param array{
     *   accountId: string,
     *   answerTime: string,
     *   billsec: int,
     *   bridgeUuid: string,
     *   callDirection: string,
     *   callerIdName: string,
     *   callerIdNumber: string,
     *   codec: string,
     *   context: string,
     *   cost: float,
     *   createdAt: string,
     *   currency: string,
     *   destinationNumber: string,
     *   duration: int,
     *   endTime: string,
     *   hangupCause: string,
     *   hangupCauseCode: int,
     *   hangupCauseName: string,
     *   hangupDisposition: string,
     *   hangupSource: string,
     *   id: int,
     *   jitter: float,
     *   mos: float,
     *   networkAddr: string,
     *   originationRegion: string,
     *   packetLoss: int,
     *   progressTime: string,
     *   region: string,
     *   ringTime: int,
     *   sipCallId: string,
     *   sipUserAgent: string,
     *   startTime: string,
     *   streamingCost: int,
     *   totalCost: float,
     *   updatedAt: string,
     *   uuid: string,
     *   campaignId?: mixed,
     *   carrierIp?: mixed,
     *   customerEndpoint?: mixed,
     *   failureCode?: mixed,
     *   failureReason?: mixed,
     *   terminatedTo?: mixed,
     *   trunkId?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->answerTime = $values['answerTime'];
        $this->billsec = $values['billsec'];
        $this->bridgeUuid = $values['bridgeUuid'];
        $this->callDirection = $values['callDirection'];
        $this->callerIdName = $values['callerIdName'];
        $this->callerIdNumber = $values['callerIdNumber'];
        $this->campaignId = $values['campaignId'] ?? null;
        $this->carrierIp = $values['carrierIp'] ?? null;
        $this->codec = $values['codec'];
        $this->context = $values['context'];
        $this->cost = $values['cost'];
        $this->createdAt = $values['createdAt'];
        $this->currency = $values['currency'];
        $this->customerEndpoint = $values['customerEndpoint'] ?? null;
        $this->destinationNumber = $values['destinationNumber'];
        $this->duration = $values['duration'];
        $this->endTime = $values['endTime'];
        $this->failureCode = $values['failureCode'] ?? null;
        $this->failureReason = $values['failureReason'] ?? null;
        $this->hangupCause = $values['hangupCause'];
        $this->hangupCauseCode = $values['hangupCauseCode'];
        $this->hangupCauseName = $values['hangupCauseName'];
        $this->hangupDisposition = $values['hangupDisposition'];
        $this->hangupSource = $values['hangupSource'];
        $this->id = $values['id'];
        $this->jitter = $values['jitter'];
        $this->mos = $values['mos'];
        $this->networkAddr = $values['networkAddr'];
        $this->originationRegion = $values['originationRegion'];
        $this->packetLoss = $values['packetLoss'];
        $this->progressTime = $values['progressTime'];
        $this->region = $values['region'];
        $this->ringTime = $values['ringTime'];
        $this->sipCallId = $values['sipCallId'];
        $this->sipUserAgent = $values['sipUserAgent'];
        $this->startTime = $values['startTime'];
        $this->streamingCost = $values['streamingCost'];
        $this->terminatedTo = $values['terminatedTo'] ?? null;
        $this->totalCost = $values['totalCost'];
        $this->trunkId = $values['trunkId'] ?? null;
        $this->updatedAt = $values['updatedAt'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
