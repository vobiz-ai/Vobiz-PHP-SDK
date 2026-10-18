<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The body of every error response: a flat object with one `error` string that explains what went wrong. Use the HTTP status code to decide how to handle the error, and log `error` for diagnosis.
 */
class Error extends JsonSerializableType
{
    /**
     * @var string $error Human-readable explanation of the error, for example `phoneNumber is required` or `recipient has opted out: +14155550123`. Branch on the HTTP status code rather than on this text.
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @param array{
     *   error: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
