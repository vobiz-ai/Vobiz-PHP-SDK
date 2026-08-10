<?php

namespace Vobiz\Calls\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class MakeCallRequest extends JsonSerializableType
{
    /**
     * @var string $from
     */
    #[JsonProperty('from')]
    public string $from;

    /**
     * Destination PSTN number or SIP endpoint. Separate multiple destinations with
     * the `<` character to fan out a single request to up to 1000 destinations,
     * for example `+919876543210<+919876543211`.
     *
     * @var string $to
     */
    #[JsonProperty('to')]
    public string $to;

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
     *   from: string,
     *   to: string,
     *   answerUrl: string,
     *   answerMethod: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->answerUrl = $values['answerUrl'];
        $this->answerMethod = $values['answerMethod'];
    }
}
