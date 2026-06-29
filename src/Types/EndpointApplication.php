<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class EndpointApplication extends JsonSerializableType
{
    /**
     * @var ?string $appId
     */
    #[JsonProperty('app_id')]
    public ?string $appId;

    /**
     * @var ?string $appName
     */
    #[JsonProperty('app_name')]
    public ?string $appName;

    /**
     * @var ?string $answerUrl
     */
    #[JsonProperty('answer_url')]
    public ?string $answerUrl;

    /**
     * @var ?string $answerMethod
     */
    #[JsonProperty('answer_method')]
    public ?string $answerMethod;

    /**
     * @param array{
     *   appId?: ?string,
     *   appName?: ?string,
     *   answerUrl?: ?string,
     *   answerMethod?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->appId = $values['appId'] ?? null;
        $this->appName = $values['appName'] ?? null;
        $this->answerUrl = $values['answerUrl'] ?? null;
        $this->answerMethod = $values['answerMethod'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
