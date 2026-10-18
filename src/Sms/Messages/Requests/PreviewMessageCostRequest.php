<?php

namespace Vobiz\Sms\Messages\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Messages\Types\PreviewMessageCostRequestChannel;

class PreviewMessageCostRequest extends JsonSerializableType
{
    /**
     * @var string $from Required. The sender you plan to use: one of your numbers in E.164 format, or the `senderName` of your RCS sender when `channel` is `rcs`. It determines the route the message is priced on.
     */
    public string $from;

    /**
     * @var string $to Required. One recipient number in E.164 format, for example `+14155550123`. Its destination country determines the price.
     */
    public string $to;

    /**
     * @var ?value-of<PreviewMessageCostRequestChannel> $channel Channel to price: `sms`, `mms` or `rcs`. Defaults to `sms`.
     */
    public ?string $channel;

    /**
     * @var ?string $text The message body to segment and price, URL-encoded. Pass the exact text you plan to send: the segment count depends on its length and on whether it fits the GSM-7 character set. Defaults to an empty string.
     */
    public ?string $text;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     *   channel?: ?value-of<PreviewMessageCostRequestChannel>,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->channel = $values['channel'] ?? null;
        $this->text = $values['text'] ?? null;
    }
}
