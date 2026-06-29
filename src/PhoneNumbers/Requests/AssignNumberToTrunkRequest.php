<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class AssignNumberToTrunkRequest extends JsonSerializableType
{
    /**
     * @var string $trunkGroupId The UUID of the trunk to assign this number to.
     */
    #[JsonProperty('trunk_group_id')]
    public string $trunkGroupId;

    /**
     * @param array{
     *   trunkGroupId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->trunkGroupId = $values['trunkGroupId'];
    }
}
