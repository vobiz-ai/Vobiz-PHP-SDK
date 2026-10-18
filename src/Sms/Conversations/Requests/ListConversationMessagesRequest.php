<?php

namespace Vobiz\Sms\Conversations\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListConversationMessagesRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of messages to return, from `1` to `100`. Defaults to `50`; a value outside that range also returns `50`.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of messages to skip before the page starts, `0` or greater. Defaults to `0`. Add the page size to it to load older messages.
     */
    public ?int $offset;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
