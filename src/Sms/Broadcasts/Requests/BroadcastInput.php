<?php

namespace Vobiz\Sms\Broadcasts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Traits\BroadcastUpdateInput;
use Vobiz\Sms\Types\BroadcastUpdateInputChannel;
use DateTime;

class BroadcastInput extends JsonSerializableType
{
    use BroadcastUpdateInput;


    /**
     * @param array{
     *   name?: ?string,
     *   from?: ?string,
     *   channel?: ?value-of<BroadcastUpdateInputChannel>,
     *   template?: ?string,
     *   scheduledAt?: ?DateTime,
     *   ratePerSecond?: ?int,
     *   tag?: ?string,
     *   dltEntityId?: ?string,
     *   dltHeaderId?: ?string,
     *   dltTemplateId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->template = $values['template'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->ratePerSecond = $values['ratePerSecond'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->dltEntityId = $values['dltEntityId'] ?? null;
        $this->dltHeaderId = $values['dltHeaderId'] ?? null;
        $this->dltTemplateId = $values['dltTemplateId'] ?? null;
    }
}
