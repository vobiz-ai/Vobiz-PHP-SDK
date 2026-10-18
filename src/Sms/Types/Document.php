<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A supporting document or MMS sample file uploaded for campaign registration.
 */
class Document extends JsonSerializableType
{
    /**
     * @var ?string $id Record ID (UUID) of the upload on your account. Downloads and campaign references use `documentId`, not this value.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (`MA_...`). Always the account whose credentials made the request.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $documentId The registry's document ID (UUID). Use it in `GET /10dlc/documents/{id}` and in a campaign's `supportingDocuments` or `mmsSampleFiles`.
     */
    #[JsonProperty('documentId')]
    public ?string $documentId;

    /**
     * @var ?string $documentName Original filename of the upload. Omitted when not recorded.
     */
    #[JsonProperty('documentName')]
    public ?string $documentName;

    /**
     * @var ?string $contentType Media type of the file, for example `application/pdf` or `image/png`. Omitted when not recorded.
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @var ?int $contentLength Size of the file in bytes.
     */
    #[JsonProperty('contentLength')]
    public ?int $contentLength;

    /**
     * @var ?DateTime $createdAt When the record was created on your account, in ISO 8601 (RFC 3339) UTC.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   provider?: ?string,
     *   documentId?: ?string,
     *   documentName?: ?string,
     *   contentType?: ?string,
     *   contentLength?: ?int,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->documentId = $values['documentId'] ?? null;
        $this->documentName = $values['documentName'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->contentLength = $values['contentLength'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
