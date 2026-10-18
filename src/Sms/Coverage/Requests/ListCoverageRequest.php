<?php

namespace Vobiz\Sms\Coverage\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListCoverageRequest extends JsonSerializableType
{
    /**
     * @var ?string $q Search text, case-insensitive. Matches a substring of the country name (`united`), an exact ISO 3166-1 alpha-2 code (`GB`) or the start of the dial code (`44` or `+44`); spaces and a leading `+` are ignored.
     */
    public ?string $q;

    /**
     * @var ?string $region Exact region name, case-insensitive, for example `Northern America`, `Western Europe` or `South-central Asia`. Partial names match nothing; read the `region` values from an unfiltered list to see the full set.
     */
    public ?string $region;

    /**
     * @var ?bool $twoWay `true` returns only countries where recipients can reply; `false` returns the rest, including countries where two-way support is unknown. Also accepts `1`/`0` and `t`/`f`; any other value returns `400` with `twoWay must be true or false`.
     */
    public ?bool $twoWay;

    /**
     * @var ?bool $registrationRequired `true` returns countries that require sender registration for local or international traffic; `false` returns countries that require neither. Accepts the same values as `twoWay`; anything else returns `400` with `registrationRequired must be true or false`.
     */
    public ?bool $registrationRequired;

    /**
     * @param array{
     *   q?: ?string,
     *   region?: ?string,
     *   twoWay?: ?bool,
     *   registrationRequired?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->q = $values['q'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->twoWay = $values['twoWay'] ?? null;
        $this->registrationRequired = $values['registrationRequired'] ?? null;
    }
}
