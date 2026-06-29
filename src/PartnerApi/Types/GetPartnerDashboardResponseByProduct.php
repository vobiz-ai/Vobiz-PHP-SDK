<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetPartnerDashboardResponseByProduct extends JsonSerializableType
{
    /**
     * @var GetPartnerDashboardResponseByProductSipTrunking $sipTrunking
     */
    #[JsonProperty('sip_trunking')]
    public GetPartnerDashboardResponseByProductSipTrunking $sipTrunking;

    /**
     * @var GetPartnerDashboardResponseByProductVoiceApi $voiceApi
     */
    #[JsonProperty('voice_api')]
    public GetPartnerDashboardResponseByProductVoiceApi $voiceApi;

    /**
     * @param array{
     *   sipTrunking: GetPartnerDashboardResponseByProductSipTrunking,
     *   voiceApi: GetPartnerDashboardResponseByProductVoiceApi,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sipTrunking = $values['sipTrunking'];
        $this->voiceApi = $values['voiceApi'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
