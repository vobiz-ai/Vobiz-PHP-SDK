<?php

namespace Vobiz\Endpoints\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListEndpointsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    public ?int $offset;

    /**
     * @var ?string $usernameContains
     */
    public ?string $usernameContains;

    /**
     * @var ?string $usernameExact
     */
    public ?string $usernameExact;

    /**
     * @var ?string $usernameStartswith
     */
    public ?string $usernameStartswith;

    /**
     * @var ?string $aliasContains
     */
    public ?string $aliasContains;

    /**
     * @var ?string $aliasExact
     */
    public ?string $aliasExact;

    /**
     * @var ?int $applicationIdExact
     */
    public ?int $applicationIdExact;

    /**
     * @var ?bool $applicationIdIsnull
     */
    public ?bool $applicationIdIsnull;

    /**
     * @var ?string $subAccount
     */
    public ?string $subAccount;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   usernameContains?: ?string,
     *   usernameExact?: ?string,
     *   usernameStartswith?: ?string,
     *   aliasContains?: ?string,
     *   aliasExact?: ?string,
     *   applicationIdExact?: ?int,
     *   applicationIdIsnull?: ?bool,
     *   subAccount?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->usernameContains = $values['usernameContains'] ?? null;
        $this->usernameExact = $values['usernameExact'] ?? null;
        $this->usernameStartswith = $values['usernameStartswith'] ?? null;
        $this->aliasContains = $values['aliasContains'] ?? null;
        $this->aliasExact = $values['aliasExact'] ?? null;
        $this->applicationIdExact = $values['applicationIdExact'] ?? null;
        $this->applicationIdIsnull = $values['applicationIdIsnull'] ?? null;
        $this->subAccount = $values['subAccount'] ?? null;
    }
}
