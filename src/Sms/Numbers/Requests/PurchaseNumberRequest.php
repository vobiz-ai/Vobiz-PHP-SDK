<?php

namespace Vobiz\Sms\Numbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PurchaseNumberRequest extends JsonSerializableType
{
    /**
     * @var string $e164 The number to buy, in E.164 format, exactly as returned in `e164` by `GET /numbers/available`. Required.
     */
    #[JsonProperty('e164')]
    public string $e164;

    /**
     * @var string $country ISO 3166-1 alpha-2 code of the number's country, for example `US`. Required, and must match the number; a mismatch returns `400`.
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @var ?string $numberKey The `numberKey` from `GET /numbers/available`. Required when the search result has a non-empty `numberKey`, as for `CA` and `GB` numbers; omit it for US numbers, which are bought by `e164` alone.
     */
    #[JsonProperty('numberKey')]
    public ?string $numberKey;

    /**
     * @param array{
     *   e164: string,
     *   country: string,
     *   numberKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->e164 = $values['e164'];
        $this->country = $values['country'];
        $this->numberKey = $values['numberKey'] ?? null;
    }
}
