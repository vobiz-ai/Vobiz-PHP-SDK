<?php

namespace Vobiz\SubAccountKycTestMode\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\SubAccountKycTestMode\Types\MockSubaccountDigilockerVerifyRequestAccessRequestId;
use Vobiz\Core\Json\JsonProperty;

class MockSubaccountDigilockerVerifyRequest extends JsonSerializableType
{
    /**
     * @var value-of<MockSubaccountDigilockerVerifyRequestAccessRequestId> $accessRequestId
     */
    #[JsonProperty('access_request_id')]
    public string $accessRequestId;

    /**
     * @param array{
     *   accessRequestId: value-of<MockSubaccountDigilockerVerifyRequestAccessRequestId>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessRequestId = $values['accessRequestId'];
    }
}
