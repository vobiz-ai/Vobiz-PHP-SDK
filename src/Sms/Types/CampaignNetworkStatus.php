<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The campaign's status on one US carrier network, read live from the US 10DLC registry.
 */
class CampaignNetworkStatus extends JsonSerializableType
{
    /**
     * @var ?string $network Carrier network the entry describes, for example `T_MOBILE`, `ATT` or `VERIZON`.
     */
    #[JsonProperty('network')]
    public ?string $network;

    /**
     * @var ?string $state The campaign's registration state on that network, for example `ACTIVE` once provisioned.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $messageClass Message class the network assigned to the campaign. `null` when the network does not report one.
     */
    #[JsonProperty('messageClass')]
    public ?string $messageClass;

    /**
     * @var ?int $throughput Throughput the network grants the campaign. The unit depends on the network (messages per minute on some, a daily cap on others). `null` when the network does not report one.
     */
    #[JsonProperty('throughput')]
    public ?int $throughput;

    /**
     * @var ?string $brandTier Brand tier the network applies, for example `LOW`. `null` when the network does not use tiers.
     */
    #[JsonProperty('brandTier')]
    public ?string $brandTier;

    /**
     * @param array{
     *   network?: ?string,
     *   state?: ?string,
     *   messageClass?: ?string,
     *   throughput?: ?int,
     *   brandTier?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->network = $values['network'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->messageClass = $values['messageClass'] ?? null;
        $this->throughput = $values['throughput'] ?? null;
        $this->brandTier = $values['brandTier'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
