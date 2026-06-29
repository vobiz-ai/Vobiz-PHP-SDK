<?php

namespace Vobiz\Applications\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateApplicationRequest extends JsonSerializableType
{
    /**
     * @var string $appName
     */
    #[JsonProperty('app_name')]
    public string $appName;

    /**
     * @var string $answerUrl
     */
    #[JsonProperty('answer_url')]
    public string $answerUrl;

    /**
     * @var string $answerMethod
     */
    #[JsonProperty('answer_method')]
    public string $answerMethod;

    /**
     * @param array{
     *   appName: string,
     *   answerUrl: string,
     *   answerMethod: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->appName = $values['appName'];
        $this->answerUrl = $values['answerUrl'];
        $this->answerMethod = $values['answerMethod'];
    }
}
