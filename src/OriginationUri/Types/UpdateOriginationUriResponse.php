<?php

namespace Vobiz\OriginationUri\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateOriginationUriResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var string $uri
     */
    #[JsonProperty('uri')]
    public string $uri;

    /**
     * @var int $priority
     */
    #[JsonProperty('priority')]
    public int $priority;

    /**
     * @var int $weight
     */
    #[JsonProperty('weight')]
    public int $weight;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var string $transport
     */
    #[JsonProperty('transport')]
    public string $transport;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   accountId: string,
     *   uri: string,
     *   priority: int,
     *   weight: int,
     *   enabled: bool,
     *   transport: string,
     *   description: string,
     *   createdAt: string,
     *   updatedAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->uri = $values['uri'];
        $this->priority = $values['priority'];
        $this->weight = $values['weight'];
        $this->enabled = $values['enabled'];
        $this->transport = $values['transport'];
        $this->description = $values['description'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
