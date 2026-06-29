# Vobiz PHP SDK

The official PHP library for [Vobiz](https://vobiz.ai) — the AI-first voice and telephony API for builders. Use it to make and control calls, manage SIP trunks and phone numbers, run conferences, capture recordings, and more, straight from your PHP application.

[![Packagist](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/vobiz/vobiz-php)

## Quick links

- Documentation: https://docs.vobiz.ai
- Dashboard (get your credentials): https://console.vobiz.ai
- Full API reference: [`./reference.md`](./reference.md)

## Requirements

PHP `^8.1` (and the `ext-json` extension).

The SDK works with any [PSR-18](https://www.php-fig.org/psr/psr-18/) HTTP client. If none is installed, it auto-discovers one via `php-http/discovery`.

## Installation

```sh
composer require vobiz/vobiz-php
```

## Authentication

Vobiz authenticates with an **Auth ID** and an **Auth Token**, which you can find in the [Dashboard](https://console.vobiz.ai). They are sent as the `X-Auth-ID` and `X-Auth-Token` headers automatically.

Instantiate the client with your credentials:

```php
<?php

require 'vendor/autoload.php';

use Vobiz\VobizClient;

$client = new VobizClient(
    apiKey: '<YOUR_AUTH_ID>',     // sent as X-Auth-ID
    authToken: '<YOUR_AUTH_TOKEN>', // sent as X-Auth-Token
);
```

## Quickstart

Make an outbound call:

```php
<?php

require 'vendor/autoload.php';

use Vobiz\VobizClient;
use Vobiz\Calls\Requests\MakeCallRequest;

$client = new VobizClient(
    apiKey: '<YOUR_AUTH_ID>',
    authToken: '<YOUR_AUTH_TOKEN>',
);

$client->calls->makeCall(
    'MA_XXXXXX', // your Auth ID
    new MakeCallRequest([
        'from' => '14155551234',
        'to' => '+919876543210',
        'answerUrl' => 'https://example.com/answer',
        'answerMethod' => 'POST',
    ]),
);
```

The client also exposes other resources such as `$client->phoneNumbers`, `$client->trunks`, `$client->conferences`, `$client->recordings`, and `$client->account`. See [`./reference.md`](./reference.md) for the complete list.

## Error handling

When the API returns a non-success status code (4xx or 5xx), the SDK throws an exception:

```php
use Vobiz\Exceptions\VobizApiException;

try {
    $response = $client->calls->makeCall(/* ... */);
} catch (VobizApiException $e) {
    echo 'API exception: ' . $e->getMessage() . "\n";
    echo 'Status code: ' . $e->getCode() . "\n";
    echo 'Response body: ' . $e->getBody() . "\n";
}
```

All SDK exceptions extend `Vobiz\Exceptions\VobizException`.

## Other SDKs

Vobiz ships official SDKs in several languages under [github.com/vobiz-ai](https://github.com/vobiz-ai):

| Language   | Repository |
| ---------- | ---------- |
| TypeScript | [Vobiz-Node-SDK](https://github.com/vobiz-ai/Vobiz-Node-SDK) |
| Python     | [Vobiz-Python-SDK](https://github.com/vobiz-ai/Vobiz-Python-SDK) |
| Go         | [Vobiz-Go-SDK](https://github.com/vobiz-ai/Vobiz-Go-SDK) |
| Java       | [Vobiz-Java-SDK](https://github.com/vobiz-ai/Vobiz-Java-SDK) |
| Ruby       | [Vobiz-Ruby-SDK](https://github.com/vobiz-ai/Vobiz-Ruby-SDK) |
| C#         | [Vobiz-Csharp-sdk](https://github.com/vobiz-ai/Vobiz-Csharp-sdk) |

## License

Released under the [MIT License](./LICENSE).
