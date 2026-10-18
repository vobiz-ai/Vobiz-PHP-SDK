<?php

namespace Vobiz\Sms\Messages\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class CheckRcsReachabilityRequest extends JsonSerializableType
{
    /**
     * @var string $from Required. The `senderName` of your RCS sender, as returned by `GET /senders`.
     */
    public string $from;

    /**
     * @var string $to Required. The recipient number to check, in E.164 format, for example `+14155550123`.
     */
    public string $to;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
    }
}
