# Vobiz PHP SDK

The official PHP library for [Vobiz](https://vobiz.ai) — the AI-first voice and telephony API platform for builders. Use this SDK to seamlessly make and control calls, manage SIP trunks, provision phone numbers, run conferences, and capture recordings directly from your PHP application.

[![Packagist](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/vobiz/vobiz-php)

## Quick links

- **Documentation**: [https://docs.vobiz.ai](https://docs.vobiz.ai)
- **Dashboard & Credentials**: [https://console.vobiz.ai](https://console.vobiz.ai)
- **Full API Reference**: [`./reference.md`](./reference.md)

## Features

- **Call Control**: Initiate outbound calls, terminate active calls, and retrieve detailed Call Detail Records (CDRs).
- **In-Call Interactive Controls**: Play audio files, convert text to speech (TTS), send DTMF tones, and stream raw call audio to WebSocket servers.
- **Phone Number Management**: Search inventory, purchase numbers, and assign or unassign them to SIP trunks or sub-accounts.
- **SIP Trunks & Endpoints**: Configure SIP trunks, manage credentials, set IP access control lists (ACLs), and provision SIP endpoints.
- **Conferences**: Create and manage conference rooms, control participant audio (mute, deafen), and record conference sessions.
- **Sub-Accounts & KYC**: Programmatically provision customer sub-accounts and manage KYC verifications (PAN, GSTIN, CIN, DigiLocker) with built-in test-mode mocks.

## Requirements

- PHP `^8.1` or higher.
- The `ext-json` extension.
- A [PSR-18](https://www.php-fig.org/psr/psr-18/) compatible HTTP client (e.g., Guzzle). The SDK uses `php-http/discovery` to auto-discover an installed client if you don't explicitly provide one.

## Installation

Install the package via Composer:

```sh
composer require vobiz/vobiz-php
```

## Authentication

Vobiz authenticates requests using an **Auth ID** and an **Auth Token**. You can find these credentials in the [Vobiz Console](https://console.vobiz.ai). 

We recommend storing your credentials in environment variables. Instantiate the `VobizClient` using the `apiKey` (which maps to your Auth ID) and `authToken` parameters. The SDK will automatically send them as the `X-Auth-ID` and `X-Auth-Token` HTTP headers.

```php
<?php

require 'vendor/autoload.php';

use Vobiz\VobizClient;

$client = new VobizClient(
    apiKey: getenv('VOBIZ_AUTH_ID'),     // Sent as X-Auth-ID
    authToken: getenv('VOBIZ_AUTH_TOKEN')  // Sent as X-Auth-Token
);
```

## Quickstart

Here is a complete example of how to initiate an outbound call:

```php
<?php

require 'vendor/autoload.php';

use Vobiz\VobizClient;
use Vobiz\Calls\Requests\MakeCallRequest;

$authId = getenv('VOBIZ_AUTH_ID');
$client = new VobizClient(
    apiKey: $authId,
    authToken: getenv('VOBIZ_AUTH_TOKEN'),
);

$response = $client->calls->makeCall(
    $authId,
    new MakeCallRequest([
        'from' => '14155551234',
        'to' => '+919876543210',
        'answerUrl' => 'https://example.com/answer',
        'answerMethod' => 'POST',
    ])
);

print_r($response);
```

## Common operations

Below are common operations you can perform with the SDK. For the complete list of methods and parameters, see [`./reference.md`](./reference.md).

### Terminate a live call

```php
$client->liveCalls->hangupCall(
    getenv('VOBIZ_AUTH_ID'),
    'call_uuid_here'
);
```

### Send DTMF tones

Send keypad digits on an active call. Use `w` for a 0.5-second pause and `W` for a 1-second pause.

```php
use Vobiz\Dtmf\Requests\SendDtmfRequest;
use Vobiz\Dtmf\Requests\SendDtmfRequestLeg;

$client->dtmf->sendDtmf(
    getenv('VOBIZ_AUTH_ID'),
    'call_uuid_here',
    new SendDtmfRequest([
        'digits' => '1234#',
        'leg' => SendDtmfRequestLeg::Aleg->value,
    ])
);
```

### Purchase a phone number

Purchase a phone number from the Vobiz inventory and assign it to your account.

```php
use Vobiz\PhoneNumbers\Requests\PurchaseFromInventoryRequest;

$client->phoneNumbers->purchaseFromInventory(
    getenv('VOBIZ_AUTH_ID'),
    new PurchaseFromInventoryRequest([
        'e164' => '+919876543210',
        'currency' => 'USD',
    ])
);
```

### List call recordings

Retrieve a paginated list of all call recordings on your account.

```php
use Vobiz\Recordings\Requests\ListRecordingsRequest;

$recordings = $client->recordings->listRecordings(
    getenv('VOBIZ_AUTH_ID'),
    new ListRecordingsRequest([
        'limit' => 20,
        'offset' => 0,
    ])
);

foreach ($recordings as $recording) {
    echo $recording->id . "\n";
}
```

### Convert text to speech (TTS) on a live call

Play spoken text to a specific live call leg.

```php
use Vobiz\SpeakText\Requests\SpeakTextCallRequest;

$client->speakText->call(
    getenv('VOBIZ_AUTH_ID'),
    'call_uuid_here',
    new SpeakTextCallRequest([
        'text' => 'Hello, your appointment is confirmed for tomorrow at 3 PM.',
        'voice' => 'WOMAN',
        'language' => 'en-US',
    ])
);
```

## Error handling

When the API returns a non-success HTTP status code (e.g., 4xx or 5xx), the SDK throws a `VobizApiException`. All SDK exceptions inherit from the base `Vobiz\Exceptions\VobizException`.

```php
use Vobiz\Exceptions\VobizApiException;

try {
    $client->liveCalls->hangupCall(getenv('VOBIZ_AUTH_ID'), 'invalid_uuid');
} catch (VobizApiException $e) {
    echo "API Error: " . $e->getMessage() . "\n";
    echo "Status Code: " . $e->getCode() . "\n";
    echo "Response Body: " . $e->getBody() . "\n";
}
```

## Other Vobiz SDKs

Vobiz provides official SDKs for several popular programming languages. You can find them under the [Vobiz GitHub organization](https://github.com/vobiz-ai):

| Language   | Repository |
| ---------- | ---------- |
| TypeScript | [Vobiz-Node-SDK](https://github.com/vobiz-ai/Vobiz-Node-SDK) |
| Python     | [Vobiz-Python-SDK](https://github.com/vobiz-ai/Vobiz-Python-SDK) |
| Go         | [Vobiz-Go-SDK](https://github.com/vobiz-ai/Vobiz-Go-SDK) |
| Ruby       | [Vobiz-Ruby-SDK](https://github.com/vobiz-ai/Vobiz-Ruby-SDK) |
| C#         | [Vobiz-Csharp-sdk](https://github.com/vobiz-ai/Vobiz-Csharp-sdk) |
| Java       | [Vobiz-Java-SDK](https://github.com/vobiz-ai/Vobiz-Java-SDK) |

## Support

If you need help or have questions, please check out our [Documentation](https://docs.vobiz.ai) or reach out through the [Vobiz Dashboard](https://console.vobiz.ai).

## License

Released under the [MIT License](./LICENSE).
