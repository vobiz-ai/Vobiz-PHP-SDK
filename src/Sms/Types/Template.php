<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A message template registered on an RCS sender, with the approval status reported by the RCS platform.
 */
class Template extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the template on Vobiz (UUID). Template endpoints address templates by `templateName` instead.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $senderId The `id` of the RCS sender the template belongs to.
     */
    #[JsonProperty('senderId')]
    public ?string $senderId;

    /**
     * @var ?string $accountId Your Vobiz account ID (`MA_...`) that owns the template.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $templateName Unique name of the template on its sender. Used in the path of every template endpoint.
     */
    #[JsonProperty('templateName')]
    public ?string $templateName;

    /**
     * @var ?string $type Template type as defined by the RCS platform.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $status Approval status reported by the RCS platform, stored on your account. `pending` until the platform reports otherwise. Call `GET /senders/{senderId}/templates/{templateName}/status` to refresh it.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string, mixed> $content The template content exactly as you submitted it.
     */
    #[JsonProperty('content'), ArrayType(['string' => 'mixed'])]
    public ?array $content;

    /**
     * @var ?DateTime $createdAt When the template was created on your account (ISO 8601, UTC).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the template last changed, including status refreshes (ISO 8601, UTC).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   senderId?: ?string,
     *   accountId?: ?string,
     *   provider?: ?string,
     *   templateName?: ?string,
     *   type?: ?string,
     *   status?: ?string,
     *   content?: ?array<string, mixed>,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->senderId = $values['senderId'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->templateName = $values['templateName'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
