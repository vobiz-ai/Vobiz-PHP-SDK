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

Retrieve paginated transaction history for the account.
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
    new ListTransactionsRequest([]),
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

**$enabled:** `?bool` 
    
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

**$webhookUrl:** `?string` — HTTPS endpoint VoBiz POSTs the KYC result to. Omit it and no callbacks are sent.
    
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

<details><summary><code>$client-&gt;phoneNumbers-&gt;unrentNumber($authId, $e164, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Release a phone number from your account. By default, the number enters
`pending_release` for a 24-hour cooldown. You can cancel the release during
that window. Set `immediate=true` to skip the cooldown; an immediate release
cannot be cancelled.
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
    '919876543210',
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

**$e164:** `string` — Phone number in E.164 format (without the +)
    
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
refunded. Any trunk or voice application detached by the release is not
re-attached automatically.
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

**$trunkStatus:** `?string` — Trunk status - `enabled` or `disabled` (note: not `active`).
    
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

**$trunkStatus:** `?string` 
    
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
        'name' => 'Primary SBC',
        'sipUri' => 'sip:sbc.example.com',
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

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$sipUri:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$priority:** `int` 
    
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
        'name' => 'name',
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

**$uriId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$priority:** `int` 
    
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

**$appName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$defaultNumberApp:** `bool` 
    
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
        'application' => 12345678,
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

**$application:** `int` 
    
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

Creates a new customer sub-account under your partner account. VoBiz
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
    'MA_ZKITB8Z2',
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

Triggers VoBiz to email a KYC link to the customer. KYC is OTP-based
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
        'accountAuthId' => 'MA_ZKITB8Z2',
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

**$webhookUrl:** `?string` — VoBiz POSTs the KYC result here.
    
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

