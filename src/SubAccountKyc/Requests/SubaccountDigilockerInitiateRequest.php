<?php

namespace Vobiz\SubAccountKyc\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class SubaccountDigilockerInitiateRequest extends JsonSerializableType
{
    /**
     * @var string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    public string $redirectUrl;

    /**
     * @var ?string $oauthState Opaque value echoed back on the redirect for CSRF protection.
     */
    #[JsonProperty('oauth_state')]
    public ?string $oauthState;

    /**
     * @param array{
     *   redirectUrl: string,
     *   oauthState?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->redirectUrl = $values['redirectUrl'];
        $this->oauthState = $values['oauthState'] ?? null;
    }
}
