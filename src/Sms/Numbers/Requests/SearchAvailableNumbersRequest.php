<?php

namespace Vobiz\Sms\Numbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class SearchAvailableNumbersRequest extends JsonSerializableType
{
    /**
     * @var string $country Country to search, as an ISO 3166-1 alpha-2 code such as `US`, `CA` or `GB`. Case-insensitive. A value that is not two letters returns `400` with `country must be an ISO 3166-1 alpha-2 code`.
     */
    public string $country;

    /**
     * @var ?string $capabilities Comma-separated capabilities the number must have: `SMS`, `MMS`, or `SMS,MMS`. Case-insensitive, defaults to `SMS`. Any other value returns `400` with `capabilities must be SMS and/or MMS`.
     */
    public ?string $capabilities;

    /**
     * @var ?string $areaCode Three-digit area code to search in, for example `415`. Accepted only when `country` is `US` or `CA`; other countries return `400` with `areaCode is only supported for US and CA`.
     */
    public ?string $areaCode;

    /**
     * @var ?int $limit Maximum number of results, from `1` to `100`. Defaults to `10`, and each search returns at most 10 numbers whatever you pass. A value outside the range returns `400` with `limit must be between 1 and 100`.
     */
    public ?int $limit;

    /**
     * @param array{
     *   country: string,
     *   capabilities?: ?string,
     *   areaCode?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->country = $values['country'];
        $this->capabilities = $values['capabilities'] ?? null;
        $this->areaCode = $values['areaCode'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
