<?php

namespace Vobiz\Sms\RcsSenders\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class CreateTemplateRequest extends JsonSerializableType
{
    /**
     * @var string $templateName Unique name for the template on this sender. You use it in the path of every template endpoint.
     */
    #[JsonProperty('templateName')]
    public string $templateName;

    /**
     * @var string $type Template type as defined by the RCS platform. It decides which `content` shape the platform expects.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var array<string, mixed> $content Template content as a JSON object in the shape the RCS platform defines for the chosen `type`. Stored and returned exactly as you submit it.
     */
    #[JsonProperty('content'), ArrayType(['string' => 'mixed'])]
    public array $content;

    /**
     * @param array{
     *   templateName: string,
     *   type: string,
     *   content: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->templateName = $values['templateName'];
        $this->type = $values['type'];
        $this->content = $values['content'];
    }
}
