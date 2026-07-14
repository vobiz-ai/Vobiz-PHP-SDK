<?php

namespace Vobiz\Conferences\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetConferenceResponseConferenceMemberCountMembersItem extends JsonSerializableType
{
    /**
     * @var ?bool $muted
     */
    #[JsonProperty('muted')]
    public ?bool $muted;

    /**
     * @var ?string $memberId
     */
    #[JsonProperty('member_id')]
    public ?string $memberId;

    /**
     * @var ?bool $deaf
     */
    #[JsonProperty('deaf')]
    public ?bool $deaf;

    /**
     * @var ?string $from
     */
    #[JsonProperty('from')]
    public ?string $from;

    /**
     * @var ?string $to
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?string $callerName
     */
    #[JsonProperty('caller_name')]
    public ?string $callerName;

    /**
     * @var ?string $direction
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?string $callUuid
     */
    #[JsonProperty('call_uuid')]
    public ?string $callUuid;

    /**
     * @var ?string $joinTime
     */
    #[JsonProperty('join_time')]
    public ?string $joinTime;

    /**
     * @param array{
     *   muted?: ?bool,
     *   memberId?: ?string,
     *   deaf?: ?bool,
     *   from?: ?string,
     *   to?: ?string,
     *   callerName?: ?string,
     *   direction?: ?string,
     *   callUuid?: ?string,
     *   joinTime?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->muted = $values['muted'] ?? null;
        $this->memberId = $values['memberId'] ?? null;
        $this->deaf = $values['deaf'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->callerName = $values['callerName'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->callUuid = $values['callUuid'] ?? null;
        $this->joinTime = $values['joinTime'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
