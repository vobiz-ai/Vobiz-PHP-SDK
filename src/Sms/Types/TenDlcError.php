<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Traits\Error;
use Vobiz\Core\Json\JsonProperty;

/**
 * Error returned when the US 10DLC registry declines or cannot process a request. `error` is a human-readable message you can show or log. When the registry answers with `400`, `404`, `409`, `422` or `429`, the same status is passed through with this body; `502` means the registry did not answer and `503` means it did not accept Vobiz's service credentials.
 */
class TenDlcError extends JsonSerializableType
{
    use Error;

    /**
     * @var ?string $providerError Opaque diagnostic string you can quote to support. Do not parse it.
     */
    #[JsonProperty('providerError')]
    public ?string $providerError;

    /**
     * @param array{
     *   error: string,
     *   providerError?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->providerError = $values['providerError'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
