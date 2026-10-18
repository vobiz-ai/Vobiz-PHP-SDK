<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * A messaging-capable number on your account, with its registration state and what it can send.
 */
class SmsNumber extends JsonSerializableType
{
    /**
     * @var ?string $e164 The number in E.164 format. Use it as `from` when you send.
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $countryCode Upper-case ISO 3166-1 alpha-2 code of the number's country. Empty string when unknown.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?array<value-of<SmsNumberChannelsItem>> $channels Lower-case channels routed on the number: `sms`, `mms` and `rcs`. Defaults to `["sms"]`.
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    public ?array $channels;

    /**
     * @var ?string $type Inventory type in upper case, for example `VIRTUAL_LONG_NUMBER`, `SHORT_CODE` or `TOLL_FREE`. Empty string when unknown.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<string> $capabilities Upper-case capability labels, for example `SMS`, `MMS` and `VOICE`. Empty array when unknown.
     */
    #[JsonProperty('capabilities'), ArrayType(['string'])]
    public ?array $capabilities;

    /**
     * @var ?SmsNumberTenDlc $tenDlc The most relevant US registration campaign attached to the number. `null` when no campaign is attached.
     */
    #[JsonProperty('tenDlc')]
    public ?SmsNumberTenDlc $tenDlc;

    /**
     * @var ?bool $tollFree `true` for US toll-free numbers, which use toll-free verification instead of a 10DLC campaign.
     */
    #[JsonProperty('tollFree')]
    public ?bool $tollFree;

    /**
     * @var ?SmsNumberRegistration $registration US A2P registration state of the number and the campaign behind it.
     */
    #[JsonProperty('registration')]
    public ?SmsNumberRegistration $registration;

    /**
     * @var ?SmsNumberLastMessage $lastMessage The latest outbound message sent from this number. `null` when the number has not sent a message yet.
     */
    #[JsonProperty('lastMessage')]
    public ?SmsNumberLastMessage $lastMessage;

    /**
     * @var ?SmsNumberSendable $sendable Where the number can send right now, derived from its country and registration state.
     */
    #[JsonProperty('sendable')]
    public ?SmsNumberSendable $sendable;

    /**
     * @param array{
     *   e164?: ?string,
     *   provider?: ?string,
     *   countryCode?: ?string,
     *   channels?: ?array<value-of<SmsNumberChannelsItem>>,
     *   type?: ?string,
     *   capabilities?: ?array<string>,
     *   tenDlc?: ?SmsNumberTenDlc,
     *   tollFree?: ?bool,
     *   registration?: ?SmsNumberRegistration,
     *   lastMessage?: ?SmsNumberLastMessage,
     *   sendable?: ?SmsNumberSendable,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->e164 = $values['e164'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->channels = $values['channels'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
        $this->tenDlc = $values['tenDlc'] ?? null;
        $this->tollFree = $values['tollFree'] ?? null;
        $this->registration = $values['registration'] ?? null;
        $this->lastMessage = $values['lastMessage'] ?? null;
        $this->sendable = $values['sendable'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
