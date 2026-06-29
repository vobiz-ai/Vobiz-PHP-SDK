<?php

namespace Vobiz\Account\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetConcurrencyResponse extends JsonSerializableType
{
    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var int $concurrentCalls
     */
    #[JsonProperty('concurrent_calls')]
    public int $concurrentCalls;

    /**
     * @var int $maxConcurrent
     */
    #[JsonProperty('max_concurrent')]
    public int $maxConcurrent;

    /**
     * @var int $utilizationPct
     */
    #[JsonProperty('utilization_pct')]
    public int $utilizationPct;

    /**
     * @var string $requestId
     */
    #[JsonProperty('request_id')]
    public string $requestId;

    /**
     * @param array{
     *   accountId: string,
     *   concurrentCalls: int,
     *   maxConcurrent: int,
     *   utilizationPct: int,
     *   requestId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->concurrentCalls = $values['concurrentCalls'];
        $this->maxConcurrent = $values['maxConcurrent'];
        $this->utilizationPct = $values['utilizationPct'];
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
