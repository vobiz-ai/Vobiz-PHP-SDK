<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListNumbersResponseItemsItemCapabilities extends JsonSerializableType
{
    /**
     * @var bool $voice
     */
    #[JsonProperty('voice')]
    public bool $voice;

    /**
     * @var bool $sms
     */
    #[JsonProperty('sms')]
    public bool $sms;

    /**
     * @var bool $mms
     */
    #[JsonProperty('mms')]
    public bool $mms;

    /**
     * @var bool $fax
     */
    #[JsonProperty('fax')]
    public bool $fax;

    /**
     * @param array{
     *   voice: bool,
     *   sms: bool,
     *   mms: bool,
     *   fax: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->voice = $values['voice'];
        $this->sms = $values['sms'];
        $this->mms = $values['mms'];
        $this->fax = $values['fax'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
