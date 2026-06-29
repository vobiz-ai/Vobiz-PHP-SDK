<?php

namespace Vobiz\Applications\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateApplicationRequest extends JsonSerializableType
{
    /**
     * @var string $appName
     */
    #[JsonProperty('app_name')]
    public string $appName;

    /**
     * @var bool $defaultNumberApp
     */
    #[JsonProperty('default_number_app')]
    public bool $defaultNumberApp;

    /**
     * @param array{
     *   appName: string,
     *   defaultNumberApp: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->appName = $values['appName'];
        $this->defaultNumberApp = $values['defaultNumberApp'];
    }
}
