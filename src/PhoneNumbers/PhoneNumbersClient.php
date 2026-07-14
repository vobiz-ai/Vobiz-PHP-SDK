<?php

namespace Vobiz\PhoneNumbers;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\PhoneNumbers\Requests\ListNumbersRequest;
use Vobiz\PhoneNumbers\Types\ListNumbersResponse;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\PhoneNumbers\Requests\ListInventoryNumbersRequest;
use Vobiz\PhoneNumbers\Types\ListInventoryNumbersResponse;
use Vobiz\PhoneNumbers\Requests\PurchaseFromInventoryRequest;
use Vobiz\Core\Json\JsonDecoder;
use Vobiz\PhoneNumbers\Requests\AssignNumberToTrunkRequest;
use Vobiz\PhoneNumbers\Requests\GetNumberHealthRequest;
use Vobiz\PhoneNumbers\Types\GetNumberHealthResponse;
use Vobiz\PhoneNumbers\Requests\AssignDidToSubaccountRequest;
use Vobiz\PhoneNumbers\Requests\UnassignDidFromSubaccountRequest;

class PhoneNumbersClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * List all phone numbers on your account.
     *
     * @param string $authId Your account Auth ID
     * @param ListNumbersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListNumbersResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listNumbers(string $authId, ListNumbersRequest $request = new ListNumbersRequest(), ?array $options = null): ?ListNumbersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/numbers",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListNumbersResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VobizException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Release a phone number from your account.
     *
     * @param string $authId Your account Auth ID
     * @param string $e164 Phone number in E.164 format (without the +)
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws VobizException
     * @throws VobizApiException
     */
    public function unrentNumber(string $authId, string $e164, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/numbers/{$e164}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Browse available phone numbers in inventory that are not assigned to
     * any account. Only numbers with `status='active'` and `auth_id=NULL`
     * are returned. These numbers are ready to be purchased.
     *
     * @param string $authId Your account Auth ID
     * @param ListInventoryNumbersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListInventoryNumbersResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listInventoryNumbers(string $authId, ListInventoryNumbersRequest $request = new ListInventoryNumbersRequest(), ?array $options = null): ?ListInventoryNumbersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->country != null) {
            $query['country'] = $request->country;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->exclude != null) {
            $query['exclude'] = $request->exclude;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/inventory/numbers",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListInventoryNumbersResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VobizException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Purchase a phone number from inventory and assign it to your account.
     * Debits your account balance for the setup fee and monthly fee. For
     * sub-accounts (SA_), the parent master account (MA_) is charged.
     *
     * @param string $authId Your account Auth ID
     * @param PurchaseFromInventoryRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws VobizException
     * @throws VobizApiException
     */
    public function purchaseFromInventory(string $authId, PurchaseFromInventoryRequest $request, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/numbers/purchase-from-inventory",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeMixed($json);
            }
        } catch (JsonException $e) {
            throw new VobizException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Assign a phone number to a specific SIP trunk. Once assigned, all
     * inbound calls to that phone number will be routed through the
     * designated trunk. The phone number must be URL-encoded; use `%2B`
     * instead of `+` (e.g., `%2B912271264217`).
     *
     * @param string $authId Your account Auth ID
     * @param string $phoneNumber The phone number to assign, URL-encoded (use %2B instead of +).
     * @param AssignNumberToTrunkRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws VobizException
     * @throws VobizApiException
     */
    public function assignNumberToTrunk(string $authId, string $phoneNumber, AssignNumberToTrunkRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/numbers/{$phoneNumber}/assign",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Remove the assignment between a phone number and a SIP trunk. After
     * unassignment, the number remains in your account inventory but will
     * no longer route inbound calls through the previously assigned trunk.
     * URL-encode the phone number (use `%2B` instead of `+`).
     *
     * @param string $authId Your account Auth ID
     * @param string $phoneNumber The phone number to unassign, URL-encoded (use %2B instead of +).
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws VobizException
     * @throws VobizApiException
     */
    public function unassignNumberFromTrunk(string $authId, string $phoneNumber, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/numbers/{$phoneNumber}/assign",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns the health & analytics dashboard for one of your numbers: current
     * status, spam flag, and call metrics over the selected window (total and
     * answered calls, answer rate, minutes, average duration) plus a per-period
     * time series of snapshots.
     *
     * @param string $authId Your account Auth ID
     * @param string $e164 The number in E.164, URL-encoded (use %2B instead of +).
     * @param GetNumberHealthRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetNumberHealthResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function getNumberHealth(string $authId, string $e164, GetNumberHealthRequest $request = new GetNumberHealthRequest(), ?array $options = null): ?GetNumberHealthResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->granularity != null) {
            $query['granularity'] = $request->granularity;
        }
        if ($request->days != null) {
            $query['days'] = $request->days;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/account/{$authId}/numbers/{$e164}/health",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetNumberHealthResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VobizException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Assign a parent-pool DID to a sub-account.
     *
     * @param string $authId Your account Auth ID
     * @param string $e164 The number in E.164, URL-encoded (use %2B instead of +).
     * @param AssignDidToSubaccountRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws VobizException
     * @throws VobizApiException
     */
    public function assignDidToSubaccount(string $authId, string $e164, AssignDidToSubaccountRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/account/{$authId}/numbers/{$e164}/assign-subaccount",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Move the DID back to the parent pool.
     *
     * A **15-day cool-off** is enforced: if the DID had a call within the last
     * 15 days, the request is rejected with `409` and a
     * `did_cool_off_in_effect` error that includes `cool_off_until` and
     * `cool_off_remaining_seconds`. Never-used DIDs (`last_call_at` is `NULL`)
     * move back immediately.
     *
     * Admins can bypass the cool-off with `?force=true` (see below); the
     * bypass writes a `did_assignment_audit` row and requires an
     * admin-role account.
     *
     * @param string $authId Your account Auth ID
     * @param string $e164 The number in E.164, URL-encoded (use %2B instead of +).
     * @param UnassignDidFromSubaccountRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws VobizException
     * @throws VobizApiException
     */
    public function unassignDidFromSubaccount(string $authId, string $e164, UnassignDidFromSubaccountRequest $request = new UnassignDidFromSubaccountRequest(), ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->force != null) {
            $query['force'] = $request->force;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/account/{$authId}/numbers/{$e164}/assign-subaccount",
                    method: HttpMethod::DELETE,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new VobizException(message: $e->getMessage(), previous: $e);
        }
        throw new VobizApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
