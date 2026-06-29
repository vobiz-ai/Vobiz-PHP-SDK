<?php

namespace Vobiz\Dtmf\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Dtmf\Types\SendDtmfRequestLeg;

class SendDtmfRequest extends JsonSerializableType
{
    /**
     * @var string $digits
     */
    #[JsonProperty('digits')]
    public string $digits;

    /**
     * @var ?value-of<SendDtmfRequestLeg> $leg
     */
    #[JsonProperty('leg')]
    public ?string $leg;

    /**
     * @param array{
     *   digits: string,
     *   leg?: ?value-of<SendDtmfRequestLeg>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->digits = $values['digits'];
        $this->leg = $values['leg'] ?? null;
    }
}
