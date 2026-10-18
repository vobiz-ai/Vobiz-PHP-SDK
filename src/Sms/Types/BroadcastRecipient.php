<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * One recipient of a broadcast: the normalised number, the variables from its upload row and the state of its message.
 */
class BroadcastRecipient extends JsonSerializableType
{
    /**
     * @var ?int $id Numeric identifier of the recipient within Vobiz. Used in the broadcast's per-recipient idempotency key.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?int $row Where the recipient came from in the upload. For a file it is the line number in the file, so with a header line the first data row is `2`; for a JSON `numbers` array it is the 1-based position.
     */
    #[JsonProperty('row')]
    public ?int $row;

    /**
     * @var ?string $to The recipient's number, normalised to E.164.
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?array<string, string> $variables Every column value from the recipient's upload row, keyed by the column name as written in your header, including the phone column. Used to fill the template. Only the phone column is present for JSON uploads.
     */
    #[JsonProperty('variables'), ArrayType(['string' => 'string'])]
    public ?array $variables;

    /**
     * @var ?value-of<BroadcastRecipientStatus> $status The recipient's send state: `pending`, `sending`, `sent`, `delivered`, `failed`, `opted_out` (excluded because the number opted out of SMS from you) or `skipped` (still pending when the broadcast was cancelled).
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $messageId The `id` of the message sent to this recipient; look it up with `GET /messages/{id}`. Empty string until the message is sent.
     */
    #[JsonProperty('messageId')]
    public ?string $messageId;

    /**
     * @var ?string $errorCode Why the send failed: the message's `errorCode`, or `send_failed` / `routing_failed`. Empty string unless `status` is `failed`.
     */
    #[JsonProperty('errorCode')]
    public ?string $errorCode;

    /**
     * @var ?string $errorMessage Human-readable detail for a failed send. Empty string unless `status` is `failed`.
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var ?DateTime $sentAt When the message to this recipient was sent (ISO 8601, UTC). `null` until then.
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @param array{
     *   id?: ?int,
     *   row?: ?int,
     *   to?: ?string,
     *   variables?: ?array<string, string>,
     *   status?: ?value-of<BroadcastRecipientStatus>,
     *   messageId?: ?string,
     *   errorCode?: ?string,
     *   errorMessage?: ?string,
     *   sentAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->row = $values['row'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->variables = $values['variables'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->messageId = $values['messageId'] ?? null;
        $this->errorCode = $values['errorCode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
