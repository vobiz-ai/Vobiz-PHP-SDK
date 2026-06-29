<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/**
 * Base element + serialization for the Vobiz call-control XML builder.
 *
 * Mirrors Plivo's `plivoxml` (ResponseElement + add* builders + toString()) and
 * emits XML byte-identical to the Python `vobizxml` package and the Node
 * `@vobiz/sdk` builder. A single element holds an ordered attribute map, optional
 * text content, and child elements; subclasses set the tag name and expose the
 * `add*` helpers.
 *
 * Attribute keys are the camelCase VobizXML attribute names directly
 * (`inputType`, `executionTimeout`, `numDigits`, `callerId`, ...). Pass them as an
 * associative array (PHP preserves insertion order) or as PHP 8 named arguments;
 * either way they serialize in insertion order.
 */
class VobizXMLElement
{
    public const XML_DECLARATION = '<?xml version="1.0" encoding="UTF-8"?>';

    /** 4-space indent, matching the xml/*.mdx reference style. */
    private const INDENT = '    ';

    protected string $name;

    /** Text content, or null for empty / container elements. */
    protected ?string $content;

    /** When true, content is inserted without escaping (e.g. raw SSML). */
    protected bool $raw;

    /** @var array<int, VobizXMLElement> */
    protected array $children = [];

    /** Ordered attribute map (insertion order preserved). @var array<string, string> */
    protected array $attributes = [];

    /**
     * @param array<string, mixed> $attrs camelCase attribute name => value;
     *                                     null values are skipped.
     */
    public function __construct(string $name, ?string $content = null, array $attrs = [], bool $raw = false)
    {
        $this->name = $name;
        $this->content = $content;
        $this->raw = $raw;
        foreach ($attrs as $key => $value) {
            if ($value === null) {
                continue;
            }
            $this->attributes[$key] = self::attrValue($value);
        }
    }

    /**
     * Append a child element and return it (so callers can keep nesting).
     *
     * @template T of VobizXMLElement
     * @param T $element
     * @return T
     */
    public function add(VobizXMLElement $element): VobizXMLElement
    {
        $this->children[] = $element;

        return $element;
    }

    /**
     * Set/override attributes after construction; returns $this for chaining.
     *
     * @param array<string, mixed> $attrs
     */
    public function set(array $attrs): static
    {
        foreach ($attrs as $key => $value) {
            if ($value === null) {
                continue;
            }
            $this->attributes[$key] = self::attrValue($value);
        }

        return $this;
    }

    /** Render an attribute value: bools -> 'true'/'false', everything else -> string. */
    public static function attrValue(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        return (string) $value;
    }

    /** Escape XML text content (& < >). */
    public static function escape(string|int|float $text): string
    {
        return str_replace(['&', '<', '>'], ['&amp;', '&lt;', '&gt;'], (string) $text);
    }

    /** Escape an attribute value (text rules plus double quotes). */
    public static function escapeAttr(string $value): string
    {
        return str_replace('"', '&quot;', self::escape($value));
    }

    /**
     * Normalize variadic attribute arguments into a single assoc array.
     *
     * Accepts either named args (`addGather(action: 'x', inputType: 'dtmf')`),
     * which arrive as `['action' => 'x', 'inputType' => 'dtmf']`, or a single
     * positional assoc array (`addGather(['action' => 'x'])`).
     *
     * @param array<int|string, mixed> $attrs
     * @return array<string, mixed>
     */
    protected static function normalizeAttrs(array $attrs): array
    {
        if (count($attrs) === 1 && array_key_exists(0, $attrs) && is_array($attrs[0])) {
            return $attrs[0];
        }

        /** @var array<string, mixed> $attrs */
        return $attrs;
    }

    private function openTag(): string
    {
        $parts = [$this->name];
        foreach ($this->attributes as $key => $value) {
            $parts[] = $key . '="' . self::escapeAttr($value) . '"';
        }

        return implode(' ', $parts);
    }

    protected function render(int $level, bool $pretty): string
    {
        $pad = $pretty ? str_repeat(self::INDENT, $level) : '';
        $openTag = $this->openTag();

        // Empty element -> self-closing.
        if (count($this->children) === 0 && $this->content === null) {
            return $pad . '<' . $openTag . '/>';
        }

        // Text-content element -> single line.
        if (count($this->children) === 0) {
            $body = $this->raw ? $this->content : self::escape($this->content);

            return $pad . '<' . $openTag . '>' . $body . '</' . $this->name . '>';
        }

        // Container element -> children indented (content, if any, is ignored).
        if ($pretty) {
            $inner = implode("\n", array_map(
                fn (VobizXMLElement $c): string => $c->render($level + 1, $pretty),
                $this->children
            ));

            return $pad . '<' . $openTag . ">\n" . $inner . "\n" . $pad . '</' . $this->name . '>';
        }

        $inner = implode('', array_map(
            fn (VobizXMLElement $c): string => $c->render($level + 1, $pretty),
            $this->children
        ));

        return '<' . $openTag . '>' . $inner . '</' . $this->name . '>';
    }

    /** Serialize to a VobizXML document string (with the XML declaration). */
    public function toString(bool $pretty = true): string
    {
        $body = $this->render(0, $pretty);

        return self::XML_DECLARATION . ($pretty ? "\n" : '') . $body;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
