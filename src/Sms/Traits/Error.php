<?php

namespace Vobiz\Sms\Traits;

use Vobiz\Core\Json\JsonProperty;

/**
 * The body of every error response: a flat object with one `error` string that explains what went wrong. Use the HTTP status code to decide how to handle the error, and log `error` for diagnosis.
 *
 * @property string $error
 */
trait Error
{
    /**
     * @var string $error Human-readable explanation of the error, for example `phoneNumber is required` or `recipient has opted out: +14155550123`. Branch on the HTTP status code rather than on this text.
     */
    #[JsonProperty('error')]
    public string $error;
}
