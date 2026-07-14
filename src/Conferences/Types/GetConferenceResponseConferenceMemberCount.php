<?php

namespace Vobiz\Conferences\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class GetConferenceResponseConferenceMemberCount extends JsonSerializableType
{
    /**
     * @var string $conferenceName
     */
    #[JsonProperty('conference_name')]
    public string $conferenceName;

    /**
     * @var string $conferenceRunTime Conference runtime in seconds
     */
    #[JsonProperty('conference_run_time')]
    public string $conferenceRunTime;

    /**
     * @var string $conferenceMemberCount
     */
    #[JsonProperty('conference_member_count')]
    public string $conferenceMemberCount;

    /**
     * @var array<GetConferenceResponseConferenceMemberCountMembersItem> $members
     */
    #[JsonProperty('members'), ArrayType([GetConferenceResponseConferenceMemberCountMembersItem::class])]
    public array $members;

    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @param array{
     *   conferenceName: string,
     *   conferenceRunTime: string,
     *   conferenceMemberCount: string,
     *   members: array<GetConferenceResponseConferenceMemberCountMembersItem>,
     *   apiId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conferenceName = $values['conferenceName'];
        $this->conferenceRunTime = $values['conferenceRunTime'];
        $this->conferenceMemberCount = $values['conferenceMemberCount'];
        $this->members = $values['members'];
        $this->apiId = $values['apiId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
