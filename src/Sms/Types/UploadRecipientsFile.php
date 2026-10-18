<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A recipient file upload. Every column other than the phone column becomes a template variable named after its header.
 */
class UploadRecipientsFile extends JsonSerializableType
{
    /**
     * @var string $file A `.csv` or `.xlsx` file of at most 10 MB and 10,000 recipients. The phone column is detected from its header (`phone`, `mobile`, `msisdn`, `number`, `to`, `phonenumber` and similar), otherwise the first column is used. Files without a header get the columns `phone`, `column2`, `column3` and so on; CSV delimiters `,`, `;` and tab are detected, and for XLSX the first sheet is read.
     */
    #[JsonProperty('file')]
    public string $file;

    /**
     * @var ?value-of<UploadRecipientsFileDefaultCountry> $defaultCountry ISO 3166-1 alpha-2 country code, matched case-insensitively, used to normalise numbers that have no country code. Defaults to `US`.
     */
    #[JsonProperty('defaultCountry')]
    public ?string $defaultCountry;

    /**
     * @param array{
     *   file: string,
     *   defaultCountry?: ?value-of<UploadRecipientsFileDefaultCountry>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->file = $values['file'];
        $this->defaultCountry = $values['defaultCountry'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
