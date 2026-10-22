<?php

namespace Vobiz\OriginationUri\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateOriginationUriRequest extends JsonSerializableType
{
    /**
     * @var ?string $uri SIP URI of your inbound destination.
     */
    #[JsonProperty('uri')]
    public ?string $uri;

    /**
     * @var ?string $description Label for the origination URI.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $priority Routing priority. Lower values are tried first.
     */
    #[JsonProperty('priority')]
    public ?int $priority;

    /**
     * @var ?string $name Not read by the API. Send `description` instead.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   uri?: ?string,
     *   description?: ?string,
     *   priority?: ?int,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uri = $values['uri'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
