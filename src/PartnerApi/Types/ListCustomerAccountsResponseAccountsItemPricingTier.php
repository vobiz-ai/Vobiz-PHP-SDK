<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListCustomerAccountsResponseAccountsItemPricingTier extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var float $ratePerMinute
     */
    #[JsonProperty('rate_per_minute')]
    public float $ratePerMinute;

    /**
     * @var float $streamingRatePerMinute
     */
    #[JsonProperty('streaming_rate_per_minute')]
    public float $streamingRatePerMinute;

    /**
     * @var float $recordingRatePerMinute
     */
    #[JsonProperty('recording_rate_per_minute')]
    public float $recordingRatePerMinute;

    /**
     * @var float $whatsappVoiceRate
     */
    #[JsonProperty('whatsapp_voice_rate')]
    public float $whatsappVoiceRate;

    /**
     * @var float $transcriptionRatePerMinute
     */
    #[JsonProperty('transcription_rate_per_minute')]
    public float $transcriptionRatePerMinute;

    /**
     * @var float $piiRedactionRatePerMinute
     */
    #[JsonProperty('pii_redaction_rate_per_minute')]
    public float $piiRedactionRatePerMinute;

    /**
     * @var bool $chargeNonConnectedCalls
     */
    #[JsonProperty('charge_non_connected_calls')]
    public bool $chargeNonConnectedCalls;

    /**
     * @var float $nonConnectedCallFee
     */
    #[JsonProperty('non_connected_call_fee')]
    public float $nonConnectedCallFee;

    /**
     * @var int $didReleaseFee
     */
    #[JsonProperty('did_release_fee')]
    public int $didReleaseFee;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var bool $isDefault
     */
    #[JsonProperty('is_default')]
    public bool $isDefault;

    /**
     * @var mixed $partnerId
     */
    #[JsonProperty('partner_id')]
    public mixed $partnerId;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   currency: string,
     *   ratePerMinute: float,
     *   streamingRatePerMinute: float,
     *   recordingRatePerMinute: float,
     *   whatsappVoiceRate: float,
     *   transcriptionRatePerMinute: float,
     *   piiRedactionRatePerMinute: float,
     *   chargeNonConnectedCalls: bool,
     *   nonConnectedCallFee: float,
     *   didReleaseFee: int,
     *   isActive: bool,
     *   isDefault: bool,
     *   partnerId?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->currency = $values['currency'];
        $this->ratePerMinute = $values['ratePerMinute'];
        $this->streamingRatePerMinute = $values['streamingRatePerMinute'];
        $this->recordingRatePerMinute = $values['recordingRatePerMinute'];
        $this->whatsappVoiceRate = $values['whatsappVoiceRate'];
        $this->transcriptionRatePerMinute = $values['transcriptionRatePerMinute'];
        $this->piiRedactionRatePerMinute = $values['piiRedactionRatePerMinute'];
        $this->chargeNonConnectedCalls = $values['chargeNonConnectedCalls'];
        $this->nonConnectedCallFee = $values['nonConnectedCallFee'];
        $this->didReleaseFee = $values['didReleaseFee'];
        $this->isActive = $values['isActive'];
        $this->isDefault = $values['isDefault'];
        $this->partnerId = $values['partnerId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
