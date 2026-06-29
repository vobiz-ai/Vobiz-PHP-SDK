<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/**
 * <Response> root container. Use the `add*` helpers to build the document, then
 * `toString()` (pretty, with XML declaration) or `toString(false)` (compact, for
 * webhook responses). Casting to string is equivalent to `toString()`.
 *
 *     use Vobiz\Xml\ResponseElement;
 *
 *     $r = new ResponseElement();
 *     $g = $r->addGather(action: 'https://yourapp.com/menu', inputType: 'dtmf',
 *                        numDigits: 1, executionTimeout: 10);
 *     $g->addSpeak('Press 1 for sales, 2 for support.');
 *     $r->addSpeak("We didn't receive your input. Goodbye.");
 *     $r->addHangup();
 *     echo $r->toString();
 */
class ResponseElement extends VobizXMLElement
{
    use SpeakPlayTrait;

    public function __construct()
    {
        parent::__construct('Response', null, []);
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addWait(mixed ...$attrs): WaitElement
    {
        return $this->add(new WaitElement(...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addGather(mixed ...$attrs): GatherElement
    {
        return $this->add(new GatherElement(...$attrs));
    }

    /**
     * Plivo-parity alias: <GetDigits> -> <Gather>.
     *
     * @param array<int|string, mixed> $attrs camelCase attributes.
     */
    public function addGetDigits(mixed ...$attrs): GatherElement
    {
        return $this->addGather(...$attrs);
    }

    /**
     * Plivo-parity alias: <GetInput> -> <Gather>.
     *
     * @param array<int|string, mixed> $attrs camelCase attributes.
     */
    public function addGetInput(mixed ...$attrs): GatherElement
    {
        return $this->addGather(...$attrs);
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addDial(?string $number = null, mixed ...$attrs): DialElement
    {
        return $this->add(new DialElement($number, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addRecord(mixed ...$attrs): RecordElement
    {
        return $this->add(new RecordElement(...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addConference(?string $room = null, mixed ...$attrs): ConferenceElement
    {
        return $this->add(new ConferenceElement($room, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes (e.g. `async: false`). */
    public function addDtmf(?string $digits = null, mixed ...$attrs): DtmfElement
    {
        return $this->add(new DtmfElement($digits, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addRedirect(?string $url = null, mixed ...$attrs): RedirectElement
    {
        return $this->add(new RedirectElement($url, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addHangup(mixed ...$attrs): HangupElement
    {
        return $this->add(new HangupElement(...$attrs));
    }

    public function addPreanswer(): PreAnswerElement
    {
        return $this->add(new PreAnswerElement());
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes (`audioTrack`, `bidirectional`, ...). */
    public function addStream(?string $url = null, mixed ...$attrs): StreamElement
    {
        return $this->add(new StreamElement($url, ...$attrs));
    }
}
