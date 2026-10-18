<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Sender registration requirements for a destination country. The text fields are free-form and may prefix values with `LOCAL:` or `INTERNATIONAL:` when they differ by traffic type.
 */
class CoverageRegistration extends JsonSerializableType
{
    /**
     * @var ?LocalIntl $required Whether senders must be registered before sending, for local and international traffic.
     */
    #[JsonProperty('required')]
    public ?LocalIntl $required;

    /**
     * @var ?string $durationDays Typical registration lead time as published for the country, for example `LOCAL: +20`. Free text; `null` when not published.
     */
    #[JsonProperty('durationDays')]
    public ?string $durationDays;

    /**
     * @var ?string $informationRequired Information you must supply to register a sender, for example sample messages. `null` when not published.
     */
    #[JsonProperty('informationRequired')]
    public ?string $informationRequired;

    /**
     * @var ?string $documentsRequired Documents you must supply to register a sender, for example a letter of authorization. `null` when not published.
     */
    #[JsonProperty('documentsRequired')]
    public ?string $documentsRequired;

    /**
     * @var ?string $alphanumericExtraSteps Additional steps that apply to alphanumeric sender IDs, such as DLT registration in India. `null` when none.
     */
    #[JsonProperty('alphanumericExtraSteps')]
    public ?string $alphanumericExtraSteps;

    /**
     * @param array{
     *   required?: ?LocalIntl,
     *   durationDays?: ?string,
     *   informationRequired?: ?string,
     *   documentsRequired?: ?string,
     *   alphanumericExtraSteps?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->required = $values['required'] ?? null;
        $this->durationDays = $values['durationDays'] ?? null;
        $this->informationRequired = $values['informationRequired'] ?? null;
        $this->documentsRequired = $values['documentsRequired'] ?? null;
        $this->alphanumericExtraSteps = $values['alphanumericExtraSteps'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
