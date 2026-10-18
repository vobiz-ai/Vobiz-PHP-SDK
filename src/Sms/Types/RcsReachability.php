<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Whether a phone number can receive RCS messages from your RCS sender.
 */
class RcsReachability extends JsonSerializableType
{
    /**
     * @var ?string $to The phone number that was checked, in E.164 format.
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?bool $reachable `true` when the number can receive RCS from your sender. When `false`, send as SMS or set `failoverToSms` on an RCS send.
     */
    #[JsonProperty('reachable')]
    public ?bool $reachable;

    /**
     * @var ?string $carrier Name of the recipient's mobile carrier. Omitted when it is not known.
     */
    #[JsonProperty('carrier')]
    public ?string $carrier;

    /**
     * @var ?string $capability Capability label returned with the result, for example `reachable`. Base your decision on `reachable`.
     */
    #[JsonProperty('capability')]
    public ?string $capability;

    /**
     * @param array{
     *   to?: ?string,
     *   reachable?: ?bool,
     *   carrier?: ?string,
     *   capability?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->to = $values['to'] ?? null;
        $this->reachable = $values['reachable'] ?? null;
        $this->carrier = $values['carrier'] ?? null;
        $this->capability = $values['capability'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
