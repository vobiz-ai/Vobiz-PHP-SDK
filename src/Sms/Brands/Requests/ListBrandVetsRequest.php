<?php

namespace Vobiz\Sms\Brands\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListBrandVetsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page Zero-based page index. Defaults to `0`. Must be 0 or more; a negative value returns `400`. A value that is not an integer is treated as `0`.
     */
    public ?int $page;

    /**
     * @var ?int $size Records per page, from 0 to 100. Defaults to `20`; `0` or a value that is not an integer also gives the default page size. A value above 100 returns `400`.
     */
    public ?int $size;

    /**
     * @param array{
     *   page?: ?int,
     *   size?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->size = $values['size'] ?? null;
    }
}
