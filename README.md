# Vobiz PHP Library

PHP client for the Vobiz programmable voice API — place and control calls, manage numbers and SIP trunks, pull CDRs, and build VobizXML call flows from PHP applications.

[![Licence: MIT](https://img.shields.io/badge/licence-MIT-green.svg)](./LICENSE)
[![PHP 8.1+](https://img.shields.io/badge/php-8.1%2B-777bb4.svg)](https://www.php.net/)
[![Docs](https://img.shields.io/badge/docs-docs.vobiz.ai-blue.svg)](https://docs.vobiz.ai)
[![Built with Fern](https://img.shields.io/badge/%F0%9F%8C%BF-Built%20with%20Fern-brightgreen)](https://buildwithfern.com?utm_source=github&utm_medium=github&utm_campaign=readme&utm_source=Vobiz%2FPHP)

## Overview

This library wraps the Vobiz REST API in typed PHP classes. It is generated from
the Vobiz OpenAPI specification with [Fern](https://buildwithfern.com), so every
request class, response class, and endpoint method tracks the published API
surface. The generated source covers 27 resource groups — calls, live calls,
CDRs, recordings, conferences, phone numbers, SIP trunks, applications, endpoints,
sub-accounts, credentials, IP access control lists, and the partner API among them.

`Vobiz\VobizClient` is the single entry point. Each resource group hangs off it as
a public property — `$client->calls`, `$client->cdr`, `$client->phoneNumbers` —
so discovery in an IDE is straightforward and every argument and return value is
type-hinted.

Alongside the generated client, the namespace `Vobiz\Xml` holds a hand-written
builder for VobizXML — the XML dialect Vobiz fetches from your `answer_url` to
drive a live call. You can therefore both originate a call and answer its webhook
from the same dependency, which fits neatly into a Laravel or Symfony controller.

Transport is PSR-18, so the library works with whichever HTTP client your
application already uses; PSR-17 factories are discovered through
`php-http/discovery`. Automatic retries with exponential backoff and jitter are
built in.

## Installation

This library is not yet published to Packagist, so install it from the Git
repository. Add it as a VCS repository in your `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/vobiz-ai/Vobiz-PHP-SDK"
    }
  ]
}
```

Then require it, together with a PSR-18 HTTP client:

```bash
composer require vobiz/vobiz-php:dev-main
composer require guzzlehttp/guzzle:^7.4
```

The package declares `psr/http-client-implementation` and
`psr/http-factory-implementation` as virtual dependencies, so Composer will
refuse to install until you supply a concrete implementation. Guzzle 7 and
`symfony/http-client` both satisfy them; Guzzle and Symfony HttpClient are also
the two clients whose native timeout option this library can forward.

**Or work against a local checkout** while developing:

```bash
git clone https://github.com/vobiz-ai/Vobiz-PHP-SDK.git
cd Vobiz-PHP-SDK
composer install
composer build      # php -l over src and tests
composer test       # PHPUnit
composer analyze    # PHPStan
```

and point Composer at the directory:

```json
{
  "repositories": [
    { "type": "path", "url": "../Vobiz-PHP-SDK" }
  ]
}
```

Requirements: PHP 8.1 or newer and the `json` extension. The package name is
`vobiz/vobiz-php` and the PSR-4 autoload prefix is `Vobiz\` mapped to `src/`.
Once the library is published to Packagist, `composer require vobiz/vobiz-php`
will work without the repository entry.

## Authentication

Every request carries three credentials, all of which the constructor requires:

| Header | Constructor argument | Where to find it |
| --- | --- | --- |
| `Authorization: Bearer <token>` | `token` | Vobiz console |
| `X-Auth-ID` | `authId` | Vobiz console |
| `X-Auth-Token` | `authToken` | Vobiz console |

```php
<?php

require 'vendor/autoload.php';

use Vobiz\VobizClient;

$client = new VobizClient(
    token: getenv('VOBIZ_TOKEN'),
    authId: getenv('VOBIZ_AUTH_ID'),
    authToken: getenv('VOBIZ_AUTH_TOKEN'),
);
```

The positional order is `token`, `authId`, `authToken`, `options`. Named
arguments — as above — remove any doubt and are the recommended style.

Read credentials from the environment or a secret manager. Do not commit them.

Note that most endpoint methods also take the auth ID as their first argument —
it identifies the account or sub-account the call acts on, and it is separate from
the header used to authenticate the request.

## Quickstart

Place an outbound call. Vobiz dials `to`, and when the leg is answered it fetches
VobizXML from `answerUrl` to decide what happens next.

```php
<?php

require 'vendor/autoload.php';

use Vobiz\VobizClient;
use Vobiz\Calls\Requests\MakeCallRequest;

$authId = getenv('VOBIZ_AUTH_ID');

$client = new VobizClient(
    token: getenv('VOBIZ_TOKEN'),
    authId: $authId,
    authToken: getenv('VOBIZ_AUTH_TOKEN'),
);

$response = $client->calls->makeCall(
    $authId,
    new MakeCallRequest([
        'from' => '+15550001111',
        'to' => '+15550003333',
        'answerUrl' => 'https://example.com/answer',
        'answerMethod' => 'POST',
    ]),
);

echo $response->requestUuid . PHP_EOL;
echo $response->message . PHP_EOL;
```

Request objects take a single associative array. Keys are camelCase in PHP and
are serialised to the snake_case the API expects — `answerUrl` goes out as
`answer_url`. All four keys shown are required by `MakeCallRequest`.

`to` accepts multiple destinations separated by `<` to fan a single request out to
up to 1000 numbers, for example `+15550003333<+15550004444`.

## Common operations

**List live calls and hang one up**

```php
use Vobiz\LiveCalls\Requests\ListLiveCallsRequest;

$live = $client->liveCalls->listLiveCalls($authId, new ListLiveCallsRequest([]));

$client->liveCalls->hangupCall($authId, 'call-uuid-here');
```

**Query call detail records**

```php
use Vobiz\Cdr\Requests\ListCdrsRequest;

$cdrs = $client->cdr->listCdrs($authId, new ListCdrsRequest([
    'startDate' => new DateTime('2026-01-01'),
    'endDate' => new DateTime('2026-01-31'),
    'perPage' => 100,
    'page' => 1,
]));
```

`$client->cdr->searchCdrs(...)`, `$client->cdr->listRecentCdrs(...)` and
`$client->cdr->getCdr($authId, $callId)` cover the rest of the CDR surface;
`$client->cdr->exportCdrs(...)` returns the export as a string.

Note that `ListCdrsRequest` and its siblings default to an empty request, so
`$client->cdr->listCdrs($authId)` is valid when no filters are needed.

**Speak text into a call that is already up**

```php
use Vobiz\SpeakText\Requests\SpeakTextCallRequest;

$client->speakText->call($authId, 'call-uuid-here', new SpeakTextCallRequest([]));

$client->speakText->stopSpeakCall($authId, 'call-uuid-here');
```

`$client->playAudio->call(...)` and `$client->playAudio->stopAudioCall(...)` do the
same for audio files.

**List and manage phone numbers**

```php
$numbers = $client->phoneNumbers->listNumbers($authId);

$health = $client->phoneNumbers->getNumberHealth($authId, '+15550001111');

$client->phoneNumbers->unassignNumberFromTrunk($authId, '+15550001111');
```

**Manage applications**

```php
use Vobiz\Applications\Requests\CreateApplicationRequest;

$apps = $client->applications->listApplications($authId);

$app = $client->applications->retrieveApplication($authId, $appId);

$client->applications->deleteApplication($authId, $appId);
```

**Check the account balance**

```php
$balance = $client->balance->getBalance($authId, 'USD');

$transactions = $client->balance->listTransactions($authId);
```

The full method-by-method surface is in [`reference.md`](./reference.md).

## VobizXML

`Vobiz\Xml` builds the XML documents Vobiz fetches from your `answer_url`. Start
at `ResponseElement`, chain `add*` helpers, and serialise.

```php
use Vobiz\Xml\ResponseElement;

$response = new ResponseElement();

$gather = $response->addGather(
    action: 'https://example.com/menu',
    inputType: 'dtmf',
    numDigits: 1,
    executionTimeout: 10,
);
$gather->addSpeak('Press 1 for sales, 2 for support.');

$response->addSpeak("We didn't receive your input. Goodbye.");
$response->addHangup();

echo $response->toString(false);   // compact — return this from your webhook
echo $response;                    // __toString() is pretty-printed
```

Attributes are passed as named arguments in camelCase and are converted for you —
booleans become `true`/`false`, everything else is cast to a string. `set([...])`
overrides attributes after construction and returns `$this` for chaining. Text
content and attribute values are XML-escaped.

Elements available from `ResponseElement`: `addSpeak`, `addPlay`, `addWait`,
`addGather` (aliased as `addGetDigits` and `addGetInput`), `addDial`, `addRecord`,
`addConference`, `addDtmf`, `addRedirect`, `addHangup`, `addPreanswer`, and
`addStream`. `DialElement` adds `addNumber`, `addUser`, and `addRecord`;
`GatherElement` adds `addSpeak` and `addPlay`.

`addSpeak` accepts an `ssml:` argument to inject raw, unescaped SSML instead of
plain text:

```php
$response->addSpeak(ssml: '<prosody rate="slow">Please hold.</prosody>');
```

`toString(true)` pretty-prints, `toString(false)` emits a single line, and both
prefix the XML declaration. Return the compact form from your webhook with a
`text/xml` content type.

The VobizXML reference, including every attribute each element accepts, is at
[docs.vobiz.ai](https://docs.vobiz.ai).

## Configuration

The fourth constructor argument is an options array:

| Key | Type | Default |
| --- | --- | --- |
| `baseUrl` | `string` | `https://api.vobiz.ai` |
| `client` | `Psr\Http\Client\ClientInterface` | discovered via `php-http/discovery` |
| `maxRetries` | `int` | 2 |
| `timeout` | `float` (seconds) | the HTTP client's own default |
| `headers` | `array<string, string>` | merged over the SDK defaults |

`Vobiz\Environments` is a backed enum holding the known hosts. It currently
defines `Environments::Production`, pointing at `https://api.vobiz.ai`.

```php
use Vobiz\VobizClient;
use Vobiz\Environments;

$client = new VobizClient(
    token: $token,
    authId: $authId,
    authToken: $authToken,
    options: [
        'baseUrl' => Environments::Production->value,
        'maxRetries' => 3,
        'timeout' => 30.0,
        'headers' => ['X-Request-Id' => 'abc-123'],
    ],
);
```

Point `baseUrl` at any other host — a local mock or a proxy — by passing the URL
string directly.

**Per-request overrides.** Every endpoint method takes a trailing `$options`
array accepting `maxRetries`, `timeout`, `headers`, `queryParameters`, and
`bodyProperties`:

```php
$response = $client->calls->makeCall(
    $authId,
    $request,
    options: [
        'timeout' => 5.0,
        'maxRetries' => 0,
    ],
);
```

**Retries.** Requests are retried up to `maxRetries` times with exponential
backoff, 20% jitter, and a 60-second ceiling on any single delay. A response is
retried when its status is 408, 429, or 5XX. Transport-level exceptions are also
retried until the budget is spent, then rethrown.

**Custom HTTP client.** Any PSR-18 `ClientInterface` will do:

```php
$custom = new \GuzzleHttp\Client(['timeout' => 5.0]);

$client = new VobizClient(
    token: $token,
    authId: $authId,
    authToken: $authToken,
    options: ['client' => $custom],
);
```

The `timeout` option is forwarded natively to Guzzle and to
`Symfony\Component\HttpClient\Psr18Client`. With any other PSR-18 client the
value cannot be applied and the library raises an `E_USER_WARNING` once, then
continues — set the timeout on that client directly instead.

## Error handling

The exception hierarchy lives in `Vobiz\Exceptions`:

- `Vobiz\Exceptions\VobizException` — base class, extends `\Exception`. Everything
  the SDK throws derives from it.
- `Vobiz\Exceptions\VobizApiException` — thrown for any non-2XX response. The
  status code is the exception code, retrievable with `getCode()`, and the decoded
  response body with `getBody()`.

```php
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Exceptions\VobizException;

try {
    $response = $client->calls->makeCall($authId, $request);
} catch (VobizApiException $e) {
    match (true) {
        $e->getCode() === 401 => error_log('Credentials rejected'),
        $e->getCode() === 404 => error_log('Not found'),
        $e->getCode() === 429 => error_log('Rate limited'),
        default => error_log($e->getCode() . ': ' . print_r($e->getBody(), true)),
    };
} catch (VobizException $e) {
    // transport failure, serialisation failure, or similar
    error_log($e->getMessage());
}
```

Catch `VobizApiException` before `VobizException`, since the former extends the
latter. Casting the exception to a string yields the message, status code, and
body in one line, which is convenient for logging.

## Pagination

The list endpoints that support paging expose `page` and `perPage` on their
request classes — `ListCdrsRequest`, `ListNumbersRequest`, `ListRecordingsRequest`
and their siblings. Page numbers start at 1, and `perPage` is capped at 100.

```php
use Vobiz\Cdr\Requests\ListCdrsRequest;

$page = 1;
do {
    $batch = $client->cdr->listCdrs($authId, new ListCdrsRequest([
        'page' => $page,
        'perPage' => 100,
    ]));

    // process $batch

    $page++;
} while (/* the returned page was full and a next page is reported */ false);
```

There is no auto-paging iterator in this generated client; loop over pages
yourself, as above.

## Troubleshooting

| Symptom | Likely cause | Fix |
| --- | --- | --- |
| `composer require` fails on `psr/http-client-implementation` | The package requires a concrete PSR-18 client, which is a virtual dependency | Install one alongside it: `composer require guzzlehttp/guzzle:^7.4` or `symfony/http-client` |
| `Http\Discovery\Exception\NotFoundException: No PSR-18 clients found` at runtime | A PSR-18 client is not installed, or discovery cannot see it | Install Guzzle or Symfony HttpClient, or pass your own instance as `options: ['client' => $custom]` |
| `Package vobiz/vobiz-php has no version matching` | Packagist has no such package yet | Add the VCS repository entry shown in [Installation](#installation) and require `dev-main` |
| `VobizApiException` with code 401 on every call | Bearer token or `X-Auth-*` pair is wrong, or belongs to a different environment | Re-copy all three values from the Vobiz console and confirm `baseUrl` is `https://api.vobiz.ai` |
| `VobizApiException` with code 404 on a call-scoped method | The call UUID has already ended, or the auth ID argument does not own it | Confirm the UUID against `$client->liveCalls->listLiveCalls(...)` and pass the auth ID that owns the call |
| `E_USER_WARNING: Timeout option is not supported for the current PSR-18 client` | The `timeout` option can only be forwarded to Guzzle or Symfony HttpClient | Configure the timeout on your own client instance, or switch to Guzzle or Symfony HttpClient |
| `VobizApiException` with code 429 surfacing despite retries | The burst exceeds what two retries absorb | Raise `maxRetries`, or space requests out |
| `ArgumentCountError` or a missing-key notice constructing a request | Request classes take one associative array, and some keys are mandatory | Check the constructor docblock — `MakeCallRequest` requires `from`, `to`, `answerUrl`, and `answerMethod` |
| Webhook returns 500 and the call drops | VobizXML pretty-printed, or the response is not `text/xml` | Return `$response->toString(false)` and set the content type to `text/xml` |
| Retried POST sends an empty body | An HTTP client that consumes a non-rewindable stream | The library rewinds the request body between attempts; if a custom client wraps the stream, ensure it is seekable |

## Other Vobiz SDKs

The same API, generated for other languages:

| Language | Repository |
| --- | --- |
| Python | [vobiz-ai/Vobiz-Python-SDK](https://github.com/vobiz-ai/Vobiz-Python-SDK) |
| Node.js / TypeScript | [vobiz-ai/Vobiz-Node-SDK](https://github.com/vobiz-ai/Vobiz-Node-SDK) |
| Go | [vobiz-ai/Vobiz-Go-SDK](https://github.com/vobiz-ai/Vobiz-Go-SDK) |
| Ruby | [vobiz-ai/Vobiz-Ruby-SDK](https://github.com/vobiz-ai/Vobiz-Ruby-SDK) |
| C# / .NET | [vobiz-ai/Vobiz-Csharp-sdk](https://github.com/vobiz-ai/Vobiz-Csharp-sdk) |

## Versioning and stability

`composer.json` currently declares version `0.0.0`. While the library sits below
`1.0.0`, treat the generated surface as evolving: regeneration from an updated
OpenAPI specification can rename classes or add required array keys.

Pin an exact commit or tag in your `composer.lock` rather than tracking
`dev-main`, and read the commit log before upgrading. Once the API surface settles
and the library is published to Packagist, releases will follow semantic
versioning, with breaking changes confined to major versions.

Most of this repository is generated. `src/` is rewritten on every regeneration,
with the exception of `src/Xml`, which is hand-written. `composer.json` carries
hand-set metadata.

## Roadmap

Planned improvements to this library. Ideas and pull requests are welcome —
open an issue to discuss anything here.

- [ ] Publish `vobiz/vobiz-php` to Packagist so the library installs with a plain
      `composer require`, with tagged releases replacing `dev-main`.
- [ ] Ship auto-paging iterators for the list endpoints, so `page`/`perPage`
      loops are not written by hand.
- [ ] Add per-status exception subclasses of `VobizApiException`, so a 401 and a
      429 can be caught separately without inspecting `getCode()`.
- [ ] Provide a Laravel service provider and a Symfony bundle that wire the
      client from configuration and register it in the container.
- [ ] Add a runnable `examples/` directory — outbound call, IVR webhook, CDR
      export — that can be executed straight from a checkout.
- [ ] Extend the VobizXML builder with typed attribute setters per element, so
      attribute names are checked by static analysis rather than passed loosely.
- [ ] Add webhook signature verification helpers for inbound `answer_url` and
      status-callback requests.

## Contributing

While we value open-source contributions to this SDK, this library is generated programmatically.
Additions made directly to this library would have to be moved over to our generation code,
otherwise they would be overwritten upon the next generated release. Feel free to open a PR as
a proof of concept, but know that we will not be able to merge it as-is. We suggest opening
an issue first to discuss with us!

On the other hand, contributions to the README are always very welcome!

See [CONTRIBUTING.md](./CONTRIBUTING.md) for the full guide. In short, the same
checks CI runs:

```bash
composer install
composer build                # php -l over src and tests
composer test                 # PHPUnit
composer analyze              # PHPStan
./vendor/bin/php-cs-fixer fix # formatting
```

## License

Released under the [MIT License](./LICENSE) © Vobiz.

MIT is permissive: you may use, modify, and redistribute this code, including in
closed-source commercial products, provided the copyright notice and licence text
are retained. There is no warranty. If your organisation needs a different
licensing arrangement, contact [piyush@vobiz.ai](mailto:piyush@vobiz.ai).

## Built by Team Vobiz

[Vobiz](https://vobiz.ai) is a programmable voice and SIP-trunking platform for
voice APIs, SIP trunking, and AI voice agents. This repository is built and
maintained by the Vobiz team.

**Maintainer:** Piyush Sahoo — [piyush@vobiz.ai](mailto:piyush@vobiz.ai) · [LinkedIn](https://www.linkedin.com/in/piyush-s713/)

Questions, or want to talk through an integration? Open an issue on this repo,
or reach out directly at [piyush@vobiz.ai](mailto:piyush@vobiz.ai).

**Useful links:** [Docs](https://docs.vobiz.ai) · [API reference](https://docs.vobiz.ai/api-reference) · [Sign up](https://vobiz.ai)
