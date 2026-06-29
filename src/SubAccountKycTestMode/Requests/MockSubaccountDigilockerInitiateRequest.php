<?php

namespace Vobiz\SubAccountKycTestMode\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class MockSubaccountDigilockerInitiateRequest extends JsonSerializableType
{
    /**
     * @var string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    public string $redirectUrl;

    /**
     * @param array{
     *   redirectUrl: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->redirectUrl = $values['redirectUrl'];
    }
}
