<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListSubaccountsResponseSubAccountsItemPermissionsCalls extends JsonSerializableType
{
    /**
     * @var ?bool $cdr
     */
    #[JsonProperty('cdr')]
    public ?bool $cdr;

    /**
     * @var ?bool $calls
     */
    #[JsonProperty('calls')]
    public ?bool $calls;

    /**
     * @param array{
     *   cdr?: ?bool,
     *   calls?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cdr = $values['cdr'] ?? null;
        $this->calls = $values['calls'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
