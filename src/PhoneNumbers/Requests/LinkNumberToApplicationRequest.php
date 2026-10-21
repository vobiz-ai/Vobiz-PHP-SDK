<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class LinkNumberToApplicationRequest extends JsonSerializableType
{
    /**
     * @var string $applicationId The `app_id` of the application to link this number to.
     */
    #[JsonProperty('application_id')]
    public string $applicationId;

    /**
     * @param array{
     *   applicationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->applicationId = $values['applicationId'];
    }
}
