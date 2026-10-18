<?php

namespace Vobiz\Sms\Broadcasts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Sms\Broadcasts\Types\UploadRecipientsJsonDefaultCountry;

class UploadRecipientsJson extends JsonSerializableType
{
    /**
     * @var array<string> $numbers Phone numbers, one per recipient, up to 10,000. Numbers without a country code are normalised with `defaultCountry`. An empty array clears the list.
     */
    #[JsonProperty('numbers'), ArrayType(['string'])]
    public array $numbers;

    /**
     * @var ?value-of<UploadRecipientsJsonDefaultCountry> $defaultCountry ISO 3166-1 alpha-2 country code, matched case-insensitively, used to normalise numbers that have no country code. Defaults to `US`.
     */
    #[JsonProperty('defaultCountry')]
    public ?string $defaultCountry;

    /**
     * @param array{
     *   numbers: array<string>,
     *   defaultCountry?: ?value-of<UploadRecipientsJsonDefaultCountry>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->numbers = $values['numbers'];
        $this->defaultCountry = $values['defaultCountry'] ?? null;
    }
}
