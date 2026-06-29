<?php

namespace Vobiz\SubAccountKyc\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class SubaccountDigilockerVerifyRequest extends JsonSerializableType
{
    /**
     * @var string $accessRequestId
     */
    #[JsonProperty('access_request_id')]
    public string $accessRequestId;

    /**
     * @var ?string $linkedNumber Optional. Binds the Aadhaar to a specific number (92-series).
     */
    #[JsonProperty('linked_number')]
    public ?string $linkedNumber;

    /**
     * @param array{
     *   accessRequestId: string,
     *   linkedNumber?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessRequestId = $values['accessRequestId'];
        $this->linkedNumber = $values['linkedNumber'] ?? null;
    }
}
