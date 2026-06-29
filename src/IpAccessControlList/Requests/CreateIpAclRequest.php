<?php

namespace Vobiz\IpAccessControlList\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateIpAclRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $ipAddress
     */
    #[JsonProperty('ip_address')]
    public string $ipAddress;

    /**
     * @param array{
     *   name: string,
     *   ipAddress: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->ipAddress = $values['ipAddress'];
    }
}
