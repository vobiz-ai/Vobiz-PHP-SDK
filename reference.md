# Reference
## Account
<details><summary><code>$client-&gt;account-&gt;retrieveAccount() -> ?RetrieveAccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve complete account details including pricing tier and credentials.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->retrieveAccount();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getConcurrency($authId) -> ?GetConcurrencyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the current concurrent call usage and configured limits.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getConcurrency(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;previewChannelPricing($authId, $request) -> ?ChannelPricingPreview</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Calculate the monthly price for CPS or concurrent-call capacity without purchasing capacity or debiting the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->previewChannelPricing(
    'MA_XXXX',
    new PreviewChannelPricingRequest([
        'resourceType' => CapacityResourceType::ConcurrentCalls->value,
        'quantity' => 30,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Target account Auth ID. An account can preview only its own pricing; administrators may act for another account.
    
</dd>
</dl>

<dl>
<dd>

**$resourceType:** `string` — Capacity type to price.
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `int` — Capacity quantity to price. Pricing-tier block and quantity rules also apply.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;createChannelSubscription($authId, $request) -> ?ChannelSubscription</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Purchase recurring CPS or concurrent-call capacity. A successful request immediately debits the first monthly charge and activates a subscription that renews every 30 days.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->createChannelSubscription(
    'MA_XXXX',
    new ChannelSubscriptionRequest([
        'resourceType' => CapacityResourceType::ConcurrentCalls->value,
        'quantity' => 30,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Target account Auth ID. An account can purchase only for itself; administrators may act for another account.
    
</dd>
</dl>

<dl>
<dd>

**$resourceType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `int` — Capacity quantity to purchase. Pricing-tier block and quantity rules also apply.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Balance
<details><summary><code>$client-&gt;balance-&gt;getBalance($authId, $currency) -> ?GetBalanceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the current account balance for a specific currency.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->balance->getBalance(
    'MA_XXXXXX',
    'INR',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `string` — Currency code (e.g. INR, USD)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;balance-&gt;listTransactions($authId, $request) -> ?ListTransactionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve paginated transaction history for the account, ordered by
`created_at` descending. Filter to a single day by setting `from_date`
and `to_date` to the same date - a bare `YYYY-MM-DD` in `to_date` is
expanded to `23:59:59`, so both bounds are inclusive. Bare dates resolve
in the server timezone (UTC); send an explicit offset such as
`2026-08-28T00:00:00+05:30` to pin a local calendar day.

`limit` and `offset` are not supported - unknown parameters are silently
dropped. `total` and `summary` are computed over the whole filtered set
and ignore pagination, so `per_page=1` returns full-window totals.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->balance->listTransactions(
    'MA_XXXXXX',
    new ListTransactionsRequest([
        'fromDate' => '2026-08-25',
        'toDate' => '2026-08-25',
        'type' => 'debit',
        'currency' => 'INR',
        'referenceType' => 'cdr',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number, 1-indexed.
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Records per page. A value above the maximum falls back to the default of 50 rather than clamping.
    
</dd>
</dl>

<dl>
<dd>

**$fromDate:** `?string` — Start of the window, inclusive. Date-only or full ISO 8601 timestamp. Day boundaries are UTC.
    
</dd>
</dl>

<dl>
<dd>

**$toDate:** `?string` — End of the window, inclusive. A date-only value covers the whole day.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — `credit` or `debit` act as broad classifications and sweep in legacy entry types such as `did_rental`; any other value is an exact match on `transactions[].type`.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Exact match on transaction status.
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Currency code. Uppercased server-side, exact match.
    
</dd>
</dl>

<dl>
<dd>

**$referenceType:** `?string` — Spend source, matching `transactions[].reference_type`.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Case-insensitive substring match on the description.
    
</dd>
</dl>

<dl>
<dd>

**$reference:** `?string` — Case-insensitive substring match on the reference.
    
</dd>
</dl>

<dl>
<dd>

**$transactionId:** `?string` — Fetch a single ledger entry by its UUID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;balance-&gt;listTransactionReferenceTypes($authId) -> ?ListTransactionReferenceTypesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the distinct `reference_type` values present on the account's ledger. Use it to discover valid values for the `reference_type` filter on the transactions endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->balance->listTransactionReferenceTypes(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Live Calls
<details><summary><code>$client-&gt;liveCalls-&gt;listQueuedCalls($authId, $request) -> ?ListQueuedCallsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all queued (pending, not yet connected) calls on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->liveCalls->listQueuedCalls(
    'MA_XXXXXX',
    new ListQueuedCallsRequest([
        'status' => ListQueuedCallsRequestStatus::Live->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;liveCalls-&gt;listLiveCalls($authId, $request) -> ?ListLiveCallsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all currently active (live) calls on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->liveCalls->listLiveCalls(
    'MA_XXXXXX',
    new ListLiveCallsRequest([
        'status' => ListLiveCallsRequestStatus::Live->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;liveCalls-&gt;getLiveCall($authId, $callUuid, $request) -> ?GetLiveCallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details of a specific live or queued call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->liveCalls->getLiveCall(
    'MA_XXXXXX',
    'cdr_XXXXXXXXXX',
    new GetLiveCallRequest([
        'status' => GetLiveCallRequestStatus::Live->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;liveCalls-&gt;hangupCall($authId, $callUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Terminate an active call by its UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->liveCalls->hangupCall(
    'MA_XXXXXX',
    'call_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;liveCalls-&gt;getQueuedCall($authId, $callUuid, $request) -> ?GetQueuedCallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details of a specific queued (pending) call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->liveCalls->getQueuedCall(
    'MA_XXXXXX',
    'cdr_XXXXXXXXXX',
    new GetQueuedCallRequest([
        'status' => GetQueuedCallRequestStatus::Live->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Calls
<details><summary><code>$client-&gt;calls-&gt;makeCall($authId, $request) -> ?MakeCallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Initiate an outbound call to a PSTN number or SIP endpoint.
Use `<` to separate multiple destinations (max 1000).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->makeCall(
    'MA_XXXXXX',
    new MakeCallRequest([
        'from' => '14155551234',
        'to' => '+919876543210',
        'answerUrl' => 'https://example.com/answer',
        'answerMethod' => 'POST',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$from:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` 

Destination PSTN number or SIP endpoint. Separate multiple destinations with
the `<` character to fan out a single request to up to 1000 destinations,
for example `+919876543210<+919876543211`.
    
</dd>
</dl>

<dl>
<dd>

**$answerUrl:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$answerMethod:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## CDR
<details><summary><code>$client-&gt;cdr-&gt;listCdrs($authId, $request) -> ?ListCdrsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all CDRs for your account. Supports filtering by phone numbers,
date range, call direction, duration, and pagination.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->cdr->listCdrs(
    'MA_XXXXXX',
    new ListCdrsRequest([
        'fromNumber' => '9876543210',
        'toNumber' => '1234567890',
        'startDate' => new DateTime('2026-03-01'),
        'endDate' => new DateTime('2026-03-17'),
        'minDuration' => 10,
        'sipCallId' => 'dD1qwu5VZ5iK3ed5u3uspjY5RKL',
        'bridgeUuid' => '4b7ae653-f40d-42f1-b582-6b05dfcd0c0a',
        'hangupCause' => 'NORMAL_CLEARING',
        'hangupDisposition' => 'send_refuse',
        'context' => 'sip-trunking',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$fromNumber:** `?string` — Filter by the originating phone number (caller).
    
</dd>
</dl>

<dl>
<dd>

**$toNumber:** `?string` — Filter by the destination phone number (callee).
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` — Beginning of the search period (YYYY-MM-DD). Required when using `end_date`.
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End of the search period (YYYY-MM-DD). Required when using `start_date`.
    
</dd>
</dl>

<dl>
<dd>

**$callDirection:** `?string` — Filter by direction.
    
</dd>
</dl>

<dl>
<dd>

**$minDuration:** `?int` — Minimum call duration in seconds. Excludes calls shorter than this value.
    
</dd>
</dl>

<dl>
<dd>

**$sipCallId:** `?string` — Filter by the SIP Call-ID of the call (matches the cdr's sip_call_id field).
    
</dd>
</dl>

<dl>
<dd>

**$bridgeUuid:** `?string` — Filter by the UUID of the bridged leg (matches the cdr's bridge_uuid field).
    
</dd>
</dl>

<dl>
<dd>

**$hangupCause:** `?string` — Filter by telephony hangup cause, e.g. NORMAL_CLEARING.
    
</dd>
</dl>

<dl>
<dd>

**$hangupDisposition:** `?string` — Filter by how the leg was released, e.g. send_refuse.
    
</dd>
</dl>

<dl>
<dd>

**$context:** `?string` — Filter by the call context, e.g. sip-trunking.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — Filter by the campaign identifier associated with the call.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Free-text search across CDR fields (numbers, IDs, etc.).
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number for paginated results.
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Number of records per page. Max: 100.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;cdr-&gt;searchCdrs($authId, $request) -> ?SearchCdrsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Identical filters to the list endpoint, but the response also includes a
`filter_summary` object describing the active filters applied.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->cdr->searchCdrs(
    'MA_XXXXXX',
    new SearchCdrsRequest([
        'fromNumber' => '9876543210',
        'toNumber' => '1234567890',
        'startDate' => new DateTime('2026-03-01'),
        'endDate' => new DateTime('2026-03-17'),
        'minDuration' => 10,
        'sipCallId' => 'dD1qwu5VZ5iK3ed5u3uspjY5RKL',
        'bridgeUuid' => '4b7ae653-f40d-42f1-b582-6b05dfcd0c0a',
        'hangupCause' => 'NORMAL_CLEARING',
        'hangupDisposition' => 'send_refuse',
        'context' => 'sip-trunking',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$fromNumber:** `?string` — Filter by the originating phone number (caller).
    
</dd>
</dl>

<dl>
<dd>

**$toNumber:** `?string` — Filter by the destination phone number (callee).
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` — Beginning of the search period (YYYY-MM-DD). Required when using `end_date`.
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End of the search period (YYYY-MM-DD). Required when using `start_date`.
    
</dd>
</dl>

<dl>
<dd>

**$callDirection:** `?string` — Filter by direction.
    
</dd>
</dl>

<dl>
<dd>

**$minDuration:** `?int` — Minimum call duration in seconds. Excludes calls shorter than this value.
    
</dd>
</dl>

<dl>
<dd>

**$sipCallId:** `?string` — Filter by the SIP Call-ID of the call (matches the cdr's sip_call_id field).
    
</dd>
</dl>

<dl>
<dd>

**$bridgeUuid:** `?string` — Filter by the UUID of the bridged leg (matches the cdr's bridge_uuid field).
    
</dd>
</dl>

<dl>
<dd>

**$hangupCause:** `?string` — Filter by telephony hangup cause, e.g. NORMAL_CLEARING.
    
</dd>
</dl>

<dl>
<dd>

**$hangupDisposition:** `?string` — Filter by how the leg was released, e.g. send_refuse.
    
</dd>
</dl>

<dl>
<dd>

**$context:** `?string` — Filter by the call context, e.g. sip-trunking.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — Filter by the campaign identifier associated with the call.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Free-text search across CDR fields (numbers, IDs, etc.).
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number for paginated results.
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Number of records per page. Max: 100.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;cdr-&gt;listRecentCdrs($authId, $request) -> ?ListRecentCdrsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the most recent CDRs for your account without requiring a date range.
Default 20 records; use `limit` to retrieve more.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->cdr->listRecentCdrs(
    'MA_XXXXXX',
    new ListRecentCdrsRequest([
        'limit' => 50,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of recent CDRs to return.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;cdr-&gt;exportCdrs($authId, $request) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns CDR data as a downloadable CSV file. Same filters as the list endpoint.

**Note:** Do NOT send `Accept: application/json` on this endpoint - the response is `text/csv`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->cdr->exportCdrs($authId, $request): string;
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$fromNumber:** `?string` — Filter by the originating phone number (caller).
    
</dd>
</dl>

<dl>
<dd>

**$toNumber:** `?string` — Filter by the destination phone number (callee).
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` — Beginning of the search period (YYYY-MM-DD). Required when using `end_date`.
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End of the search period (YYYY-MM-DD). Required when using `start_date`.
    
</dd>
</dl>

<dl>
<dd>

**$callDirection:** `?string` — Filter by direction.
    
</dd>
</dl>

<dl>
<dd>

**$minDuration:** `?int` — Minimum call duration in seconds. Excludes calls shorter than this value.
    
</dd>
</dl>

<dl>
<dd>

**$sipCallId:** `?string` — Filter by the SIP Call-ID of the call (matches the cdr's sip_call_id field).
    
</dd>
</dl>

<dl>
<dd>

**$bridgeUuid:** `?string` — Filter by the UUID of the bridged leg (matches the cdr's bridge_uuid field).
    
</dd>
</dl>

<dl>
<dd>

**$hangupCause:** `?string` — Filter by telephony hangup cause, e.g. NORMAL_CLEARING.
    
</dd>
</dl>

<dl>
<dd>

**$hangupDisposition:** `?string` — Filter by how the leg was released, e.g. send_refuse.
    
</dd>
</dl>

<dl>
<dd>

**$context:** `?string` — Filter by the call context, e.g. sip-trunking.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — Filter by the campaign identifier associated with the call.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Free-text search across CDR fields (numbers, IDs, etc.).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;cdr-&gt;getCdr($authId, $callId) -> ?GetCdrResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the CDR for a specific completed call using its `call_id`.
Useful when you have a `call_id` from a callback or previous API response.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->cdr->getCdr(
    'MA_XXXXXX',
    'abc123-def456-ghi789',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callId:** `string` — The unique call ID of the completed call.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sub-Accounts
<details><summary><code>$client-&gt;subAccounts-&gt;listSubaccounts($authId) -> ?ListSubaccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all sub-accounts under the master account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccounts->listSubaccounts(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccounts-&gt;createSubaccount($authId, $request) -> ?CreateSubaccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new sub-account under the master account.

Set `kyc_mode` to control how the sub-account is verified:

- `personal_use` *(default)* - the sub-account inherits the parent's
  KYC; no separate verification is required.
- `customer_use` - the sub-account must complete its own KYC before it
  can place calls. A fresh `customer_use` sub-account is returned with
  `kyc_calls_blocked: true`. `customer_use` **requires** `email`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccounts->createSubaccount(
    'MA_XXXXXX',
    new CreateSubaccountRequest([
        'name' => 'Customer Co',
        'email' => 'customer@example.com',
        'password' => 'Customer@12345',
        'kycMode' => CreateSubaccountRequestKycMode::CustomerUse->value,
        'businessType' => CreateSubaccountRequestBusinessType::PrivateLimited->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Human-readable name for the sub-account.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Required when `kyc_mode` is `customer_use`.
    
</dd>
</dl>

<dl>
<dd>

**$password:** `?string` — Login password for the sub-account.
    
</dd>
</dl>

<dl>
<dd>

**$kycMode:** `?string` 

`personal_use` inherits parent KYC. `customer_use` requires
the sub-account to complete its own KYC and requires `email`.
    
</dd>
</dl>

<dl>
<dd>

**$businessType:** `?string` — Legal constitution of the customer. Drives which KYC documents are required.
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccounts-&gt;retrieveSubaccount($authId, $subAuthId) -> ?RetrieveSubaccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details of a specific sub-account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccounts->retrieveSubaccount(
    'MA_XXXXXX',
    'SA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$subAuthId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccounts-&gt;updateSubaccount($authId, $subAuthId, $request) -> ?UpdateSubaccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the name or status of a sub-account, or change its `kyc_mode`.

Set `is_active` to `false` to deactivate a sub-account. A deactivated
sub-account no longer appears in the list, and retrieve, update and
delete requests for it return `404`. The `enabled` field is accepted
but has no effect.

Promoting an existing sub-account to `customer_use` requires the
sub-account to already have an `email` (otherwise `400`). On any
`kyc_mode` change, `kyc_calls_blocked` is re-derived from the
sub-account's current KYC state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccounts->updateSubaccount(
    'MA_XXXXXX',
    'sub_auth_id',
    new UpdateSubaccountRequest([
        'kycMode' => UpdateSubaccountRequestKycMode::CustomerUse->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$subAuthId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` — Set to `false` to deactivate the sub-account. A deactivated sub-account no longer appears in list, retrieve, update or delete requests (`404`).
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Accepted but has no effect. Use `is_active` instead.
    
</dd>
</dl>

<dl>
<dd>

**$kycMode:** `?string` — Change the verification mode. Promoting to `customer_use` requires the sub-account to have an `email`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccounts-&gt;deleteSubaccount($authId, $subAuthId) -> ?DeleteSubaccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently delete a sub-account and revoke its credentials.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccounts->deleteSubaccount(
    'MA_XXXXXX',
    'sub_auth_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$subAuthId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sub-Account KYC
<details><summary><code>$client-&gt;subAccountKyc-&gt;getSubaccountKycStatus($subAuthId) -> ?SubAccountKycStatus</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the aggregated KYC state for a `customer_use` sub-account —
which verifications have passed, whether calls are still blocked, and
the business type. The caller must be the parent main account that owns
the sub-account (or an admin).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->getSubaccountKycStatus(
    'SA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;verifySubaccountPan($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs a real PAN verification (Perfios) for the sub-account. `pan` must
be exactly 10 characters. Persists a `kyc_verifications` row and
recomputes the sub-account's aggregated `kyc_status`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->verifySubaccountPan(
    'SA_XXXXXX',
    new VerifySubaccountPanRequest([
        'pan' => 'ABCDE1234F',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$pan:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;verifySubaccountGst($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs a real GSTIN verification. `gstin` must be a 15-character GSTIN.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->verifySubaccountGst(
    'SA_XXXXXX',
    new VerifySubaccountGstRequest([
        'gstin' => '29AAJCN5983D1Z0',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$gstin:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;searchSubaccountCin($subAuthId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Name-based CIN lookup. Returns candidate company matches; pick one and
pass it to [CIN confirm](#operation/confirm-subaccount-cin).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->searchSubaccountCin(
    'SA_XXXXXX',
    new SearchSubaccountCinRequest([
        'companyName' => 'ACME PRIVATE LIMITED',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$companyName:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;confirmSubaccountCin($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Confirm the CIN selected from the search results.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->confirmSubaccountCin(
    'SA_XXXXXX',
    new ConfirmSubaccountCinRequest([
        'companyName' => 'ACME PRIVATE LIMITED',
        'selectedCin' => 'U72900KA2024PTC123456',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$companyName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$selectedCin:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;subaccountDigilockerInitiate($subAuthId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the DigiLocker authorization link and an `access_request_id`.
The customer completes the OAuth flow on the DigiLocker portal, after
which you finalize with
[DigiLocker verify](#operation/subaccount-digilocker-verify).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->subaccountDigilockerInitiate(
    'SA_XXXXXX',
    new SubaccountDigilockerInitiateRequest([
        'redirectUrl' => 'https://partner.example.com/kyc/callback',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$oauthState:** `?string` — Opaque value echoed back on the redirect for CSRF protection.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;subaccountDigilockerVerify($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Finalize Aadhaar via DigiLocker after the customer completes OAuth.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->subaccountDigilockerVerify(
    'SA_XXXXXX',
    new SubaccountDigilockerVerifyRequest([
        'accessRequestId' => 'AR_xxxxxxxx',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$accessRequestId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$linkedNumber:** `?string` — Optional. Binds the Aadhaar to a specific number (92-series).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKyc-&gt;createSubaccountKycSession($subAuthId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a Vobiz-hosted KYC session for the sub-account. With
`flow_type=email` (default) Vobiz emails the customer a signed link
(from `kyc@vobiz.ai`, hosted at `kyc.vobiz.ai`) and `customer_email` is
required. With `flow_type=redirect`, omit `customer_email`, pass a
`redirect_url`, and the `widget_url` is returned directly for an inline
redirect.

This is the sub-account–scoped equivalent of the partner-level
[KYC Sessions](/partner/api/kyc-sessions) endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKyc->createSubaccountKycSession(
    'SA_XXXXXX',
    new CreateSubaccountKycSessionRequest([
        'accountAuthId' => 'SA_XXXXXX',
        'flowType' => CreateSubaccountKycSessionRequestFlowType::Email->value,
        'customerEmail' => 'customer@example.com',
        'webhookUrl' => 'https://your-app.example.com/kyc/webhook',
        'expiresInDays' => 30,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$accountAuthId:** `string` — The sub-account's auth_id (typically equal to the path `sub_auth_id`).
    
</dd>
</dl>

<dl>
<dd>

**$flowType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$customerEmail:** `?string` — Required when `flow_type` is `email`.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` 

Required when `flow_type` is `redirect`. After verification the customer's
browser is sent to this URL.
    
</dd>
</dl>

<dl>
<dd>

**$webhookUrl:** `?string` — HTTPS endpoint Vobiz POSTs the KYC result to. Omit it and no callbacks are sent.
    
</dd>
</dl>

<dl>
<dd>

**$expiresInDays:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sub-Account KYC (Test Mode)
<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockVerifySubaccountPan($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Mock PAN verification - never hits the provider. Magic `pan` inputs:

| Input | Outcome |
|---|---|
| `TESTSUCCESS0001` | verified |
| `TESTFAIL0001` | failed |
| `TESTERROR0001` | HTTP 500 |
| `TESTPENDING001` | pending (finalize as verified) |
| `TESTPENDING_FAIL` | pending (finalize as failed) |

Persists a real `kyc_verifications` row and recomputes `kyc_status`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockVerifySubaccountPan(
    'SA_XXXXXX',
    new MockVerifySubaccountPanRequest([
        'pan' => 'TESTSUCCESS0001',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$pan:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockVerifySubaccountGst($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Mock GST verification. Same magic-input matrix as [Mock verify PAN](#operation/mock-verify-subaccount-pan).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockVerifySubaccountGst(
    'SA_XXXXXX',
    new MockVerifySubaccountGstRequest([
        'gstin' => 'TESTSUCCESS0001GST',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$gstin:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockSearchSubaccountCin($subAuthId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns deterministic fake company matches.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockSearchSubaccountCin(
    'SA_XXXXXX',
    new MockSearchSubaccountCinRequest([
        'companyName' => 'ACME',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$companyName:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockConfirmSubaccountCin($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Succeeds when `selected_cin` starts with `U72900KA2024PTC123456`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockConfirmSubaccountCin(
    'SA_XXXXXX',
    new MockConfirmSubaccountCinRequest([
        'companyName' => 'ACME',
        'selectedCin' => 'U72900KA2024PTC123456',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$companyName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$selectedCin:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockSubaccountDigilockerInitiate($subAuthId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a deterministic `access_request_id`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockSubaccountDigilockerInitiate(
    'SA_XXXXXX',
    new MockSubaccountDigilockerInitiateRequest([
        'redirectUrl' => 'https://partner.example.com/kyc/callback',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockSubaccountDigilockerVerify($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

`access_request_id` `MOCK_AR_SUCCESS` → verified; `MOCK_AR_FAIL` → failed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockSubaccountDigilockerVerify(
    'SA_XXXXXX',
    new MockSubaccountDigilockerVerifyRequest([
        'accessRequestId' => MockSubaccountDigilockerVerifyRequestAccessRequestId::MockArSuccess->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$accessRequestId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subAccountKycTestMode-&gt;mockFinalizePendingKyc($subAuthId, $request) -> ?KycVerificationResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Promotes the most recent **pending** mock verification of the given
type to a terminal outcome - this drives the async (`TESTPENDING…`)
path without webhooks. `verification_type` ∈ `pan | aadhaar | gst | cin`;
`outcome` ∈ `verified | failed`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subAccountKycTestMode->mockFinalizePendingKyc(
    'SA_XXXXXX',
    new MockFinalizePendingKycRequest([
        'verificationType' => MockFinalizePendingKycRequestVerificationType::Pan->value,
        'outcome' => MockFinalizePendingKycRequestOutcome::Verified->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAuthId:** `string` — The sub-account's Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$verificationType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$outcome:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Phone Numbers
<details><summary><code>$client-&gt;phoneNumbers-&gt;listNumbers($authId, $request) -> ?ListNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all phone numbers on your account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->listNumbers(
    'MA_XXXXXX',
    new ListNumbersRequest([
        'search' => '+919876543210',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number, starting at 1
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Number of phone numbers to return per page
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Filter by phone number. Include the country code and URL-encode a leading plus sign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;unrentNumber($authId, $e164, $request) -> ?UnrentNumberResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Release a phone number from your account. Releasing a number incurs the
number-release fee configured for the account; the response returns the
charged amount in `release_fee`. By default, the number enters
`pending_release` for a 24-hour cooldown. Cancelling during that window
refunds the release fee. Set `immediate=true` to skip the cooldown; an
immediate release cannot be cancelled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->unrentNumber(
    'MA_XXXXXX',
    '%2B919876543210',
    new UnrentNumberRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The URL-encoded phone number in E.164 format. Encode `+` as `%2B`.
    
</dd>
</dl>

<dl>
<dd>

**$immediate:** `?bool` — Skip the 24-hour cooldown and release the number immediately.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;cancelNumberRelease($accountId, $e164) -> ?CancelNumberReleaseResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel a pending number release during the 24-hour cooldown. The number is
restored to `active`, the cooldown timer is cleared, and the release fee is
refunded in full to the account balance. Any trunk or voice application
detached by the release is not re-attached automatically.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->cancelNumberRelease(
    'MA_XXXXXX',
    '%2B919876543210',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$accountId:** `string` — Your account Auth ID.
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The URL-encoded phone number in E.164 format. Encode `+` as `%2B`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;listInventoryNumbers($authId, $request) -> ?ListInventoryNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Browse available phone numbers in inventory that are not assigned to
any account. Only numbers with `status='active'` and `auth_id=NULL`
are returned. These numbers are ready to be purchased.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->listInventoryNumbers(
    'MA_XXXXXX',
    new ListInventoryNumbersRequest([
        'country' => 'IN',
        'exclude' => '9180,9192',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$country:** `?string` — Filter by country code (e.g., "US", "IN").
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Substring match against the E.164 number (e.g., "80" matches "+918065...").
    
</dd>
</dl>

<dl>
<dd>

**$exclude:** `?string` — One or more E.164 prefixes to remove from results. Include the country code (e.g. "9180" for India +91 80-series, "1415" for US +1 415); a leading "+" is optional. Matched against the full E.164 form, so it works for any country. Accepts a comma-separated list ("9180,9192") or repeated params ("exclude=9180&exclude=9192"), and the two forms can be combined. It is ANDed with all other filters, so it takes priority over `search`; duplicates are de-duplicated silently and `total` reflects the filtered result set.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;purchaseFromInventory($authId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Purchase a phone number from inventory and assign it to your account.
Debits your account balance for the setup fee and monthly fee. For
sub-accounts (SA_), the parent master account (MA_) is charged.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->purchaseFromInventory(
    'MA_XXXXXX',
    new PurchaseFromInventoryRequest([
        'e164' => '+919876543210',
        'currency' => 'USD',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — Phone number to purchase in E.164 format.
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Currency for transaction. Defaults to the number's currency or "USD".
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;assignNumberToTrunk($authId, $phoneNumber, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Assign a phone number to a specific SIP trunk. Once assigned, all
inbound calls to that phone number will be routed through the
designated trunk. The phone number must be URL-encoded; use `%2B`
instead of `+` (e.g., `%2B912271264217`).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->assignNumberToTrunk(
    'MA_XXXXXX',
    '%2B912271264217',
    new AssignNumberToTrunkRequest([
        'trunkGroupId' => 'e3e55a78-1234-5678-90ab-cdef12345678',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumber:** `string` — The phone number to assign, URL-encoded (use %2B instead of +).
    
</dd>
</dl>

<dl>
<dd>

**$trunkGroupId:** `string` — The UUID of the trunk to assign this number to.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;unassignNumberFromTrunk($authId, $phoneNumber)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove the assignment between a phone number and a SIP trunk. After
unassignment, the number remains in your account inventory but will
no longer route inbound calls through the previously assigned trunk.
URL-encode the phone number (use `%2B` instead of `+`).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->unassignNumberFromTrunk(
    'MA_XXXXXX',
    '%2B912271264217',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumber:** `string` — The phone number to unassign, URL-encoded (use %2B instead of +).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;linkNumberToApplication($authId, $e164, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Link a phone number to a voice application. Once linked, inbound
calls to that number fetch VobizXML from the application's
`answer_url`. A number routes through either an application or a
SIP trunk, not both: unassign the number from its trunk first
(`DELETE /api/v1/Account/{auth_id}/numbers/{phone_number}/assign`).
URL-encode the phone number (use `%2B` instead of `+`).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->linkNumberToApplication(
    'MA_XXXXXX',
    '%2B912271264217',
    new LinkNumberToApplicationRequest([
        'applicationId' => '12345678901234567',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The phone number, URL-encoded (use %2B instead of +).
    
</dd>
</dl>

<dl>
<dd>

**$applicationId:** `string` — The `app_id` of the application to link this number to.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;unlinkNumberFromApplication($authId, $e164)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove the link between a phone number and its voice application.
The number stays in your account inventory but inbound calls no
longer fetch VobizXML from that application.
URL-encode the phone number (use `%2B` instead of `+`).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->unlinkNumberFromApplication(
    'MA_XXXXXX',
    '%2B912271264217',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The phone number, URL-encoded (use %2B instead of +).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;getNumberHealth($authId, $e164, $request) -> ?GetNumberHealthResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the health & analytics dashboard for one of your numbers: current
status, spam flag, and call metrics over the selected window (total and
answered calls, answer rate, minutes, average duration) plus a per-period
time series of snapshots.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->getNumberHealth(
    'MA_XXXXXX',
    '%2B919876543210',
    new GetNumberHealthRequest([
        'days' => 30,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The number in E.164, URL-encoded (use %2B instead of +).
    
</dd>
</dl>

<dl>
<dd>

**$granularity:** `?string` — Snapshot granularity.
    
</dd>
</dl>

<dl>
<dd>

**$days:** `?int` — Size of the window (in days) for the summary and snapshots.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;assignDidToSubaccount($authId, $e164, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Assign a parent-pool DID to a sub-account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->assignDidToSubaccount(
    'MA_XXXXXX',
    '%2B919876543210',
    new AssignDidToSubaccountRequest([
        'subAccountId' => 'SA_XXXXXX',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The number in E.164, URL-encoded (use %2B instead of +).
    
</dd>
</dl>

<dl>
<dd>

**$subAccountId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;unassignDidFromSubaccount($authId, $e164, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Move the DID back to the parent pool.

A **15-day cool-off** is enforced: if the DID had a call within the last
15 days, the request is rejected with `409` and a
`did_cool_off_in_effect` error that includes `cool_off_until` and
`cool_off_remaining_seconds`. Never-used DIDs (`last_call_at` is `NULL`)
move back immediately.

Admins can bypass the cool-off with `?force=true` (see below); the
bypass writes a `did_assignment_audit` row and requires an
admin-role account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->unassignDidFromSubaccount(
    'MA_XXXXXX',
    '%2B919876543210',
    new UnassignDidFromSubaccountRequest([
        'force' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$e164:** `string` — The number in E.164, URL-encoded (use %2B instead of +).
    
</dd>
</dl>

<dl>
<dd>

**$force:** `?bool` 

Admin-only cool-off bypass. Requires an admin-role account
(enforced at the gateway) and writes a `did_assignment_audit` row.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Trunks
<details><summary><code>$client-&gt;trunks-&gt;listTrunks($authId) -> ?ListTrunksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all SIP trunks configured on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trunks->listTrunks(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;trunks-&gt;createTrunk($authId, $request) -> ?CreateTrunkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new SIP trunk for inbound or outbound calling.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trunks->createTrunk(
    'MA_XXXXXX',
    new CreateTrunkRequest([
        'name' => 'Retell AI SIP',
        'trunkDirection' => CreateTrunkRequestTrunkDirection::Outbound->value,
        'transport' => CreateTrunkRequestTransport::Udp->value,
        'concurrentCallsLimit' => 50,
        'cpsLimit' => 15,
        'credentialUuid' => 'b1e2...',
        'ipaclUuid' => 'c3d4...',
        'recording' => true,
        'enableTranscription' => true,
        'webhookUrl' => 'https://example.com/vobiz/webhook',
        'webhookMethod' => CreateTrunkRequestWebhookMethod::Post->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Trunk name.
    
</dd>
</dl>

<dl>
<dd>

**$trunkDirection:** `?string` — Direction of the trunk - **`inbound` or `outbound` only** (a trunk is one direction, not both).
    
</dd>
</dl>

<dl>
<dd>

**$trunkStatus:** `?string` — Trunk status to set - `enabled` or `disabled`. Responses report `enabled` as `active` and `disabled` as `suspended`.
    
</dd>
</dl>

<dl>
<dd>

**$secure:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$trunkDomain:** `?string` — SIP domain. Auto-generated as `{first8ofUUID}.sip.vobiz.ai` if omitted.
    
</dd>
</dl>

<dl>
<dd>

**$transport:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$inboundDestination:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$concurrentCallsLimit:** `?int` — Stored on the trunk. The **enforced** concurrency limit is account-level (account base + channel subscriptions), not this field.
    
</dd>
</dl>

<dl>
<dd>

**$cpsLimit:** `?int` — Stored on the trunk. The **enforced** CPS is account-level, not this field.
    
</dd>
</dl>

<dl>
<dd>

**$credentialUuid:** `?string` — Attach an existing SIP credential (username / password / realm) by UUID.
    
</dd>
</dl>

<dl>
<dd>

**$ipaclUuid:** `?string` — Attach an existing IP access-control list (IP-based auth) by UUID.
    
</dd>
</dl>

<dl>
<dd>

**$primaryUriUuid:** `?string` — Primary origination URI UUID.
    
</dd>
</dl>

<dl>
<dd>

**$fallbackUriUuid:** `?string` — Fallback origination URI UUID.
    
</dd>
</dl>

<dl>
<dd>

**$recording:** `?bool` — Enable call recording.
    
</dd>
</dl>

<dl>
<dd>

**$enableTranscription:** `?bool` — Auto-transcribe recordings when `recording=true`.
    
</dd>
</dl>

<dl>
<dd>

**$piiRedaction:** `?bool` — Redact PII from transcriptions.
    
</dd>
</dl>

<dl>
<dd>

**$piiEntityTypes:** `?string` — Comma-separated list of entity types to redact.
    
</dd>
</dl>

<dl>
<dd>

**$webhookUrl:** `?string` 

Customer webhook for call-admission events (`CallInitiated` / `Hangup`).
Must be a valid **public** http/https URL. SSRF-validated - localhost,
private (RFC1918), and cloud-metadata (`169.254.169.254`) URLs are
rejected with `invalid webhook_url`. See [Trunk Webhooks](/trunks/webhook).
    
</dd>
</dl>

<dl>
<dd>

**$webhookMethod:** `?string` — HTTP method for the webhook callback.
    
</dd>
</dl>

<dl>
<dd>

**$recordingWebhookEnabled:** `?bool` — Fire a `recording.completed` webhook to `webhook_url` after a recording is saved.
    
</dd>
</dl>

<dl>
<dd>

**$username:** `?string` — Deprecated - use `credential_uuid`.
    
</dd>
</dl>

<dl>
<dd>

**$password:** `?string` — Deprecated - use `credential_uuid`.
    
</dd>
</dl>

<dl>
<dd>

**$ipWhitelist:** `?array` — Deprecated - use `ipacl_uuid`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;trunks-&gt;retrieveTrunk($authId, $trunkId) -> ?RetrieveTrunkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details of a specific SIP trunk.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trunks->retrieveTrunk(
    'MA_XXXXXX',
    'trunk_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$trunkId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;trunks-&gt;updateTrunk($authId, $trunkId, $request) -> ?UpdateTrunkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a SIP trunk's name, configuration, or status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trunks->updateTrunk(
    'MA_XXXXXX',
    'trunk_id',
    new UpdateTrunkRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$trunkId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$trunkDirection:** `?string` — Direction of the trunk - `inbound` or `outbound` only.
    
</dd>
</dl>

<dl>
<dd>

**$trunkStatus:** `?string` — Trunk status to set - `enabled` or `disabled`. Responses report `enabled` as `active` and `disabled` as `suspended`.
    
</dd>
</dl>

<dl>
<dd>

**$secure:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$trunkDomain:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$transport:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$inboundDestination:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$concurrentCallsLimit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$cpsLimit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$credentialUuid:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$ipaclUuid:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$primaryUriUuid:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$fallbackUriUuid:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$recording:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$enableTranscription:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$piiRedaction:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$piiEntityTypes:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$webhookUrl:** `?string` — Customer webhook for call-admission events (`CallInitiated` / `Hangup`). Public http/https URL; SSRF-validated. See [Trunk Webhooks](/trunks/webhook).
    
</dd>
</dl>

<dl>
<dd>

**$webhookMethod:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$recordingWebhookEnabled:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;trunks-&gt;deleteTrunk($authId, $trunkId) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently delete a SIP trunk.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trunks->deleteTrunk(
    'MA_XXXXXX',
    'trunk_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$trunkId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Conference
<details><summary><code>$client-&gt;conference-&gt;kickMember($authId, $conferenceName, $memberId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove one or more participants from a conference while allowing their XML flow to continue.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conference->kickMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conference-&gt;hangupMember($authId, $conferenceName, $memberId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Terminate one or more active conference member calls. A normal active-member request disconnects the member. If a member was kicked, continued its XML flow, and rejoined with the same numeric member ID, confirm removal through conference exit or call hangup callbacks.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conference->hangupMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conference-&gt;playAudioMember($authId, $conferenceName, $memberId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Play an audio file to a specific conference member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conference->playAudioMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
    new PlayAudioMemberRequest([
        'url' => 'https://example.com/audio.mp3',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — URL of the audio file to play
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conference-&gt;stopAudioMember($authId, $conferenceName, $memberId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stop audio playback for a specific conference member.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conference->stopAudioMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conference-&gt;deafMember($authId, $conferenceName, $memberId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Prevent a conference member from hearing other participants.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conference->deafMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conference-&gt;undeafMember($authId, $conferenceName, $memberId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Restore a conference member's ability to hear other participants.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conference->undeafMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## RecordCalls
<details><summary><code>$client-&gt;recordCalls-&gt;startRecording($authId, $callUuid, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Begin recording an active call. Set format, enable transcription, and configure a callback URL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->recordCalls->startRecording(
    'MA_XXXXXX',
    'cdr_XXXXXXXXXX',
    new StartRecordingRequest([
        'timeLimit' => 120,
        'fileFormat' => StartRecordingRequestFileFormat::Mp3->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$timeLimit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$fileFormat:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$transcriptionType:** `?string` — Set to `auto` to enable transcription
    
</dd>
</dl>

<dl>
<dd>

**$callbackUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$recordChannelType:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;recordCalls-&gt;stopRecording($authId, $callUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stop an active recording on an in-progress call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->recordCalls->stopRecording(
    'MA_XXXXXX',
    'call_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## PlayAudio
<details><summary><code>$client-&gt;playAudio-&gt;call($authId, $callUuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Play an audio file to a live call leg.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->playAudio->call(
    'MA_XXXXXX',
    'call_uuid',
    new PlayAudioCallRequest([
        'urls' => 'https://example.com/audio.mp3',
        'legs' => PlayAudioCallRequestLegs::Aleg->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$urls:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$legs:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loop:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;playAudio-&gt;stopAudioCall($authId, $callUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stop audio playing on a live call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->playAudio->stopAudioCall(
    'MA_XXXXXX',
    'call_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SpeakText
<details><summary><code>$client-&gt;speakText-&gt;call($authId, $callUuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Convert text to speech and play it on a live call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->speakText->call(
    'MA_XXXXXX',
    'call_uuid',
    new SpeakTextCallRequest([
        'text' => 'Hello, your appointment is confirmed for tomorrow at 3 PM.',
        'voice' => 'WOMAN',
        'language' => 'en-US',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$text:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$voice:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$language:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$legs:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;speakText-&gt;stopSpeakCall($authId, $callUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stop ongoing TTS playback on a live call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->speakText->stopSpeakCall(
    'MA_XXXXXX',
    'call_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Dtmf
<details><summary><code>$client-&gt;dtmf-&gt;sendDtmf($authId, $callUuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send DTMF (keypad) tones on an active call. Use `w` for 0.5s pause, `W` for 1s pause.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dtmf->sendDtmf(
    'MA_XXXXXX',
    'call_uuid',
    new SendDtmfRequest([
        'digits' => '1234',
        'leg' => SendDtmfRequestLeg::Aleg->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$digits:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$leg:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## AudioStreams
<details><summary><code>$client-&gt;audioStreams-&gt;listStreams($authId, $callUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all audio streams on a live call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audioStreams->listStreams(
    'MA_XXXXXX',
    'call_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audioStreams-&gt;startStream($authId, $callUuid, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Start streaming raw audio from a live call to a WebSocket URL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audioStreams->startStream(
    'MA_XXXXXX',
    'call_uuid',
    new StartStreamRequest([
        'serviceUrl' => 'wss://your-server.com/ws',
        'bidirectional' => true,
        'audioTrack' => StartStreamRequestAudioTrack::Both->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$serviceUrl:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$bidirectional:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$audioTrack:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$audioFormat:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audioStreams-&gt;getStream($authId, $callUuid, $streamId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details of a specific audio stream.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audioStreams->getStream(
    'MA_XXXXXX',
    'call_uuid',
    'stream_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$streamId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audioStreams-&gt;stopStream($authId, $callUuid, $streamId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stop a specific audio stream on a live call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audioStreams->stopStream(
    'MA_XXXXXX',
    'call_uuid',
    'stream_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$streamId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Conferences
<details><summary><code>$client-&gt;conferences-&gt;listConferences($authId) -> ?ListConferencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve conference room names reported by the API. An empty array is inconclusive and can occur while conferences are active. Maintain your own room registry for authoritative discovery, billing, cleanup, and destructive workflows.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferences->listConferences(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conferences-&gt;deleteAllConferences($authId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Terminate all active conference rooms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferences->deleteAllConferences(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conferences-&gt;getConference($authId, $conferenceName) -> GetConferenceResponseConferenceMemberCount|GetConferenceResponseError|null</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific conference room. A live conference can currently return a 200 response with an error payload instead of conference details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferences->getConference(
    'MA_XXXXXX',
    'My Conf Room',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conferences-&gt;deleteConference($authId, $conferenceName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Terminate a specific conference room and disconnect all members.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferences->deleteConference(
    'MA_XXXXXX',
    'conference_name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ConferenceMembers
<details><summary><code>$client-&gt;conferenceMembers-&gt;muteMember($authId, $conferenceName, $memberId) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Prevent a member from speaking. Use `all` as member_id to mute everyone.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferenceMembers->muteMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` — Member ID, comma-separated IDs, or `all`
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conferenceMembers-&gt;unmuteMember($authId, $conferenceName, $memberId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Allow a muted member to speak again.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferenceMembers->unmuteMember(
    'MA_XXXXXX',
    'conference_name',
    'member_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$memberId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ConferenceRecording
<details><summary><code>$client-&gt;conferenceRecording-&gt;startConferenceRecording($authId, $conferenceName, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queue recording for all audio in a conference room. The response does not include a recording ID or download URL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferenceRecording->startConferenceRecording(
    'MA_XXXXXX',
    'conference_name',
    new StartConferenceRecordingRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fileFormat:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$callbackUrl:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conferenceRecording-&gt;stopConferenceRecording($authId, $conferenceName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stop recording a conference room.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conferenceRecording->stopConferenceRecording(
    'MA_XXXXXX',
    'conference_name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Recordings
<details><summary><code>$client-&gt;recordings-&gt;listRecordings($authId, $request) -> ?ListRecordingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all call recordings on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->recordings->listRecordings(
    'MA_XXXXXX',
    new ListRecordingsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;recordings-&gt;getRecording($authId, $recordingId) -> ?GetRecordingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details and download URL for a specific recording.

`recording_url` points at `media.vobiz.ai`. Download it with the same
`X-Auth-ID` and `X-Auth-Token` headers you use for the API; the media
host returns `401` without them. The file is WAV, although the media
host may label it `Content-Type: audio/mpeg`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->recordings->getRecording(
    'MA_XXXXXX',
    'rec_XXXXXXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$recordingId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;recordings-&gt;deleteRecording($authId, $recordingId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently delete a recording from the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->recordings->deleteRecording(
    'MA_XXXXXX',
    'recording_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$recordingId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Bulk Operations
<details><summary><code>$client-&gt;bulkOperations-&gt;bulkExportRecordings($authId, $request) -> ?BulkExportRecordingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queue a bulk export of the recordings matching your filter criteria. The request is
validated and accepted for background processing, and the resulting archive is emailed
as a download link to every address in `recipient.customer_account`. The archive is
typically available within 15-60 minutes depending on volume.

Results are delivered by email only; the export runs to completion in the background
after the `202` response.

One export runs at a time per account. While an export is in progress, further requests
return `403`.

Filter rules:
- Use either `from`/`to` or the `recording_storage_duration*` filters, not both.
- Use one of `__gt` or `__gte`, and one of `__lt` or `__lte`.
- When using range filters (`__gte`/`__lte`), provide both.
- Maximum date range is 1 year (366 days); maximum storage duration range is 30 days.
- The additional filters (`from_number`, `to_number`, `call_uuid`, `conference_name`,
  `recording_format`, `recording_id`) apply when the range is 30 days or less.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->bulkOperations->bulkExportRecordings(
    'MA_XXXXXX',
    new BulkExportRecordingsRequest([
        'recipient' => new BulkExportRecordingsRequestRecipient([
            'customerAccount' => [
                'admin@example.com',
            ],
        ]),
        'from' => '2025-01-23 00:00:00',
        'to' => '2025-01-30 23:59:59',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$recipient:** `BulkExportRecordingsRequestRecipient` — Email delivery targets for the export archive.
    
</dd>
</dl>

<dl>
<dd>

**$from:** `?string` — Start date for the export. Format: YYYY-MM-DD HH:MM:SS. Defaults to 7 days ago.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `?string` — End date for the export. Format: YYYY-MM-DD HH:MM:SS. Defaults to the current time.
    
</dd>
</dl>

<dl>
<dd>

**$recordingStorageDuration:** `?string` — Export recordings exactly N days old. `"7"` exports recordings from exactly 7 days ago.
    
</dd>
</dl>

<dl>
<dd>

**$recordingStorageDurationGte:** `?string` — Export recordings N days old or older. `"7"` exports recordings 7 days old and older.
    
</dd>
</dl>

<dl>
<dd>

**$recordingStorageDurationGt:** `?string` — Export recordings older than N days. `"7"` exports recordings 8 days old and older.
    
</dd>
</dl>

<dl>
<dd>

**$recordingStorageDurationLte:** `?string` — Export recordings N days old or newer. `"30"` exports recordings 0-30 days old.
    
</dd>
</dl>

<dl>
<dd>

**$recordingStorageDurationLt:** `?string` — Export recordings newer than N days. `"30"` exports recordings 0-29 days old.
    
</dd>
</dl>

<dl>
<dd>

**$fromNumber:** `?string` — Filter by caller phone number. Applies when the range is 30 days or less.
    
</dd>
</dl>

<dl>
<dd>

**$toNumber:** `?string` — Filter by destination phone number. Applies when the range is 30 days or less.
    
</dd>
</dl>

<dl>
<dd>

**$callUuid:** `?string` — Filter by call UUID. Also use this field for a conference_uuid or mpc_uuid. Applies when the range is 30 days or less.
    
</dd>
</dl>

<dl>
<dd>

**$conferenceName:** `?string` — Filter by conference name. Also use this field for an mpc_name. Applies when the range is 30 days or less.
    
</dd>
</dl>

<dl>
<dd>

**$recordingFormat:** `?string` — Filter by recording format. Applies when the range is 30 days or less.
    
</dd>
</dl>

<dl>
<dd>

**$recordingId:** `?string` — Filter by a specific recording ID. Applies when the range is 30 days or less.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Credentials
<details><summary><code>$client-&gt;credentials-&gt;createCredential($authId, $request) -> ?CreateCredentialResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create SIP credentials for trunk authentication.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->credentials->createCredential(
    'MA_XXXXXX',
    new CreateCredentialRequest([
        'username' => 'myuser',
        'password' => 'securepassword123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$username:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$password:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;credentials-&gt;listCredentials($authId) -> ?ListCredentialsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all SIP credentials on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->credentials->listCredentials(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;credentials-&gt;updateCredential($authId, $credentialId, $request) -> ?UpdateCredentialResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the password for an existing SIP credential.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->credentials->updateCredential(
    'MA_XXXXXX',
    'credential_id',
    new UpdateCredentialRequest([
        'password' => 'password',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$credentialId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$password:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;credentials-&gt;deleteCredential($authId, $credentialId) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete an existing SIP credential.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->credentials->deleteCredential(
    'MA_XXXXXX',
    'credential_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$credentialId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## IpAccessControlList
<details><summary><code>$client-&gt;ipAccessControlList-&gt;createIpAcl($authId, $request) -> ?CreateIpAclResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add an IP access control rule to restrict SIP trunk access.

Use the public IP address or CIDR range of your own SBC or PBX. The API
rejects documentation-only ranges such as `203.0.113.0/24` with `400`.
Responses return the rule's label in `description`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAccessControlList->createIpAcl(
    'MA_XXXXXX',
    new CreateIpAclRequest([
        'name' => 'Office IP',
        'ipAddress' => 'YOUR_PUBLIC_IP/32',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAccessControlList-&gt;listIpAcls($authId) -> ?ListIpAclsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all IP access control rules on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAccessControlList->listIpAcls(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAccessControlList-&gt;updateIpAcl($authId, $ipAclId, $request) -> ?UpdateIpAclResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing IP access control rule.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAccessControlList->updateIpAcl(
    'MA_XXXXXX',
    'ip_acl_id',
    new UpdateIpAclRequest([
        'name' => 'name',
        'ipAddress' => 'ip_address',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$ipAclId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAccessControlList-&gt;deleteIpAcl($authId, $ipAclId) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove an IP access control rule.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAccessControlList->deleteIpAcl(
    'MA_XXXXXX',
    'ip_acl_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$ipAclId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## OriginationUri
<details><summary><code>$client-&gt;originationUri-&gt;createOriginationUri($authId, $request) -> ?CreateOriginationUriResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add an inbound SIP endpoint (origination URI) to a trunk.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->originationUri->createOriginationUri(
    'MA_XXXXXX',
    new CreateOriginationUriRequest([
        'uri' => 'sip:sbc.example.com',
        'description' => 'Primary SBC',
        'priority' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$uri:** `string` — SIP URI of your inbound destination, for example `sip:sbc.example.com`.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Label for the origination URI.
    
</dd>
</dl>

<dl>
<dd>

**$priority:** `int` — Routing priority. Lower values are tried first.
    
</dd>
</dl>

<dl>
<dd>

**$sipUri:** `?string` — Not read by the API. The API accepts the request but stores an empty `uri`. Send `uri` instead.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Not read by the API. Send `description` instead.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;originationUri-&gt;listOriginationUris($authId) -> ?ListOriginationUrisResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all origination URIs on the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->originationUri->listOriginationUris(
    'MA_XXXXXX',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;originationUri-&gt;updateOriginationUri($authId, $uriId, $request) -> ?UpdateOriginationUriResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing origination URI.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->originationUri->updateOriginationUri(
    'MA_XXXXXX',
    'uri_id',
    new UpdateOriginationUriRequest([
        'uri' => 'sip:sbc.example.com',
        'description' => 'Primary SBC',
        'priority' => 2,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$uriId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$uri:** `?string` — SIP URI of your inbound destination.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Label for the origination URI.
    
</dd>
</dl>

<dl>
<dd>

**$priority:** `?int` — Routing priority. Lower values are tried first.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Not read by the API. Send `description` instead.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;originationUri-&gt;deleteOriginationUri($authId, $uriId) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete an origination URI from a trunk.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->originationUri->deleteOriginationUri(
    'MA_XXXXXX',
    'uri_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$uriId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Applications
<details><summary><code>$client-&gt;applications-&gt;listApplications($authId, $request) -> ?ListApplicationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details of all applications created under your Vobiz account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->applications->listApplications(
    'MA_XXXXXX',
    new ListApplicationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;applications-&gt;createApplication($authId, $request) -> ?CreateApplicationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an Application with webhook URLs for call handling.
Creating an application is usually a first step, after which you
attach the application to either a number or an endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->applications->createApplication(
    'MA_XXXXXX',
    new CreateApplicationRequest([
        'appName' => 'My Voice Application',
        'answerUrl' => 'https://example.com/answer',
        'answerMethod' => 'POST',
        'hangupUrl' => 'https://example.com/hangup',
        'hangupMethod' => 'POST',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$appName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$answerUrl:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$answerMethod:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$hangupUrl:** `?string` — URL Vobiz notifies when a call on this application ends. If omitted, it defaults to `answer_url`.
    
</dd>
</dl>

<dl>
<dd>

**$hangupMethod:** `?string` — HTTP method used for `hangup_url`, `GET` or `POST`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;applications-&gt;retrieveApplication($authId, $appId) -> ?RetrieveApplicationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get details of a particular application by passing the app_id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->applications->retrieveApplication(
    'MA_XXXXXX',
    '12345678',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `string` — Unique identifier for the application
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;applications-&gt;updateApplication($authId, $appId, $request) -> ?UpdateApplicationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify an application using this API. You can update any subset of
fields (partial update). Fields not provided will remain unchanged.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->applications->updateApplication(
    'MA_XXXXXX',
    '12345678',
    new UpdateApplicationRequest([
        'appName' => 'Updated Application Name',
        'defaultNumberApp' => true,
        'answerUrl' => 'https://example.com/answer',
        'answerMethod' => 'POST',
        'hangupUrl' => 'https://example.com/hangup',
        'hangupMethod' => 'POST',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$appName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$defaultNumberApp:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$answerUrl:** `?string` — URL Vobiz fetches VobizXML from when a call reaches a number or endpoint linked to this application.
    
</dd>
</dl>

<dl>
<dd>

**$answerMethod:** `?string` — HTTP method used for `answer_url`, `GET` or `POST`.
    
</dd>
</dl>

<dl>
<dd>

**$hangupUrl:** `?string` — URL Vobiz notifies when a call on this application ends.
    
</dd>
</dl>

<dl>
<dd>

**$hangupMethod:** `?string` — HTTP method used for `hangup_url`, `GET` or `POST`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;applications-&gt;deleteApplication($authId, $appId) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently delete an Application. If the application is associated
with phone numbers, the deletion may be blocked unless those
associations are removed first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->applications->deleteApplication(
    'MA_XXXXXX',
    '12345678',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Endpoints
<details><summary><code>$client-&gt;endpoints-&gt;listEndpoints($authId, $request) -> ?ListEndpointsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of all SIP endpoints in your account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->endpoints->listEndpoints(
    'MA_XXXXXX',
    new ListEndpointsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$usernameContains:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$usernameExact:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$usernameStartswith:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$aliasContains:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$aliasExact:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$applicationIdExact:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$applicationIdIsnull:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$subAccount:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;endpoints-&gt;createEndpoint($authId, $request) -> ?CreateEndpointResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new SIP endpoint that can be used to make and receive calls
through IP phones, softphones, or SIP clients. Each endpoint is
assigned a unique SIP URI and endpoint ID.

The API appends digits to the `username` you request (for example,
`acme01` can become `acme0125672327435497`). Configure your SIP client
with the `username` returned in the response.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->endpoints->createEndpoint(
    'MA_XXXXXX',
    new CreateEndpointRequest([
        'username' => 'john_doe',
        'password' => 'SecurePassword123!',
        'alias' => "John's Desktop Phone",
        'appId' => '12345678901234567',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$username:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$password:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$alias:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `?string` — ID of the application that handles calls from this endpoint. Application IDs are 17-digit strings; send them as JSON strings.
    
</dd>
</dl>

<dl>
<dd>

**$application:** `?int` — Not read by the API. Application IDs exceed the range of a JSON integer, and the endpoint is created without an application. Send `app_id` instead.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;endpoints-&gt;retrieveEndpoint($authId, $endpointId) -> ?RetrieveEndpointResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the details of an existing endpoint. The response includes
all endpoint attributes and, if the endpoint is currently registered
on a SIP client, additional registration details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->endpoints->retrieveEndpoint(
    'MA_XXXXXX',
    '87654321',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$endpointId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;endpoints-&gt;updateEndpoint($authId, $endpointId, $request) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing endpoint's configuration. You can change the
password, alias, or attached application. The fields `username`,
`endpoint_id`, `domain`, `allow_same_domain`, `allow_other_domains`,
`allow_phones`, and `allow_apps` are locked after creation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->endpoints->updateEndpoint(
    'MA_XXXXXX',
    '87654321',
    new UpdateEndpointRequest([
        'alias' => "John's Updated Desktop Phone",
        'password' => 'NewSecurePassword456!',
        'appId' => '12345678901234567',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$endpointId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$alias:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$password:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `?string` — ID of the application to attach to this endpoint, as a string.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;endpoints-&gt;deleteEndpoint($authId, $endpointId) -> ?string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently delete an endpoint from your Vobiz account. Once deleted,
the SIP URI will no longer be accessible, and any devices registered
with this endpoint will be disconnected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->endpoints->deleteEndpoint(
    'MA_XXXXXX',
    '87654321',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$authId:** `string` — Your account Auth ID
    
</dd>
</dl>

<dl>
<dd>

**$endpointId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Partner API
<details><summary><code>$client-&gt;partnerApi-&gt;getPartnerProfile() -> ?GetPartnerProfileResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the authenticated partner's profile and balance.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->getPartnerProfile();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;getPartnerDashboard() -> ?GetPartnerDashboardResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Aggregated partner metrics - total customers, active accounts, balance
held across the partner ecosystem, MTD revenue, etc.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->getPartnerDashboard();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;listCustomerAccounts($request) -> ?ListCustomerAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all customer sub-accounts under your partner account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->listCustomerAccounts(
    new ListCustomerAccountsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Substring match on name or email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;createCustomerAccount($request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new customer sub-account under your partner account. Vobiz
emails the customer their login credentials and (separately) a KYC link
via the kyc-sessions endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->createCustomerAccount(
    new CreateCustomerAccountRequest([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+919876543210',
        'password' => 'SecurePass123!',
        'country' => 'IN',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Customer's full name.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` — Customer's email. KYC link is sent here.
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `string` — E.164 format.
    
</dd>
</dl>

<dl>
<dd>

**$password:** `string` — Min 8 chars, must include a number and a special character.
    
</dd>
</dl>

<dl>
<dd>

**$company:** `?string` — Legal company or business name.
    
</dd>
</dl>

<dl>
<dd>

**$country:** `string` — ISO 2-letter country code.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;partnerTransferBalance($customerAuthId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Atomically debits your partner master balance and credits the customer's
wallet. Both legs are recorded in each account's ledger. Transfers are
**permanent and cannot be reversed.**
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->partnerTransferBalance(
    'MA_XXXXXXXX',
    new PartnerTransferBalanceRequest([
        'amount' => 500,
        'currency' => 'INR',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerAuthId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float` — Positive decimal. Your master balance must be ≥ this amount.
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `string` — Must match your partner account currency.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Note for your records. Appears in both ledgers.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;listCustomerTransactions($customerAuthId, $request) -> ?ListCustomerTransactionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the customer's transaction ledger. Filter by date range or
transaction type. Useful for billing reconciliation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->listCustomerTransactions(
    'customer_auth_id',
    new ListCustomerTransactionsRequest([
        'fromDate' => new DateTime('2026-03-01'),
        'toDate' => new DateTime('2026-03-31'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerAuthId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fromDate:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$toDate:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$transactionType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;listCustomerCdrs($customerAuthId, $request) -> ?ListCustomerCdrsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Look up any customer's call history. Same filter set as the
customer-side CDR endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->listCustomerCdrs(
    'customer_auth_id',
    new ListCustomerCdrsRequest([
        'hangupCause' => 'NO_ANSWER',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerAuthId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$callDirection:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minDuration:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$hangupCause:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;listCustomerNumbers($customerAuthId, $request) -> ?ListCustomerNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Phone numbers currently assigned to a customer account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->listCustomerNumbers(
    'customer_auth_id',
    new ListCustomerNumbersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerAuthId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Substring match against the E.164 number.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;listKycSessions($request) -> ?ListKycSessionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the authenticated partner's KYC sessions. Filter the list by
session status or customer account, and use `page` and `size` to
paginate the results.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->listKycSessions(
    new ListKycSessionsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$accountAuthId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$size:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;createKycSession($request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Triggers Vobiz to email a KYC link to the customer. KYC is OTP-based
(PAN + Aadhaar via DigiLocker for individuals, PAN + GSTIN for
companies). No document uploads required.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->createKycSession(
    new CreateKycSessionRequest([
        'accountAuthId' => 'MA_XXXXXXXX',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$accountAuthId:** `string` — Customer's auth_id (from create-customer-account).
    
</dd>
</dl>

<dl>
<dd>

**$flowType:** `?string` 

Delivery mode. `email` (default) emails the customer the KYC link.
`redirect` returns a `widget_url` in the response for immediate redirect.
    
</dd>
</dl>

<dl>
<dd>

**$customerEmail:** `?string` — Required when `flow_type` is `email`. Ignored otherwise.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` 

Required when `flow_type` is `redirect`. After verification the customer's
browser is sent to this URL with query params `session_id`, `status`, `auth_id`.
    
</dd>
</dl>

<dl>
<dd>

**$webhookUrl:** `?string` — Vobiz POSTs the KYC result here.
    
</dd>
</dl>

<dl>
<dd>

**$expiresInDays:** `?int` — Days before the KYC link expires.
    
</dd>
</dl>

<dl>
<dd>

**$reminderSchedule:** `?array` — Auto reminder emails before expiry. Email flow only.
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Free-form key/value object echoed back on GET and webhooks.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;getKycSession($sessionId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the current status and available details for one KYC session
owned by the authenticated partner.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->getKycSession(
    'session_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sessionId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;revokeKycSession($sessionId, $request) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels an outstanding KYC session. Customer can no longer use the link.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->revokeKycSession(
    'session_id',
    new RevokeKycSessionRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sessionId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partnerApi-&gt;resendKycSession($sessionId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Re-dispatches the KYC link to the customer. Rate-limited to once per 30 minutes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partnerApi->resendKycSession(
    'session_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sessionId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Messages
<details><summary><code>$client-&gt;sms-&gt;messages-&gt;listMessages($request) -> ?MessageList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the messages on your account, sent and received, newest first. Combine the filters to find a message you did not keep the `id` for, such as the other recipients of a multi-recipient send (filter by `tag` or `to`). Every filter is an exact match, and filters you omit are not applied. Page through results with `limit` and `offset`, and use `total` to know when to stop.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->messages->listMessages(
    new ListMessagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Only messages with this status: `scheduled`, `sent`, `delivered`, `failed`, `received` (inbound) or `unknown`.
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Only messages sent or received on this channel: `sms`, `mms` or `rcs`. This is the channel actually used, so an SMS that was upgraded to MMS appears under `mms`.
    
</dd>
</dl>

<dl>
<dd>

**$direction:** `?string` — `out` for messages you sent, `in` for messages your numbers received.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `?string` — Recipient number to filter on, in E.164 format, exact match. For inbound messages this is your number.
    
</dd>
</dl>

<dl>
<dd>

**$from:** `?string` — Sender to filter on, exact match: one of your numbers in E.164 format (for example `+14155550100`), or the `senderName` of your RCS sender for RCS messages. For inbound messages this is the contact's number.
    
</dd>
</dl>

<dl>
<dd>

**$tag:** `?string` — Only messages whose `tag` equals this value, exact match. Set the same `tag` on related sends to retrieve them together.
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` — Only messages created at or after this time, as an RFC 3339 / ISO 8601 timestamp such as `2026-10-01T00:00:00Z`.
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — Only messages created before this time, as an RFC 3339 / ISO 8601 timestamp such as `2026-11-01T00:00:00Z`. Combine with `startDate` for a date range.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of messages to return, from `1` to `100`. Defaults to `20`; a value outside that range also returns `20`.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of records to skip before the page starts, `0` or greater. Defaults to `0`. Add the page size to it to fetch the next page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;messages-&gt;sendMessage($request) -> ?Message</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sends an SMS, MMS or RCS message from one of your numbers or RCS senders to one or more recipients. Each number in `to` becomes its own message, with its own `id`, status and conversation, and the response body is the first recipient's message. Every recipient is checked against your opt-out list first, and a send with a future `scheduledAt` is stored with status `scheduled`.

- `201` when every recipient was accepted, including an idempotent replay and a successful SMS fallback.
- `202` when at least one recipient was recorded and at least one errored. Find the other recipients with `GET /messages` filtered by `tag` or `to`.
- `422` when the recipient has opted out and nothing was recorded.
- `502` when the send was rejected before a message was recorded. Retry with the same `idempotencyKey`.

Track delivery with `GET /messages/{id}`, your webhooks (callbacks) or the WebSocket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->messages->sendMessage(
    new SendMessageRequest([
        'from' => '+14155550100',
        'to' => [
            '+14155550123',
        ],
        'channel' => SendMessageRequestChannel::Sms->value,
        'text' => 'Your verification code is 482913',
        'idempotencyKey' => 'otp-482913-user-77',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `string` — The sender. For `sms` and `mms`, one of your Vobiz numbers in E.164 format, for example `+14155550100`. For `rcs`, the `senderName` of your RCS sender (from `GET /senders`); with `failoverToSms`, the SMS copy is sent from a number on your account.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `array` — One or more recipient numbers in E.164 format. Each one becomes a separate message with its own `id`; blank entries and duplicates are ignored. At least one recipient is required.
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Channel to send on: `sms`, `mms` or `rcs`. Defaults to `sms`. An `sms` with `mediaUrls` to US or Canadian recipients is sent as MMS automatically.
    
</dd>
</dl>

<dl>
<dd>

**$text:** `?string` — Message body. Required for `sms` and `rcs`. A long SMS is split into segments and billed per segment (160 GSM-7 or 70 UCS-2 characters fit in one segment). For `mms`, provide `text`, `mediaUrls` or both, with `text` up to 5000 characters.
    
</dd>
</dl>

<dl>
<dd>

**$mediaUrls:** `?array` — Publicly reachable `https` URLs of media to attach. MMS accepts up to 10. RCS sends the first URL as a file. An SMS to recipients outside the US and Canada is sent as text only.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — Subject line of an MMS. Used only when the message is sent as MMS.
    
</dd>
</dl>

<dl>
<dd>

**$tag:** `?string` — Your own label, stored on every message the request creates. Filter `GET /messages` by it to find all recipients of one send or to group messages for reporting.
    
</dd>
</dl>

<dl>
<dd>

**$idempotencyKey:** `?string` — A unique string you choose, for example a UUID or your own order ID, scoped to your account. Retrying with the same key returns the original message instead of sending again. With several recipients the key is applied per recipient.
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `?DateTime` — Time to hold the message until, as an RFC 3339 / ISO 8601 timestamp such as `2026-11-01T09:00:00Z`. A future time stores the message with status `scheduled`; a past time or now sends immediately.
    
</dd>
</dl>

<dl>
<dd>

**$failoverToSms:** `?bool` — Used only when `channel` is `rcs`. When `true` and the RCS send cannot go through, Vobiz sends the same `text` as SMS and the message's `channel` becomes `sms`. Defaults to `false`.
    
</dd>
</dl>

<dl>
<dd>

**$rcsSuggestions:** `?array` — Suggestion buttons (suggested replies and actions) to show under an RCS message. Used only when `channel` is `rcs`. See the RCS suggestion object for each `type`.
    
</dd>
</dl>

<dl>
<dd>

**$dltEntityId:** `?string` — India (TRAI DLT): the Principal Entity ID you registered on a TRAI DLT portal. Pass it on every message to Indian numbers.
    
</dd>
</dl>

<dl>
<dd>

**$dltHeaderId:** `?string` — India (TRAI DLT): the ID of the sender header you registered on a TRAI DLT portal. Pass it on every message to Indian numbers.
    
</dd>
</dl>

<dl>
<dd>

**$dltTemplateId:** `?string` — India (TRAI DLT): the ID of the content template you registered on a TRAI DLT portal. `text` must match that template with its variables filled in.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;messages-&gt;previewMessageCost($request) -> ?CostPreview</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Prices a message before you send it, without sending anything. It splits `text` into segments for the chosen channel and returns the segment count, the price per segment and the total in your account currency. Use it to show a cost estimate in your app or to keep long messages within a budget. The figures are for one recipient; multiply `totalCost` by the number of recipients for a multi-recipient send.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->messages->previewMessageCost(
    new PreviewMessageCostRequest([
        'from' => '+14155550100',
        'to' => '+14155550123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `string` — Required. The sender you plan to use: one of your numbers in E.164 format, or the `senderName` of your RCS sender when `channel` is `rcs`. It determines the route the message is priced on.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` — Required. One recipient number in E.164 format, for example `+14155550123`. Its destination country determines the price.
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Channel to price: `sms`, `mms` or `rcs`. Defaults to `sms`.
    
</dd>
</dl>

<dl>
<dd>

**$text:** `?string` — The message body to segment and price, URL-encoded. Pass the exact text you plan to send: the segment count depends on its length and on whether it fits the GSM-7 character set. Defaults to an empty string.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;messages-&gt;checkRcsReachability($request) -> ?RcsReachability</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Checks whether a phone number can receive RCS messages from your RCS sender, without sending anything. Call it before an RCS send to choose between RCS and SMS for that contact. If `reachable` is `false`, send with `channel: "sms"` instead, or send RCS with `failoverToSms: true` so Vobiz falls back to SMS automatically.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->messages->checkRcsReachability(
    new CheckRcsReachabilityRequest([
        'from' => 'YOUR_RCS_SENDER_NAME',
        'to' => '+14155550123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `string` — Required. The `senderName` of your RCS sender, as returned by `GET /senders`.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` — Required. The recipient number to check, in E.164 format, for example `+14155550123`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;messages-&gt;getMessage($id) -> ?MessageWithHistory</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one message with its full status history. Use it to follow a message from `sent` to `delivered` or `failed`, and to read `errorCode` and `errorMessage` when it fails. The `statusHistory` array lists every status change, oldest first. For real-time updates, subscribe to webhooks (callbacks) or the WebSocket instead of polling.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->messages->getMessage(
    '9b2e1c40-8a3d-4f5e-9c1a-7d6b2e8f4a01',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The message `id` (UUID) returned by `POST /messages`, `GET /messages`, a conversation, or an event.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Numbers
<details><summary><code>$client-&gt;sms-&gt;numbers-&gt;listNumbers() -> ?SmsNumberList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns every number on your account that is routed for SMS or MMS, sorted by `countryCode` and then `e164`. Each number carries its US registration state, the last message it sent and a `sendable` summary of where it can send right now. Check `sendable.usDomestic` before you send to US recipients from a US number. To add numbers, search with `GET /numbers/available` and buy with `POST /numbers/purchase`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->numbers->listNumbers();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;numbers-&gt;listCountries() -> ?NumberCountries</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the countries where you can buy messaging numbers, with the number types and capabilities in stock in each. The list is a snapshot that refreshes in the background: while `ready` is `false`, `countries` is empty and you retry shortly. India is not listed, because traffic to Indian recipients is sent from DLT-registered sender IDs. Pass a returned `country` to `GET /numbers/available` to see individual numbers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->numbers->listCountries();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;numbers-&gt;searchAvailableNumbers($request) -> ?AvailableNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Searches the inventory for numbers you can buy in one country, with their setup and monthly prices in your wallet currency. Each search returns up to 10 numbers. Pass the chosen `e164`, the `country` and any non-empty `numberKey` to `POST /numbers/purchase`. For `country=IN` the list is empty and `hint` explains that Indian traffic uses DLT-registered sender IDs. A country outside the set Vobiz sells numbers in returns `422`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->numbers->searchAvailableNumbers(
    new SearchAvailableNumbersRequest([
        'country' => 'US',
        'capabilities' => 'SMS,MMS',
        'areaCode' => '415',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$country:** `string` — Country to search, as an ISO 3166-1 alpha-2 code such as `US`, `CA` or `GB`. Case-insensitive. A value that is not two letters returns `400` with `country must be an ISO 3166-1 alpha-2 code`.
    
</dd>
</dl>

<dl>
<dd>

**$capabilities:** `?string` — Comma-separated capabilities the number must have: `SMS`, `MMS`, or `SMS,MMS`. Case-insensitive, defaults to `SMS`. Any other value returns `400` with `capabilities must be SMS and/or MMS`.
    
</dd>
</dl>

<dl>
<dd>

**$areaCode:** `?string` — Three-digit area code to search in, for example `415`. Accepted only when `country` is `US` or `CA`; other countries return `400` with `areaCode is only supported for US and CA`.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results, from `1` to `100`. Defaults to `10`, and each search returns at most 10 numbers whatever you pass. A value outside the range returns `400` with `limit must be between 1 and 100`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;numbers-&gt;purchaseNumber($request) -> ?PurchaseNumberResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Buys a number returned by `GET /numbers/available` and routes it to your account for messaging. This call spends money: it debits the setup fee and the first month's rental from your wallet before the number is bought, and the rental renews monthly until you release the number. If the purchase cannot complete after the debit, your wallet is refunded and the error message says so. Run it only with your own credentials once you have confirmed the number and price. A `numbers.updated` WebSocket event is published when the number goes live; a US number then needs a 10DLC campaign or toll-free verification before it can send to US recipients.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->numbers->purchaseNumber(
    new PurchaseNumberRequest([
        'e164' => '+14155550100',
        'country' => 'US',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$e164:** `string` — The number to buy, in E.164 format, exactly as returned in `e164` by `GET /numbers/available`. Required.
    
</dd>
</dl>

<dl>
<dd>

**$country:** `string` — ISO 3166-1 alpha-2 code of the number's country, for example `US`. Required, and must match the number; a mismatch returns `400`.
    
</dd>
</dl>

<dl>
<dd>

**$numberKey:** `?string` — The `numberKey` from `GET /numbers/available`. Required when the search result has a non-empty `numberKey`, as for `CA` and `GB` numbers; omit it for US numbers, which are bought by `e164` alone.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;numbers-&gt;listPurchases() -> ?NumberPurchaseList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the numbers you have bought through Vobiz, newest first, each with its full list of wallet charges. Released numbers stay in the list with `status: released`, so this is the billing history of every number you have owned. Use `nextBillingAt` to see when each active number renews and `charges` to reconcile setup and rental debits.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->numbers->listPurchases();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;numbers-&gt;releaseNumber($e164) -> ?ReleaseNumberResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels a number you bought through Vobiz and removes it from your account. The number stops sending and receiving messages immediately, and monthly rental stops. The setup fee and the current month are not refunded, and a released number cannot be restored. The call has no request body and returns the purchase with `status: released`. Run it only with your own credentials once you are sure you no longer need the number.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->numbers->releaseNumber(
    '+14155550100',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$e164:** `string` — The number to release, in E.164 format, for example `+14155550100`. In raw HTTP requests, URL-encode the `+` as `%2B`; the SDKs encode it for you. A value that is not an E.164 number returns `400`, and a number that is not on your account returns `404`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Coverage
<details><summary><code>$client-&gt;sms-&gt;coverage-&gt;listCoverage($request) -> ?CoverageList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one summary row per destination country, sorted by country name: the sender types it accepts, whether sender registration is required, two-way support, opt-out rules and whether a sending window applies. Use it to plan where to send and which sender to use before you buy numbers or register. Filters combine, so `region` plus `twoWay=true` returns only two-way countries in that region. For the full record of one country, call `GET /coverage/{country}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->coverage->listCoverage(
    new ListCoverageRequest([
        'q' => 'united',
        'region' => 'Northern America',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$q:** `?string` — Search text, case-insensitive. Matches a substring of the country name (`united`), an exact ISO 3166-1 alpha-2 code (`GB`) or the start of the dial code (`44` or `+44`); spaces and a leading `+` are ignored.
    
</dd>
</dl>

<dl>
<dd>

**$region:** `?string` — Exact region name, case-insensitive, for example `Northern America`, `Western Europe` or `South-central Asia`. Partial names match nothing; read the `region` values from an unfiltered list to see the full set.
    
</dd>
</dl>

<dl>
<dd>

**$twoWay:** `?bool` — `true` returns only countries where recipients can reply; `false` returns the rest, including countries where two-way support is unknown. Also accepts `1`/`0` and `t`/`f`; any other value returns `400` with `twoWay must be true or false`.
    
</dd>
</dl>

<dl>
<dd>

**$registrationRequired:** `?bool` — `true` returns countries that require sender registration for local or international traffic; `false` returns countries that require neither. Accepts the same values as `twoWay`; anything else returns `400` with `registrationRequired must be true or false`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;coverage-&gt;getCoverage($country) -> ?CoverageDetail</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the full coverage record for one country: accepted sender types, registration requirements and lead time, link rules, prohibited topics, the permitted sending window and free-text market notes. Read it before your first send to a new country so your sender, content and send times match the local rules. An unknown code returns `404` with `country not found`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->coverage->getCoverage(
    'US',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$country:** `string` — ISO 3166-1 alpha-2 code of the destination country, for example `US`, `GB` or `IN`. Case-insensitive. Three-letter codes and dial codes return `404`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Conversations
<details><summary><code>$client-&gt;sms-&gt;conversations-&gt;listConversations($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns your conversations, most recently active first (ordered by `lastMessageAt`). A conversation is the thread between one of your numbers and one contact on one channel, and Vobiz creates it with the first message in either direction. The response is a bare JSON array, `[]` when you have none. Page with `limit` and `offset`; when a page returns fewer items than `limit`, you have reached the end.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->conversations->listConversations(
    new ListConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of conversations to return, from `1` to `100`. Defaults to `20`; a value outside that range also returns `20`.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of conversations to skip before the page starts, `0` or greater. Defaults to `0`. Add the page size to it to fetch the next page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;conversations-&gt;unreadCount() -> ?UnreadCount</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the total of `unreadCount` across all your conversations. Use it for an inbox badge, then call `GET /conversations` to see which threads are unread. The total drops when you mark a conversation read with `POST /conversations/{id}/read`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->conversations->unreadCount();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;conversations-&gt;getConversation($id) -> ?Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one conversation with its participants, channel and counters. Use it to refresh a thread's `unreadCount` or `lastMessageAt` after a new message arrives. To read the messages themselves, call `GET /conversations/{id}/messages`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->conversations->getConversation(
    'c7d1e9a3-2b4f-4a6c-8d5e-1f3a9b7c2e04',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The conversation `id` (UUID), from `GET /conversations` or the `conversationId` on any message.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;conversations-&gt;listConversationMessages($id, $request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the messages in one conversation, in both directions, newest first. Use it to render a chat thread: reverse the page to show it oldest to newest. The response is a bare JSON array of message objects without `statusHistory`; call `GET /messages/{id}` for one message's history. Page with `limit` and `offset`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->conversations->listConversationMessages(
    'c7d1e9a3-2b4f-4a6c-8d5e-1f3a9b7c2e04',
    new ListConversationMessagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The conversation `id` (UUID), from `GET /conversations` or the `conversationId` on any message.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of messages to return, from `1` to `100`. Defaults to `50`; a value outside that range also returns `50`.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of messages to skip before the page starts, `0` or greater. Defaults to `0`. Add the page size to it to load older messages.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;conversations-&gt;markConversationRead($id) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Marks a conversation as read: it sets `unreadCount` to `0` and `lastReadAt` to the current time. Call it when a user opens the thread in your inbox. It takes no request body, and calling it on a thread that is already read is harmless. The account-wide total from `GET /conversations/unread-count` drops by the thread's previous `unreadCount`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->conversations->markConversationRead(
    'c7d1e9a3-2b4f-4a6c-8d5e-1f3a9b7c2e04',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The conversation `id` (UUID) to mark as read.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Opt-outs
<details><summary><code>$client-&gt;sms-&gt;optOuts-&gt;listOptOuts($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the numbers on your opt-out list, newest first, including entries created from STOP, START and HELP keyword replies and the ones you added. Pass both `limit` and `offset` on every call: the response is a bare JSON array, and it is `null` when the page has no records (including when `limit` is missing). Page by increasing `offset` until a page returns fewer items than `limit` or `null`. To check a single number, use `GET /opt-outs/{phoneNumber}` instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->optOuts->listOptOuts(
    new ListOptOutsRequest([
        'limit' => 1,
        'offset' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `int` — Required. Maximum number of opt-outs to return, `1` or greater. Without it the response is `null`.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `int` — Required. Number of records to skip before the page starts. Pass `0` for the first page, then add `limit` for each following page.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;optOuts-&gt;createOptOut($request) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a phone number to your opt-out list for one channel, so Vobiz stops messages to it. After this, `POST /messages` to that number on that channel returns `422` and broadcasts skip it. An `sms` opt-out also blocks `mms`. Use it to record consent withdrawn outside a keyword reply, for example on a call or a web form. Creating the same number and channel again updates the stored `reason` instead of adding a second record.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->optOuts->createOptOut(
    new CreateOptOutRequest([
        'phoneNumber' => '+14155550123',
        'channel' => 'sms',
        'reason' => 'customer request',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$phoneNumber:** `string` — Required. The phone number to block, in E.164 format, for example `+14155550123`.
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Channel to block: `sms`, `mms` or `rcs`. Defaults to `sms`. An `sms` opt-out also blocks `mms`.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Free-text note stored on the record, for example `customer request`. Defaults to `manual`. Repeating the request for the same number and channel replaces it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;optOuts-&gt;checkOptOut($phoneNumber, $request) -> ?OptOutCheck</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Tells you whether a phone number is on your opt-out list for a channel. Call it before a send to skip a blocked contact instead of handling a `422` from `POST /messages`. The response is always `200` with `optedOut` set to `true` or `false`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->optOuts->checkOptOut(
    '+14155550123',
    new CheckOptOutRequest([
        'channel' => 'sms',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$phoneNumber:** `string` — The number in E.164 format, for example `+14155550123`. In raw HTTP requests, URL-encode the `+` as `%2B` (`/opt-outs/%2B14155550123`); the SDKs encode it for you.
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Channel to check: `sms`, `mms` or `rcs`. Defaults to `sms`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;optOuts-&gt;deleteOptOut($phoneNumber, $request) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes a phone number from your opt-out list for one channel, so you can message it again on that channel. Do this only after the contact has given consent again, for example after they reply `START`. The response is `200` whether or not a record existed, so it is safe to retry. Removing an opt-out on one channel leaves entries on other channels in place; delete each one separately.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->optOuts->deleteOptOut(
    '+14155550123',
    new DeleteOptOutRequest([
        'channel' => 'sms',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$phoneNumber:** `string` — The number in E.164 format, for example `+14155550123`. In raw HTTP requests, URL-encode the `+` as `%2B` (`/opt-outs/%2B14155550123`); the SDKs encode it for you.
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Channel to remove the opt-out from: `sms`, `mms` or `rcs`. Defaults to `sms`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Webhooks
<details><summary><code>$client-&gt;sms-&gt;webhooks-&gt;listWebhooks() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all of your webhook subscriptions, newest first, as a bare JSON array. The body is `null` rather than `[]` when you have none, so treat `null` as an empty list. The response includes each subscription's `secret`, so keep it out of logs and client-side code.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->webhooks->listWebhooks();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;webhooks-&gt;createWebhook($request) -> ?WebhookSubscription</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Registers an HTTPS endpoint that receives the events you subscribe to as signed `POST` requests. Only `url` is required; omit `events` to subscribe to `message.received`, `message.delivered` and `message.failed`. Every delivery carries `X-Webhook-ID`, `X-Webhook-Event` and `X-Webhook-Signature`, a lower-case hex HMAC-SHA256 of the raw body keyed with your `secret`. The subscription is active as soon as it is created; see the Webhooks guide for the payload envelope and a verification example.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->webhooks->createWebhook(
    new CreateWebhookRequest([
        'url' => 'https://example.com/vobiz/webhooks',
        'secret' => 'YOUR_WEBHOOK_SECRET',
        'events' => [
            WebhookEvent::MessageReceived->value,
            WebhookEvent::MessageDelivered->value,
            WebhookEvent::MessageFailed->value,
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$url:** `string` — The HTTPS URL that receives `POST` deliveries, for example `https://example.com/vobiz/webhooks`. Required; an empty or missing value returns `400` with `url is required`.
    
</dd>
</dl>

<dl>
<dd>

**$secret:** `?string` — Shared secret used to compute `X-Webhook-Signature` on every delivery. Choose a long random value and store it on your server; if you omit it the subscription is created with an empty secret.
    
</dd>
</dl>

<dl>
<dd>

**$events:** `?array` — Event names to deliver to this URL, matched exactly. Defaults to `message.received`, `message.delivered` and `message.failed` when you omit it or send an empty array.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;webhooks-&gt;getWebhook($id) -> ?WebhookSubscription</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one webhook subscription with its URL, events, `active` flag and signing secret. Use it to confirm the result of an update, since `PUT /webhooks/{id}` returns only `{"status":"ok"}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->webhooks->getWebhook(
    '2a4c6e8f-1b3d-4f5a-8c7e-9d0b2f4a6c8e',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The subscription `id` (UUID) returned when you created it or by `GET /webhooks`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;webhooks-&gt;updateWebhook($id, $request) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Changes any subset of `url`, `secret`, `events` and `active`. Fields you omit keep their current value; a field you send, including an empty string, replaces it. Set `active` to `false` to pause deliveries without losing the subscription, and back to `true` to resume. The response is `{"status":"ok"}`, so call `GET /webhooks/{id}` to read the updated subscription.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->webhooks->updateWebhook(
    '2a4c6e8f-1b3d-4f5a-8c7e-9d0b2f4a6c8e',
    new UpdateWebhookRequest([
        'events' => [
            WebhookEvent::MessageDelivered->value,
            WebhookEvent::MessageFailed->value,
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The subscription `id` (UUID) to change.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — New HTTPS URL for deliveries. Replaces the current URL as sent, so always send a full valid URL.
    
</dd>
</dl>

<dl>
<dd>

**$secret:** `?string` — New signing secret for `X-Webhook-Signature`. Deliveries are signed with the new value from this point, so update your verifier at the same time.
    
</dd>
</dl>

<dl>
<dd>

**$events:** `?array` — New list of event names to deliver, matched exactly. Replaces the whole list; it is not merged with the current events.
    
</dd>
</dl>

<dl>
<dd>

**$active:** `?bool` — `false` pauses deliveries and keeps the subscription; `true` resumes them.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;webhooks-&gt;deleteWebhook($id) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes the subscription and stops all deliveries to its URL. The response is `200` with `{"status":"ok"}`. To stop deliveries temporarily and keep the configuration, set `active` to `false` with `PUT /webhooks/{id}` instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->webhooks->deleteWebhook(
    '2a4c6e8f-1b3d-4f5a-8c7e-9d0b2f4a6c8e',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The subscription `id` (UUID) to delete.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Broadcasts
<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;listBroadcasts($request) -> ?BroadcastList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the broadcasts on your account, newest first, each with freshly counted `stats`. The response wraps the page in `broadcasts` and gives the account-wide count in `total`, so you can page with `limit` and `offset` until `offset` reaches `total`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->listBroadcasts(
    new ListBroadcastsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of broadcasts to return, from 1 to 500. Defaults to 50 when you omit it or pass `0`. A value above 500 returns `400` with `limit must be between 1 and 500`, and a non-integer returns `400` with `limit must be an integer`.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of broadcasts to skip before the page starts, for paging through results with `limit`. Defaults to `0`. A negative value returns `400` with `offset must be >= 0`, and a non-integer returns `400` with `offset must be an integer`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;createBroadcast($request) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a broadcast in `draft` status with zero `stats` and no recipients. Only `name` and `from` are required; `channel` defaults to `sms` and `ratePerSecond` to 5. Nothing is sent when you create a broadcast. Next, upload recipients with `POST /broadcasts/{id}/recipients`, check the rendered text with `GET /broadcasts/{id}/preview`, then start sending with `POST /broadcasts/{id}/launch`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->createBroadcast(
    new BroadcastInput([
        'name' => 'October pricing update',
        'from' => '+14155550100',
        'template' => 'Hi {{name}}, your refund of {{amount}} is on its way.',
        'ratePerSecond' => 5,
        'tag' => 'pricing-oct',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;getBroadcast($id) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one broadcast with its configuration, current `status` and freshly counted `stats`. Poll it while a broadcast runs to follow progress, or subscribe to the `broadcast.updated` WebSocket event. For per-recipient results, use `GET /broadcasts/{id}/recipients` or `GET /broadcasts/{id}/export`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->getBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;updateBroadcast($id, $request) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Changes a `draft` broadcast. Send only the fields you want to change; fields you leave out, or send as `null`, keep their value, except `scheduledAt`, where `null` or `""` clears a scheduled start. The same validation as create applies, so `name` and `from` cannot be set to an empty string. A broadcast in any other status returns `409` with `cannot edit a broadcast that is <status>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->updateBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
    new UpdateBroadcastRequest([
        'body' => new BroadcastUpdateInput([
            'template' => 'Hi {{name}}, your refund of {{amount}} has been issued.',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `BroadcastUpdateInput` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;deleteBroadcast($id)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently removes a `draft` or `cancelled` broadcast together with its recipient list and returns `204` with no body. Any other status returns `409` with `cannot delete a broadcast that is <status>`, so cancel a scheduled, running or paused broadcast first. Completed broadcasts are kept as your sending record.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->deleteBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;listRecipients($id, $request) -> ?BroadcastRecipientList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the broadcast's recipients in upload order, each with its template `variables` and per-recipient send state. Filter by `status` to find failures, opted-out numbers or rows still waiting to send. The response gives the page in `recipients` and the count matching your filter in `total`. For a downloadable file of the same data, use `GET /broadcasts/{id}/export`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->listRecipients(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
    new ListRecipientsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Return only recipients in this state, matched case-insensitively. `pending` waits to send, `sending` is in progress, `sent` and `delivered` track the message, `failed` has an `errorCode`, `opted_out` was excluded because the number opted out, and `skipped` was still pending when the broadcast was cancelled. Omit it to return every recipient; any other value returns `400`.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of recipients to return, from 1 to 500. Defaults to 50 when you omit it or pass `0`. A value above 500 returns `400` with `limit must be between 1 and 500`, and a non-integer returns `400` with `limit must be an integer`.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of recipients to skip before the page starts, for paging through results with `limit`. Defaults to `0`. A negative value returns `400` with `offset must be >= 0`, and a non-integer returns `400` with `offset must be an integer`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;uploadRecipients($id, $request) -> ?UploadResult</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sets the recipient list of a `draft` broadcast; each upload replaces the previous list. Send `multipart/form-data` with a `.csv` or `.xlsx` `file` (10 MB maximum) to use template variables from extra columns, or JSON with a `numbers` array for a plain list. Numbers without a country code are normalised to E.164 with `defaultCountry` (default `US`). Duplicates are dropped, invalid rows are reported in `invalid`, and numbers that opted out of SMS from you are kept with status `opted_out` and never sent. A broadcast can hold up to 10,000 recipients; a larger list returns `422`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->uploadRecipients(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
    new UploadRecipientsJson([
        'numbers' => [
            '+14155550123',
            '+14155550124',
            '415 555 0125',
        ],
        'defaultCountry' => UploadRecipientsJsonDefaultCountry::Us->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>

<dl>
<dd>

**$numbers:** `array` — Phone numbers, one per recipient, up to 10,000. Numbers without a country code are normalised with `defaultCountry`. An empty array clears the list.
    
</dd>
</dl>

<dl>
<dd>

**$defaultCountry:** `?string` — ISO 3166-1 alpha-2 country code, matched case-insensitively, used to normalise numbers that have no country code. Defaults to `US`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;previewBroadcast($id, $request) -> ?BroadcastPreview</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Renders the template for the first pending recipients so you can check personalisation, encoding and segment counts before you launch. Nothing is sent and nothing is charged. `missingVariables` lists placeholders that have no matching upload column; they render as empty text, so fix the template or re-upload before launching. `estimatedSegments` totals the segments across every pending recipient, not only the samples shown.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->previewBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
    new PreviewBroadcastRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of pending recipients to render in `samples`, from 1 to 50. Defaults to 5 when you omit it or pass `0`. A value above 50 returns `400` with `limit must be between 1 and 50`, and a non-integer returns `400` with `limit must be an integer`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;exportBroadcast($id) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Downloads every recipient with its send result as a CSV file (`text/csv`), named `broadcast-<id>.csv`. The columns are `row`, `to`, `status`, `message_id`, `error_code`, `error_message` and `sent_at`, followed by one column per column of your upload. Text cells that start with `=`, `+`, `-`, `@`, a tab or a carriage return are prefixed with `'` so they open safely in spreadsheet applications. You can export a broadcast in any status, including a draft, to check the parsed list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->exportBroadcast(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;launchBroadcast($id) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts sending. This sends real SMS to every `pending` recipient and charges your account per segment, so call it only with your own credentials on a list you have consent to message. Only a `draft` can be launched; it moves to `running`, or to `scheduled` when `scheduledAt` is in the future. Launch returns `422` when the template is empty, when no recipient is pending, or when a phone-number `from` is not an SMS number on your account. Each recipient is sent like `POST /messages` with the broadcast's `tag` and DLT IDs and the idempotency key `broadcast:<broadcastId>:<recipientId>`, so no recipient is messaged twice.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->launchBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;pauseBroadcast($id) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pauses a `running` broadcast. Sending stops after the messages already in flight, and pending recipients stay `pending` until you resume or cancel. Any other status returns `409` with `cannot pause a broadcast that is <status>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->pauseBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;resumeBroadcast($id) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Continues sending to the pending recipients of a `paused` broadcast and moves it back to `running`. This sends real messages and charges your account per segment. It also resumes a broadcast paused with `pauseReason` `insufficient_balance` once you have topped up. Any other status returns `409` with `cannot resume a broadcast that is <status>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->resumeBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;broadcasts-&gt;cancelBroadcast($id) -> ?Broadcast</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stops a broadcast for good and sets `completedAt`. You can cancel from `draft`, `scheduled`, `running` or `paused`; a `completed`, `failed` or already `cancelled` broadcast returns `409`. Pending recipients become `skipped`, and messages already sent are unaffected. A cancelled broadcast cannot be resumed or edited, but it can be deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->broadcasts->cancelBroadcast(
    '3f8d2a6e-5b1c-4e7f-a9d0-2c4b6e8f1a35',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The broadcast's `id` (UUID), as returned by `POST /broadcasts` or `GET /broadcasts`. An id that is not a UUID, or that belongs to another account, returns `404` with `broadcast not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## RCS Senders
<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;listSenders($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the RCS senders on your account as a bare JSON array, without a total count. Page through them with `limit` and `offset`; an empty array means you have reached the end. `status` here is the last stored value, so call `GET /senders/{id}/status` for the latest state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->listSenders(
    new ListSendersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of items to return, from 1 to 100. Defaults to 20; a value outside that range or a non-integer is replaced by the default.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of items to skip before the page starts. Defaults to `0`. Pass a whole number of 0 or more.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;createSender($request) -> ?Sender</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Registers a new RCS sender (agent) with the RCS platform and stores it on your account with status `pending`. `provider` and `senderName` are required; the profile fields are reviewed by the RCS platform and the carriers before the sender can reach real users. Poll `GET /senders/{id}/status` until the platform reports it as launched, then send with its `senderName` as `from` and `channel: rcs` on `POST /messages`. A rejected request returns `400` with the platform's reason in `error`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->createSender(
    new CreateSenderRequest([
        'provider' => 'YOUR_ROUTING_IDENTIFIER',
        'senderName' => 'example-brand',
        'displayName' => 'Example Brand',
        'description' => 'Order updates and support for Example Brand customers.',
        'billingCategory' => 'CONVERSATIONAL',
        'useCase' => 'TRANSACTIONAL',
        'hostingRegion' => 'NORTH_AMERICA',
        'brand' => new SenderBrand([
            'brandName' => 'Example Brand',
        ]),
        'color' => '#1A73E8',
        'phones' => [
            new SenderPhone([
                'phoneNumber' => '+14155550100',
                'label' => 'Support',
            ]),
        ],
        'emails' => [
            new SenderEmail([
                'address' => 'support@example.com',
                'label' => 'Support',
            ]),
        ],
        'websites' => [
            new SenderWebsite([
                'url' => 'https://example.com',
                'label' => 'Website',
            ]),
        ],
        'bannerUrl' => 'https://example.com/rcs/banner.jpg',
        'logoUrl' => 'https://example.com/rcs/logo.png',
        'privacy' => new SenderLink([
            'url' => 'https://example.com/privacy',
            'label' => 'Privacy policy',
        ]),
        'termsOfService' => new SenderLink([
            'url' => 'https://example.com/terms',
            'label' => 'Terms of service',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` — The routing identifier your account was provisioned with for RCS. Contact support if you are unsure which value to use; an unknown value returns `400`.
    
</dd>
</dl>

<dl>
<dd>

**$senderName:** `string` — Unique technical name of the sender on the RCS platform. You pass it as `from` when you send RCS, and it cannot be changed later.
    
</dd>
</dl>

<dl>
<dd>

**$displayName:** `?string` — The brand name recipients see at the top of the conversation.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Short description of your business or the sender's purpose, shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$billingCategory:** `?string` — How the RCS platform bills conversations from this sender. Values accepted by the platform include `CONVERSATIONAL` and `NON_CONVERSATIONAL`.
    
</dd>
</dl>

<dl>
<dd>

**$useCase:** `?string` — The kind of traffic the sender carries, reviewed by the RCS platform. Values accepted by the platform include `OTP`, `TRANSACTIONAL`, `PROMOTIONAL` and `MULTI_USE`.
    
</dd>
</dl>

<dl>
<dd>

**$hostingRegion:** `?string` — The region where the RCS platform hosts the sender. Values accepted by the platform include `NORTH_AMERICA`, `EUROPE` and `ASIA_PACIFIC`. Cannot be changed later.
    
</dd>
</dl>

<dl>
<dd>

**$brand:** `?SenderBrand` — The brand the sender represents.
    
</dd>
</dl>

<dl>
<dd>

**$color:** `?string` — Accent colour for the sender's buttons and header, as a hex code such as `#1A73E8`.
    
</dd>
</dl>

<dl>
<dd>

**$phones:** `?array` — Contact phone numbers shown on the sender's info page, each with a label.
    
</dd>
</dl>

<dl>
<dd>

**$emails:** `?array` — Contact email addresses shown on the sender's info page, each with a label.
    
</dd>
</dl>

<dl>
<dd>

**$websites:** `?array` — Websites shown on the sender's info page, each with a label.
    
</dd>
</dl>

<dl>
<dd>

**$bannerUrl:** `?string` — Publicly reachable HTTPS URL of the banner image shown at the top of the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$logoUrl:** `?string` — Publicly reachable HTTPS URL of the logo shown next to every message.
    
</dd>
</dl>

<dl>
<dd>

**$privacy:** `?SenderLink` — Link to your privacy policy, shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$termsOfService:** `?SenderLink` — Link to your terms of service, shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$platform:** `?SenderPlatform` — Identifiers the RCS platform has already assigned to your agent, if you have any.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;getSender($id) -> ?Sender</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one RCS sender as stored on your account, including its full profile. `status` is the last value stored on your account; call `GET /senders/{id}/status` to refresh it from the RCS platform. An unknown id returns `404`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->getSender(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The sender's `id` (UUID), as returned by `POST /senders` or `GET /senders`. An unknown id returns `sender not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;updateSender($id, $request) -> ?Sender</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the sender's profile on the RCS platform and then on your account, and returns the updated sender. Send only the fields you want to change; fields you leave out keep their value. `provider`, `senderName` and `hostingRegion` are fixed after creation. Every failure, including an unknown id, returns `400`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->updateSender(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
    new UpdateSenderRequest([
        'displayName' => 'Example Brand Support',
        'description' => 'Order updates, returns and support for Example Brand customers.',
        'websites' => [
            new SenderWebsite([
                'url' => 'https://example.com/help',
                'label' => 'Help centre',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The sender's `id` (UUID), as returned by `POST /senders` or `GET /senders`. An unknown id returns `sender not found`.
    
</dd>
</dl>

<dl>
<dd>

**$displayName:** `?string` — The brand name recipients see at the top of the conversation.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Short description of your business or the sender's purpose, shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$billingCategory:** `?string` — How the RCS platform bills conversations from this sender, for example `CONVERSATIONAL` or `NON_CONVERSATIONAL`.
    
</dd>
</dl>

<dl>
<dd>

**$useCase:** `?string` — The kind of traffic the sender carries, for example `OTP`, `TRANSACTIONAL`, `PROMOTIONAL` or `MULTI_USE`.
    
</dd>
</dl>

<dl>
<dd>

**$brand:** `?SenderBrand` — The brand the sender represents.
    
</dd>
</dl>

<dl>
<dd>

**$color:** `?string` — Accent colour for the sender's buttons and header, as a hex code such as `#1A73E8`.
    
</dd>
</dl>

<dl>
<dd>

**$phones:** `?array` — Contact phone numbers shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$emails:** `?array` — Contact email addresses shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$websites:** `?array` — Websites shown on the sender's info page.
    
</dd>
</dl>

<dl>
<dd>

**$bannerUrl:** `?string` — Publicly reachable HTTPS URL of the banner image.
    
</dd>
</dl>

<dl>
<dd>

**$logoUrl:** `?string` — Publicly reachable HTTPS URL of the logo image.
    
</dd>
</dl>

<dl>
<dd>

**$privacy:** `?SenderLink` — Link to your privacy policy.
    
</dd>
</dl>

<dl>
<dd>

**$termsOfService:** `?SenderLink` — Link to your terms of service.
    
</dd>
</dl>

<dl>
<dd>

**$platform:** `?SenderPlatform` — Identifiers the RCS platform has assigned to your agent.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;getSenderStatus($id) -> ?Sender</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Asks the RCS platform for the sender's current launch status, stores it on the sender and returns the full sender. Poll it after `POST /senders` or a profile update until `status` shows the sender is live, then start sending. Every failure, including an unknown id, returns `400`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->getSenderStatus(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The sender's `id` (UUID), as returned by `POST /senders` or `GET /senders`. An unknown id returns `sender not found`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;listTemplates($senderId, $request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the templates registered on one RCS sender as a bare JSON array, without a total count. Page through them with `limit` and `offset`. `status` is the last stored value; refresh one template with its `/status` endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->listTemplates(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
    new ListTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$senderId:** `string` — The `id` (UUID) of the RCS sender that owns the templates. An unknown sender returns `sender not found`.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of items to return, from 1 to 100. Defaults to 20; a value outside that range or a non-integer is replaced by the default.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of items to skip before the page starts. Defaults to `0`. Pass a whole number of 0 or more.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;createTemplate($senderId, $request) -> ?Template</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Registers a message template on an RCS sender with the RCS platform and returns it with status `pending`. `templateName`, `type` and `content` are passed to the platform unchanged, so use the template types and content shapes the RCS platform defines. Call `GET /senders/{senderId}/templates/{templateName}/status` to follow approval. An unknown sender or a platform rejection returns `400`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->createTemplate(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
    new CreateTemplateRequest([
        'templateName' => 'order-shipped',
        'type' => 'TEXT',
        'content' => [
            'text' => "Your order {{orderId}} has shipped and arrives on {{eta}}.",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$senderId:** `string` — The `id` (UUID) of the RCS sender that owns the templates. An unknown sender returns `sender not found`.
    
</dd>
</dl>

<dl>
<dd>

**$templateName:** `string` — Unique name for the template on this sender. You use it in the path of every template endpoint.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Template type as defined by the RCS platform. It decides which `content` shape the platform expects.
    
</dd>
</dl>

<dl>
<dd>

**$content:** `array` — Template content as a JSON object in the shape the RCS platform defines for the chosen `type`. Stored and returned exactly as you submit it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;getTemplate($senderId, $templateName) -> ?Template</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one template as stored on your account, including the `content` you submitted. For the latest approval state from the RCS platform, call `GET /senders/{senderId}/templates/{templateName}/status`. An unknown sender or template returns `404`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->getTemplate(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
    'appointment_reminder',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$senderId:** `string` — The `id` (UUID) of the RCS sender that owns the templates. An unknown sender returns `sender not found`.
    
</dd>
</dl>

<dl>
<dd>

**$templateName:** `string` — The template's `templateName`, exactly as you set it when you created the template on this sender.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;deleteTemplate($senderId, $templateName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes the template from the RCS platform and from your account, and returns `204` with no body. You cannot send with the template afterwards. An unknown sender or template returns `400`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->deleteTemplate(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
    'appointment_reminder',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$senderId:** `string` — The `id` (UUID) of the RCS sender that owns the templates. An unknown sender returns `sender not found`.
    
</dd>
</dl>

<dl>
<dd>

**$templateName:** `string` — The template's `templateName`, exactly as you set it when you created the template on this sender.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;rcsSenders-&gt;getTemplateStatus($senderId, $templateName) -> ?Template</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Asks the RCS platform for the template's current approval status, stores it on the template and returns the full template. Poll it after `POST /senders/{senderId}/templates` until the template is approved. Every failure, including an unknown sender or template, returns `400`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->rcsSenders->getTemplateStatus(
    '5d7f9b1c-3e5a-4c7e-9f1b-3d5f7a9c1e3b',
    'appointment_reminder',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$senderId:** `string` — The `id` (UUID) of the RCS sender that owns the templates. An unknown sender returns `sender not found`.
    
</dd>
</dl>

<dl>
<dd>

**$templateName:** `string` — The template's `templateName`, exactly as you set it when you created the template on this sender.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Brands
<details><summary><code>$client-&gt;sms-&gt;brands-&gt;listBrands() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns every brand on your account as a bare JSON array, newest first. The list is not paginated and reads the records stored on your account without contacting the registry; deleted brands are left out. Call `GET /10dlc/brands/{id}` for the latest registry state of one brand.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->listBrands();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;createBrand($request) -> ?Brand</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a brand, the business identity that US carriers associate with your 10DLC traffic, and mirrors it to the US 10DLC registry in `DRAFT` stage. `name` and `brandType` are required; send every other field your business has, because the registry reviews them when you register. Nothing is submitted for review until you call `POST /10dlc/brands/{id}/register`. Pass a `referenceId` so that a retried request (for example after a `502`) reconciles to the same brand instead of creating a second one. Next, register the brand, then create a campaign under it with `POST /10dlc/campaigns`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->createBrand(
    new CreateBrandRequest([
        'referenceId' => 'brand-example-corp-01',
        'name' => 'Example Corp',
        'legalName' => 'Example Corporation Inc.',
        'brandType' => CreateBrandRequestBrandType::TendlcPrivateCompany->value,
        'website' => 'https://example.com',
        'supportEmail' => 'support@example.com',
        'supportPhone' => '+14155550100',
        'vertical' => 'TECHNOLOGY',
        'taxId' => '12-3456789',
        'taxIdIssuingCountry' => 'US',
        'countryCode' => 'US',
        'address' => new BrandAddress([
            'street' => '100 Example Street',
            'city' => 'San Francisco',
            'state' => 'CA',
            'zipCode' => '94105',
        ]),
        'businessContactFirstName' => 'Alex',
        'businessContactLastName' => 'Doe',
        'businessContactEmail' => 'alex.doe@example.com',
        'legalEntityType' => 'PRIVATE_COMPANY',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateBrandRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;getBrand($id) -> ?Brand</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one brand after refreshing its `stage`, `registrationStatus`, `brandIdentityStatus` and `rejectionReasons` from the US 10DLC registry. The refresh is best-effort: if the registry is slow to answer, you get the stored record and `lastSyncedAt` tells you how fresh it is. Poll this endpoint (or listen for the `10dlc.brand.updated` WebSocket event) after registering to follow the review.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->getBrand(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;updateBrand($id, $request) -> ?Brand</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the brand with the body you send and pushes the change to the US 10DLC registry. This is a full replacement, not a patch: send the same shape as create, including `name` and `brandType`, and any field you leave out is cleared. `referenceId` is ignored on update. Use it to correct a brand before registering it, or to fix the points listed in `rejectionReasons` before resubmitting.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->updateBrand(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
    new UpdateBrandRequest([
        'body' => new CreateBrandRequest([
            'name' => 'Example Corp',
            'legalName' => 'Example Corporation Inc.',
            'brandType' => CreateBrandRequestBrandType::TendlcPrivateCompany->value,
            'website' => 'https://example.com',
            'supportEmail' => 'help@example.com',
            'supportPhone' => '+14155550100',
            'vertical' => 'TECHNOLOGY',
            'taxId' => '12-3456789',
            'taxIdIssuingCountry' => 'US',
            'countryCode' => 'US',
            'address' => new BrandAddress([
                'street' => '100 Example Street',
                'city' => 'San Francisco',
                'state' => 'CA',
                'zipCode' => '94105',
            ]),
            'businessContactFirstName' => 'Alex',
            'businessContactLastName' => 'Doe',
            'businessContactEmail' => 'alex.doe@example.com',
            'legalEntityType' => 'PRIVATE_COMPANY',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `CreateBrandRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;deleteBrand($id)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the brand from your account and from the US 10DLC registry and returns `204` with no body. A brand that still owns campaigns returns `409` with `conflict: brand still has N campaign(s); delete them first`, so delete or deregister its campaigns first. Deletion cannot be undone; a new brand needs a new registration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->deleteBrand(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;registerBrand($id) -> ?Brand</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Submits the brand to the US 10DLC registry for identity verification. The brand moves from `DRAFT` to `SUBMITTED` and `registrationStatus` starts tracking the registrar's decision (`PENDING`, then `ACTIVE` or `REJECTED`). The request has no body and returns the refreshed brand. Submit only when the brand details are final and you intend to register this business. Follow progress with `GET /10dlc/brands/{id}` or `GET /10dlc/brands/{id}/registrar-statuses`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->registerBrand(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;brandRegistrarStatuses($id) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the brand's state at each registrar that has reviewed it, read live from the US 10DLC registry. Each entry carries the registrar's `state` and, when the registrar reports them, the identity result, the authentication status and a rejection reason. An empty array means no registrar has recorded a state yet. Use it to see why a brand is pending or rejected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->brandRegistrarStatuses(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;brandAuthVerification($id) -> ?BrandAuthRequested</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts the registry's brand authentication for a brand whose `brandType` is `TENDLC_PUBLIC_COMPANY`. The registry sends a two-factor verification request to the brand's `businessContactEmail`, and the brand shows `registrationStatus` `PENDING_2FA` until the contact completes it. The request has no body and returns `202` with `{"status":"requested"}`. Any other brand type returns `400` with `invalid request: brand authentication is only available for TENDLC_PUBLIC_COMPANY brands`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->brandAuthVerification(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;resend2Fa($id) -> ?BrandAuthRequested</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Asks the registry to send the brand-authentication verification again to the brand's `businessContactEmail`. Use it when a `TENDLC_PUBLIC_COMPANY` brand is `PENDING_2FA` and the contact did not receive or let the first request expire. The request has no body and returns `202` with `{"status":"requested"}`. Any other brand type returns `400`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->resend2Fa(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;vetBrand($id, $request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Requests an external vet of a registered brand from the US 10DLC registry. A successful vet can raise the brand's trust tier and, with it, the throughput carriers grant its campaigns. `type` defaults to `STANDARD`; any value other than `STANDARD`, `ENHANCED` or `POLITICAL` returns `400`. Every call files a new vetting request, so send it only when you intend to. The response is the registry's vetting record, returned as received; list past vets with `GET /10dlc/brands/{id}/vets`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->vetBrand(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
    new BrandVetRequest([
        'type' => BrandVetRequestType::Standard->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Kind of vet to request: `STANDARD` (the default), `ENHANCED` (a deeper review) or `POLITICAL` (for political organisations). Case-insensitive; any other value returns `400` with `invalid request: type must be one of STANDARD, ENHANCED, POLITICAL`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;brands-&gt;listBrandVets($id, $request) -> ?BrandVetList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the brand's vetting records from the US 10DLC registry, one page at a time. The body is `{"results": [...], "paging": {...}}`, where each result is a registry vetting record passed through as received. `page` must be 0 or more and `size` between 0 and 100; other values return `400` with `page must be >= 0 and size between 0 and 100`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->brands->listBrandVets(
    '8e6c4a2f-0d9b-4b7a-a5c3-1e9f7d5b3a10',
    new ListBrandVetsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Zero-based page index. Defaults to `0`. Must be 0 or more; a negative value returns `400`. A value that is not an integer is treated as `0`.
    
</dd>
</dl>

<dl>
<dd>

**$size:** `?int` — Records per page, from 0 to 100. Defaults to `20`; `0` or a value that is not an integer also gives the default page size. A value above 100 returns `400`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Campaigns
<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;listCampaigns() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns every 10DLC and toll-free campaign on your account as a bare JSON array, newest first. The list is not paginated and reads the records stored on your account without contacting the registry. Toll-free campaigns have `campaignType` `TOLL_FREE_UNIFIED_NUMBER` and no `brandId`. Call `GET /10dlc/campaigns/{id}` for the latest registry state of one campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->listCampaigns();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;createCampaign($request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a 10DLC campaign, the messaging program you run under one of your brands, and mirrors it to the US 10DLC registry in `DRAFT` stage. `name` and `brandId` are required; `campaignType` defaults to `TEN_DIGIT_LONG_CODE`. Upload any `supportingDocuments` or `mmsSampleFiles` with `POST /10dlc/documents` first. Pass a `referenceId` so a retried request reconciles to the same campaign. Next, submit the campaign with `POST /10dlc/campaigns/{id}/register`; toll-free verification uses `POST /10dlc/campaigns/toll-free` instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->createCampaign(
    new CreateCampaignRequest([
        'name' => 'Example Corp account alerts',
        'programSummary' => 'Example Corp sends account and support alerts to customers who opted in on the sign-up form. Reply STOP to opt out, HELP for help.',
        'confirmationMessage' => 'Example Corp: You are subscribed to account alerts. Msg frequency varies. Msg & data rates may apply. Reply HELP for help, STOP to opt out.',
        'helpMessage' => 'Example Corp: For help email support@example.com. Reply STOP to opt out.',
        'stopMessage' => 'Example Corp: You have been unsubscribed. Reply HELP for help.',
        'customerCarePhone' => '+14155550100',
        'customerCareEmail' => 'support@example.com',
        'termsAndConditionsUrl' => 'https://example.com/terms',
        'privacyPolicyUrl' => 'https://example.com/privacy',
        'exampleMessages' => [
            'Example Corp: Your support ticket #48213 was updated. View it at https://example.com/support. Reply STOP to opt out.',
            'Example Corp: Your account balance is low. Add funds at https://example.com/wallet. Reply STOP to opt out.',
        ],
        'useCases' => [
            'ALERTS',
        ],
        'messageTypes' => [
            'SMS',
        ],
        'optIns' => [
            'web' => [
                'url' => "https://example.com/signup",
                'callToAction' => "By checking this box you agree to receive account alerts from Example Corp. Msg frequency varies. Msg & data rates may apply. Reply STOP to opt out, HELP for help.",
            ],
        ],
        'lowVolume' => true,
        'embeddedLink' => true,
        'numbers' => [
            '14155550100',
        ],
        'referenceId' => 'campaign-account-alerts-01',
        'brandId' => '5f1c3a2e-7b4d-4e8f-9a0b-1c2d3e4f5a60',
        'campaignType' => CreateCampaignRequestCampaignType::TenDigitLongCode->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$referenceId:** `?string` — Your own idempotency reference. Repeating a create with the same value reconciles to the same campaign instead of creating a second one. Ignored on update.
    
</dd>
</dl>

<dl>
<dd>

**$brandId:** `string` — Required. ID of the brand from `POST /10dlc/brands` that runs this campaign. A missing, unknown or non-UUID value returns `404` with `{"error":"brand not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$campaignType:** `?string` — Kind of campaign. Defaults to `TEN_DIGIT_LONG_CODE`, the standard 10DLC campaign. Toll-free types return `400`; use `POST /10dlc/campaigns/toll-free` for those.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;createTollFreeCampaign($request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts toll-free verification for one or more toll-free numbers. The business details travel inside the request, so no brand is needed; only `name` is required, but the registry reviews every field you send. The campaign is created with `campaignType` `TOLL_FREE_UNIFIED_NUMBER` and no `brandId`. Pass a `referenceId` so a retried request reconciles to the same campaign, then submit it with `POST /10dlc/campaigns/{id}/register`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->createTollFreeCampaign(
    new TollFreeCampaignRequest([
        'referenceId' => 'tollfree-notifications-01',
        'name' => 'Example Corp toll-free notifications',
        'privacyPolicyUrl' => 'https://example.com/privacy',
        'termsAndConditionsUrl' => 'https://example.com/terms',
        'messageVolume' => 'TEN_THOUSAND',
        'numbers' => [
            '+18335550100',
        ],
        'useCase' => 'NOTIFICATIONS',
        'programSummary' => 'Example Corp sends account and support notifications to customers who opted in on the contact form. Reply STOP to opt out, HELP for help.',
        'exampleMessage' => 'Example Corp: Your account balance is low. Add funds at https://example.com/wallet. Reply STOP to opt out, HELP for help.',
        'optIns' => [
            'web' => [
                'url' => "https://example.com/contact",
                'callToAction' => "By checking this box you agree to receive account notifications from Example Corp. Reply STOP to opt out, HELP for help.",
            ],
        ],
        'optInImageUrLs' => [
            'https://example.com/opt-in-screenshot.png',
        ],
        'countryCode' => 'US',
        'address' => new BrandAddress([
            'street' => '100 Example Street',
            'city' => 'San Francisco',
            'state' => 'CA',
            'zipCode' => '94105',
        ]),
        'supportPhone' => '+14155550100',
        'supportEmail' => 'support@example.com',
        'businessContactFirstName' => 'Alex',
        'businessContactLastName' => 'Doe',
        'legalName' => 'Example Corporation Inc.',
        'businessName' => 'Example Corp',
        'businessWebsite' => 'https://example.com',
        'customerCareEmail' => 'support@example.com',
        'taxId' => '12-3456789',
        'taxIdIssuingCountry' => 'US',
        'legalEntityType' => 'PRIVATE_COMPANY',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$referenceId:** `?string` — Your own idempotency reference. Repeating a create with the same value reconciles to the same campaign instead of creating a second one.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name for the toll-free campaign, for your reference. Required (`400` with `invalid request: name is required` otherwise).
    
</dd>
</dl>

<dl>
<dd>

**$privacyPolicyUrl:** `?string` — Public URL of your privacy policy.
    
</dd>
</dl>

<dl>
<dd>

**$termsAndConditionsUrl:** `?string` — Public URL of the terms and conditions that cover the program.
    
</dd>
</dl>

<dl>
<dd>

**$messageVolume:** `?string` — Expected monthly message volume. Values accepted by the US 10DLC registry: `HUNDRED`, `TEN_THOUSAND`, `TWO_HUNDRED_FIFTY_THOUSAND`, `SEVEN_HUNDRED_FIFTY_THOUSAND`, `FIVE_MILLION`.
    
</dd>
</dl>

<dl>
<dd>

**$numbers:** `?array` — Toll-free numbers on your account to verify, in E.164 format (for example `+18885550100`).
    
</dd>
</dl>

<dl>
<dd>

**$numberKeys:** `?array` — Registry number keys of the numbers to verify, as an alternative to `numbers`.
    
</dd>
</dl>

<dl>
<dd>

**$useCase:** `?string` — Main use case of the program. Values accepted by the US 10DLC registry: `TWO_FACTOR_AUTH`, `NOTIFICATIONS`, `SYSTEM_ALERTS`, `APP_NOTIFICATIONS`, `BANKING`, `BOOKING_CONFIRMATIONS`, `CHATBOT`, `COURIER_SERVICES_DELIVERIES`, `EMERGENCY_ALERTS`, `EVENTS_PLANNING`, `FRAUD_ALERTS`, `GENERAL_MARKETING`, `HEALTHCARE`, `INSURANCE_SERVICES`, `LEGAL_SERVICES`, `MOTIVATIONAL_REMINDERS`, `POLITICAL`, `REAL_ESTATE_SERVICES`, `RELIGIOUS_SERVICES`, `REWARDS_PROGRAM`, `WEBINAR_REMINDERS`, `AUCTIONS`, `COVID_19_ALERTS`.
    
</dd>
</dl>

<dl>
<dd>

**$programSummary:** `?string` — Plain-language description of the program: what you send, to whom, how often and how recipients opt in.
    
</dd>
</dl>

<dl>
<dd>

**$exampleMessage:** `?string` — A sample message exactly as you will send it, including your brand name and opt-out language.
    
</dd>
</dl>

<dl>
<dd>

**$optIns:** `?array` — How recipients give consent, as an object keyed by opt-in channel (for example `web` with `url` and `callToAction`). Passed to the registry as given.
    
</dd>
</dl>

<dl>
<dd>

**$optInImageUrLs:** `?array` — Public URLs of screenshots or images that show the opt-in flow to the reviewer.
    
</dd>
</dl>

<dl>
<dd>

**$additionalInformation:** `?string` — Anything else the reviewer should know about the program, in plain text.
    
</dd>
</dl>

<dl>
<dd>

**$countryCode:** `?string` — ISO 3166-1 alpha-2 code of the country where the business is registered.
    
</dd>
</dl>

<dl>
<dd>

**$address:** `?BrandAddress` — Postal address of the business as it appears on its registration records.
    
</dd>
</dl>

<dl>
<dd>

**$supportPhone:** `?string` — Support phone number for the business, in E.164 format.
    
</dd>
</dl>

<dl>
<dd>

**$supportEmail:** `?string` — Support email address for the business.
    
</dd>
</dl>

<dl>
<dd>

**$businessContactFirstName:** `?string` — First name of the person the reviewer can contact about the business.
    
</dd>
</dl>

<dl>
<dd>

**$businessContactLastName:** `?string` — Last name of the person the reviewer can contact about the business.
    
</dd>
</dl>

<dl>
<dd>

**$legalName:** `?string` — Registered legal name of the business, exactly as it appears on tax records.
    
</dd>
</dl>

<dl>
<dd>

**$businessDba:** `?string` — Trading name ("doing business as") when it differs from `legalName`. Note the casing `businessDBA` on this endpoint, unlike `businessDba` on brands.
    
</dd>
</dl>

<dl>
<dd>

**$businessName:** `?string` — Business name customers know you by.
    
</dd>
</dl>

<dl>
<dd>

**$businessWebsite:** `?string` — Business website. It must be live and match the business.
    
</dd>
</dl>

<dl>
<dd>

**$customerCareEmail:** `?string` — Customer care email address for the program.
    
</dd>
</dl>

<dl>
<dd>

**$taxId:** `?string` — Tax identifier of the business, for example the US EIN.
    
</dd>
</dl>

<dl>
<dd>

**$taxIdIssuingCountry:** `?string` — ISO 3166-1 alpha-2 code of the country that issued `taxId`.
    
</dd>
</dl>

<dl>
<dd>

**$legalEntityType:** `?string` — Legal form of the business. Values accepted by the US 10DLC registry: `PRIVATE_COMPANY`, `PUBLIC_COMPANY`, `NON_PROFIT`, `GOVERNMENT`, `SOLE_PROPRIETOR`.
    
</dd>
</dl>

<dl>
<dd>

**$businessRegistrationType:** `?string` — Type of registration number for a business outside the US. Values accepted by the US 10DLC registry: `VAT`, `CBN`, `PROVINCIAL_NUMBER`, `ABN`, `SIREN`, `NZBN`, `CIF`, `CNPJ`, `OTHER`.
    
</dd>
</dl>

<dl>
<dd>

**$campaignVerifyToken:** `?string` — Campaign Verify token for a US political program. Omit it for every other program.
    
</dd>
</dl>

<dl>
<dd>

**$priorityId:** `?string` — ID (UUID) of a priority option from `GET /10dlc/campaigns/priorities`. A value that is not a UUID returns `400`; omit it when the list is empty.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;campaignPriorities() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the priority options available to your account at the US 10DLC registry, as a JSON array. Pass an option's `id` as `priorityId` when you create or register a toll-free campaign. An empty array means no priority options apply to your account, and you can omit `priorityId`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->campaignPriorities();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;getCampaign($id) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one campaign after refreshing its `stage` and review feedback (`rejectionReasons`) from the US 10DLC registry. If the registry is slow to answer, you get the stored record and `lastSyncedAt` tells you how fresh it is. Poll this endpoint (or listen for the `10dlc.campaign.updated` WebSocket event) after registering until `stage` settles at `REGISTERED` or `REJECTED`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->getCampaign(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;updateCampaign($id, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the editable fields of a 10DLC campaign and pushes the change to the US 10DLC registry. This is a full replacement: `name` is required and any field you leave out is cleared. `campaignType` and the brand stay as created, and `referenceId` is ignored. The registry accepts updates while the campaign is `DRAFT` or `REJECTED`. Toll-free campaigns return `400` on this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->updateCampaign(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
    new UpdateCampaignRequest([
        'name' => 'Example Corp account alerts',
        'programSummary' => 'Example Corp sends account, billing and support alerts to customers who opted in on the sign-up form. Reply STOP to opt out, HELP for help.',
        'confirmationMessage' => 'Example Corp: You are subscribed to account alerts. Msg frequency varies. Msg & data rates may apply. Reply HELP for help, STOP to opt out.',
        'helpMessage' => 'Example Corp: For help email support@example.com. Reply STOP to opt out.',
        'stopMessage' => 'Example Corp: You have been unsubscribed. Reply HELP for help.',
        'customerCarePhone' => '+14155550100',
        'customerCareEmail' => 'support@example.com',
        'termsAndConditionsUrl' => 'https://example.com/terms',
        'privacyPolicyUrl' => 'https://example.com/privacy',
        'exampleMessages' => [
            'Example Corp: Your support ticket #48213 was updated. View it at https://example.com/support. Reply STOP to opt out.',
        ],
        'useCases' => [
            'ALERTS',
        ],
        'messageTypes' => [
            'SMS',
        ],
        'optIns' => [
            'web' => [
                'url' => "https://example.com/signup",
                'callToAction' => "By checking this box you agree to receive account alerts from Example Corp. Msg frequency varies. Msg & data rates may apply. Reply STOP to opt out, HELP for help.",
            ],
        ],
        'lowVolume' => true,
        'embeddedLink' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;deleteCampaign($id)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the campaign from your account and from the US 10DLC registry and returns `204` with no body. The registry accepts deletion while the campaign is `DRAFT`, `DEREGISTERED` or `REJECTED`; deregister a registered campaign with `POST /10dlc/campaigns/{id}/deregister` first. Delete all of a brand's campaigns before you delete the brand.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->deleteCampaign(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;registerCampaign($id, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Submits the campaign to the US 10DLC registry for review and returns the refreshed campaign. The `stage` moves out of `DRAFT`; poll `GET /10dlc/campaigns/{id}` until it settles at `REGISTERED` or `REJECTED`. The body is optional and carries a `priorityId` from `GET /10dlc/campaigns/priorities` for toll-free campaigns; a value that is not a UUID returns `400`. Submit only when the campaign details are final and you intend to run this program.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->registerCampaign(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
    new CampaignRegisterRequest([
        'priorityId' => '2c9e4b7a-1d3f-4a5b-8c6d-0e9f8a7b6c5d',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$priorityId:** `?string` — ID (UUID) of a priority option from `GET /10dlc/campaigns/priorities`, for toll-free campaigns. A value that is not a UUID returns `400` with `invalid request: priorityId must be a UUID`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;deregisterCampaign($id) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Withdraws a registered campaign from the US 10DLC registry and returns the campaign. Once deregistration completes, traffic on the campaign's numbers is no longer covered by this registration, so move the numbers to another registered campaign first if you keep sending. The request has no body. A deregistered campaign can then be deleted with `DELETE /10dlc/campaigns/{id}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->deregisterCampaign(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;appealCampaign($id, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Asks the US 10DLC registry to reconsider a `REJECTED` campaign and returns the campaign after the appeal is filed. Fix the campaign with `PUT /10dlc/campaigns/{id}` first, then explain what changed in `reason`, which is required (`400` with `invalid request: reason is required` otherwise). Follow the outcome with `GET /10dlc/campaigns/{id}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->appealCampaign(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
    new CampaignAppealRequest([
        'reason' => "Updated the program summary and opt-in call to action to match the brand's registered details.",
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `string` — Required. Explains why the campaign should be reconsidered and what you changed; address every point in the campaign's `rejectionReasons`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;updateCampaignRegistration($id, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Asks the US 10DLC registry to update the set of numbers covered by a registered campaign, without deregistering it. Provide `numbers`, `numberKeys`, or both; if both are empty the call returns `400` with `invalid request: numbers or numberKeys is required`. The response is the campaign; the `numbers` list stored on your account is left as it was. Use `POST` and `DELETE /10dlc/campaigns/{id}/numbers` for incremental changes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->updateCampaignRegistration(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
    new UpdateCampaignRegistrationRequest([
        'body' => new CampaignNumbersRequest([
            'numbers' => [
                '14155550100',
                '14155550101',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `CampaignNumbersRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;campaignNetworkStatuses($id) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the campaign's status at each US carrier network, read live from the US 10DLC registry. Each entry names the network and its `state`, plus the message class, throughput and brand tier when the network reports them. Use it after the campaign reaches `REGISTERED` to see which networks have provisioned it and what throughput they grant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->campaignNetworkStatuses(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;listCampaignNumbers($id) -> ?CampaignNumberList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the numbers attached to the campaign at the US 10DLC registry, as `{"numberPreviews": [...]}`. Each entry gives the number, its country and the registry `numberKey`, which you can pass in `numberKeys` on the number endpoints. Use it to confirm which numbers the registry associates with the campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->listCampaignNumbers(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;addCampaignNumbers($id, $request) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches numbers to the campaign at the US 10DLC registry and adds the `numbers` values to the campaign's `numbers` list on your account. Provide `numbers`, `numberKeys`, or both; if both are empty the call returns `400`. Returns `200` with `{"status":"ok"}`. Attach only numbers on your account that you send this program from.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->addCampaignNumbers(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
    new AddCampaignNumbersRequest([
        'body' => new CampaignNumbersRequest([
            'numbers' => [
                '14155550101',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `CampaignNumbersRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;removeCampaignNumbers($id, $request) -> ?StatusOk</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detaches numbers from the campaign at the US 10DLC registry and removes the `numbers` values from the campaign's `numbers` list on your account. Send `numbers`, `numberKeys`, or both in the `DELETE` request body; if both are empty the call returns `400`. Returns `200` with `{"status":"ok"}`. Messages from a detached number are no longer covered by this campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->removeCampaignNumbers(
    '4c2a0e8d-6b4f-4d2c-b0a8-9e7c5a3f1d24',
    new RemoveCampaignNumbersRequest([
        'body' => new CampaignNumbersRequest([
            'numbers' => [
                '14155550101',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Campaign ID (UUID) returned by `POST /10dlc/campaigns` or `POST /10dlc/campaigns/toll-free`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"campaign not found"}`.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `CampaignNumbersRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;uploadDocument($request) -> ?Document</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Uploads a supporting document or MMS sample file for campaign registration and stores it at the US 10DLC registry. Send `multipart/form-data` with the file in a part named `document` that carries a filename; the file can be up to 10 MB (`413` above that). The response is the document record; reference its `documentId` in a campaign's `supportingDocuments` or `mmsSampleFiles`, and use the same value to download it again.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->uploadDocument(
    new UploadDocumentRequest([
        'document' => File::createFromString("example_document", "example_document"),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;campaigns-&gt;getDocument($id) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Downloads a document you uploaded with `POST /10dlc/documents`. The response body is the file itself, with the file's own `Content-Type` and a `Content-Disposition: attachment` header that carries the original filename. Look the file up by its `documentId`, not by the record `id`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->campaigns->getDocument(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The `documentId` (UUID) returned by `POST /10dlc/documents`, not the record `id`. A value that is not a UUID, or a document that is not on your account, returns `404` with `{"error":"document not found"}`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

