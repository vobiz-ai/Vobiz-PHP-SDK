<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListRecentCdrsResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var ?string $answerTime
     */
    #[JsonProperty('answer_time')]
    public ?string $answerTime;

    /**
     * @var int $billsec
     */
    #[JsonProperty('billsec')]
    public int $billsec;

    /**
     * @var ?string $bridgeUuid
     */
    #[JsonProperty('bridge_uuid')]
    public ?string $bridgeUuid;

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
     * @var ?string $codec
     */
    #[JsonProperty('codec')]
    public ?string $codec;

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
     * @var ?string $failureCode
     */
    #[JsonProperty('failure_code')]
    public ?string $failureCode;

    /**
     * @var ?string $failureReason
     */
    #[JsonProperty('failure_reason')]
    public ?string $failureReason;

    /**
     * @var ?string $hangupCause
     */
    #[JsonProperty('hangup_cause')]
    public ?string $hangupCause;

    /**
     * @var ?int $hangupCauseCode
     */
    #[JsonProperty('hangup_cause_code')]
    public ?int $hangupCauseCode;

    /**
     * @var ?string $hangupCauseName
     */
    #[JsonProperty('hangup_cause_name')]
    public ?string $hangupCauseName;

    /**
     * @var ?string $hangupDisposition
     */
    #[JsonProperty('hangup_disposition')]
    public ?string $hangupDisposition;

    /**
     * @var ?string $hangupSource
     */
    #[JsonProperty('hangup_source')]
    public ?string $hangupSource;

    /**
     * @var int $id
     */
    #[JsonProperty('id')]
    public int $id;

    /**
     * @var ?float $jitter
     */
    #[JsonProperty('jitter')]
    public ?float $jitter;

    /**
     * @var ?float $mos
     */
    #[JsonProperty('mos')]
    public ?float $mos;

    /**
     * @var ?string $networkAddr
     */
    #[JsonProperty('network_addr')]
    public ?string $networkAddr;

    /**
     * @var string $originationRegion
     */
    #[JsonProperty('origination_region')]
    public string $originationRegion;

    /**
     * @var ?float $packetLoss
     */
    #[JsonProperty('packet_loss')]
    public ?float $packetLoss;

    /**
     * @var ?string $progressTime
     */
    #[JsonProperty('progress_time')]
    public ?string $progressTime;

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
     * @var ?string $sipUserAgent
     */
    #[JsonProperty('sip_user_agent')]
    public ?string $sipUserAgent;

    /**
     * @var string $startTime
     */
    #[JsonProperty('start_time')]
    public string $startTime;

    /**
     * @var float $streamingCost
     */
    #[JsonProperty('streaming_cost')]
    public float $streamingCost;

    /**
     * @var ?string $terminatedTo
     */
    #[JsonProperty('terminated_to')]
    public ?string $terminatedTo;

    /**
     * @var float $totalCost
     */
    #[JsonProperty('total_cost')]
    public float $totalCost;

    /**
     * @var ?string $trunkId
     */
    #[JsonProperty('trunk_id')]
    public ?string $trunkId;

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
     *   billsec: int,
     *   callDirection: string,
     *   callerIdName: string,
     *   callerIdNumber: string,
     *   context: string,
     *   cost: float,
     *   createdAt: string,
     *   currency: string,
     *   destinationNumber: string,
     *   duration: int,
     *   endTime: string,
     *   id: int,
     *   originationRegion: string,
     *   region: string,
     *   ringTime: int,
     *   sipCallId: string,
     *   startTime: string,
     *   streamingCost: float,
     *   totalCost: float,
     *   updatedAt: string,
     *   uuid: string,
     *   answerTime?: ?string,
     *   bridgeUuid?: ?string,
     *   campaignId?: mixed,
     *   carrierIp?: mixed,
     *   codec?: ?string,
     *   customerEndpoint?: mixed,
     *   failureCode?: ?string,
     *   failureReason?: ?string,
     *   hangupCause?: ?string,
     *   hangupCauseCode?: ?int,
     *   hangupCauseName?: ?string,
     *   hangupDisposition?: ?string,
     *   hangupSource?: ?string,
     *   jitter?: ?float,
     *   mos?: ?float,
     *   networkAddr?: ?string,
     *   packetLoss?: ?float,
     *   progressTime?: ?string,
     *   sipUserAgent?: ?string,
     *   terminatedTo?: ?string,
     *   trunkId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->answerTime = $values['answerTime'] ?? null;
        $this->billsec = $values['billsec'];
        $this->bridgeUuid = $values['bridgeUuid'] ?? null;
        $this->callDirection = $values['callDirection'];
        $this->callerIdName = $values['callerIdName'];
        $this->callerIdNumber = $values['callerIdNumber'];
        $this->campaignId = $values['campaignId'] ?? null;
        $this->carrierIp = $values['carrierIp'] ?? null;
        $this->codec = $values['codec'] ?? null;
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
        $this->hangupCause = $values['hangupCause'] ?? null;
        $this->hangupCauseCode = $values['hangupCauseCode'] ?? null;
        $this->hangupCauseName = $values['hangupCauseName'] ?? null;
        $this->hangupDisposition = $values['hangupDisposition'] ?? null;
        $this->hangupSource = $values['hangupSource'] ?? null;
        $this->id = $values['id'];
        $this->jitter = $values['jitter'] ?? null;
        $this->mos = $values['mos'] ?? null;
        $this->networkAddr = $values['networkAddr'] ?? null;
        $this->originationRegion = $values['originationRegion'];
        $this->packetLoss = $values['packetLoss'] ?? null;
        $this->progressTime = $values['progressTime'] ?? null;
        $this->region = $values['region'];
        $this->ringTime = $values['ringTime'];
        $this->sipCallId = $values['sipCallId'];
        $this->sipUserAgent = $values['sipUserAgent'] ?? null;
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
