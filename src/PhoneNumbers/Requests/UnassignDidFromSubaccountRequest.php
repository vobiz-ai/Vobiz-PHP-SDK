<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class UnassignDidFromSubaccountRequest extends JsonSerializableType
{
    /**
     * Admin-only cool-off bypass. Requires an admin-role account
     * (enforced at the gateway) and writes a `did_assignment_audit` row.
     *
     * @var ?bool $force
     */
    public ?bool $force;

    /**
     * @param array{
     *   force?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->force = $values['force'] ?? null;
    }
}
