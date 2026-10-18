<?php

namespace Vobiz\Sms\Brands\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Types\CreateBrandRequest;

class UpdateBrandRequest extends JsonSerializableType
{
    /**
     * @var CreateBrandRequest $body
     */
    public CreateBrandRequest $body;

    /**
     * @param array{
     *   body: CreateBrandRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
