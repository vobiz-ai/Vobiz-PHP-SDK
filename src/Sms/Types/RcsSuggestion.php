<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * One suggestion button on an RCS message: a suggested reply or an action the recipient can tap. Which optional fields apply depends on `type`.
 */
class RcsSuggestion extends JsonSerializableType
{
    /**
     * @var value-of<RcsSuggestionType> $type What the button does: `REPLY` sends `text` back as a reply, `OPEN_URL` opens `url`, `DIAL_PHONE` calls `phoneNumber`, `SHOW_LOCATION` shows a map pin at `latitude`/`longitude`, and `REQUEST_LOCATION` asks the recipient to share their location.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $text Button label shown to the recipient. Keep it short so it fits on the button.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var ?string $postbackData Your own string, returned to you with the inbound event when the recipient taps the button. Use it to tell which button was tapped.
     */
    #[JsonProperty('postbackData')]
    public ?string $postbackData;

    /**
     * @var ?string $url HTTPS link to open. Used only when `type` is `OPEN_URL`.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $phoneNumber Phone number to dial, in E.164 format. Used only when `type` is `DIAL_PHONE`.
     */
    #[JsonProperty('phoneNumber')]
    public ?string $phoneNumber;

    /**
     * @var ?float $latitude Latitude of the map pin, in decimal degrees from `-90` to `90`. Used only when `type` is `SHOW_LOCATION`.
     */
    #[JsonProperty('latitude')]
    public ?float $latitude;

    /**
     * @var ?float $longitude Longitude of the map pin, in decimal degrees from `-180` to `180`. Used only when `type` is `SHOW_LOCATION`.
     */
    #[JsonProperty('longitude')]
    public ?float $longitude;

    /**
     * @var ?string $label Label shown on the map pin. Used only when `type` is `SHOW_LOCATION`.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   type: value-of<RcsSuggestionType>,
     *   text: string,
     *   postbackData?: ?string,
     *   url?: ?string,
     *   phoneNumber?: ?string,
     *   latitude?: ?float,
     *   longitude?: ?float,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->text = $values['text'];
        $this->postbackData = $values['postbackData'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
