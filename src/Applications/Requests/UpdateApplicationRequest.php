<?php

namespace Vobiz\Applications\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateApplicationRequest extends JsonSerializableType
{
    /**
     * @var ?string $appName
     */
    #[JsonProperty('app_name')]
    public ?string $appName;

    /**
     * @var ?bool $defaultNumberApp
     */
    #[JsonProperty('default_number_app')]
    public ?bool $defaultNumberApp;

    /**
     * @var ?string $answerUrl URL Vobiz fetches VobizXML from when a call reaches a number or endpoint linked to this application.
     */
    #[JsonProperty('answer_url')]
    public ?string $answerUrl;

    /**
     * @var ?string $answerMethod HTTP method used for `answer_url`, `GET` or `POST`.
     */
    #[JsonProperty('answer_method')]
    public ?string $answerMethod;

    /**
     * @var ?string $hangupUrl URL Vobiz notifies when a call on this application ends.
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
     *   appName?: ?string,
     *   defaultNumberApp?: ?bool,
     *   answerUrl?: ?string,
     *   answerMethod?: ?string,
     *   hangupUrl?: ?string,
     *   hangupMethod?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->appName = $values['appName'] ?? null;
        $this->defaultNumberApp = $values['defaultNumberApp'] ?? null;
        $this->answerUrl = $values['answerUrl'] ?? null;
        $this->answerMethod = $values['answerMethod'] ?? null;
        $this->hangupUrl = $values['hangupUrl'] ?? null;
        $this->hangupMethod = $values['hangupMethod'] ?? null;
    }
}
