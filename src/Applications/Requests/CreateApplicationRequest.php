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
     * @var ?string $hangupUrl URL Vobiz notifies when a call on this application ends. If omitted, it defaults to `answer_url`.
     */
    #[JsonProperty('hangup_url')]
    public ?string $hangupUrl;

    /**
     * @var ?string $hangupMethod HTTP method used for `hangup_url`, `GET` or `POST`.
     */
    #[JsonProperty('hangup_method')]
    public ?string $hangupMethod;

    /**
     * @param array{
     *   appName: string,
     *   answerUrl: string,
     *   answerMethod: string,
     *   hangupUrl?: ?string,
     *   hangupMethod?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->appName = $values['appName'];
        $this->answerUrl = $values['answerUrl'];
        $this->answerMethod = $values['answerMethod'];
        $this->hangupUrl = $values['hangupUrl'] ?? null;
        $this->hangupMethod = $values['hangupMethod'] ?? null;
    }
}
