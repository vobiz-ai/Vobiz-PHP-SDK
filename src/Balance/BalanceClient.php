<?php

namespace Vobiz\Balance;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\Balance\Types\GetBalanceResponse;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\Balance\Requests\ListTransactionsRequest;
use Vobiz\Balance\Types\ListTransactionsResponse;
use Vobiz\Balance\Types\ListTransactionReferenceTypesResponse;

class BalanceClient
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
     * Retrieve the current account balance for a specific currency.
     *
     * @param string $authId Your account Auth ID
     * @param string $currency Currency code (e.g. INR, USD)
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetBalanceResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function getBalance(string $authId, string $currency, ?array $options = null): ?GetBalanceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/balance/{$currency}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetBalanceResponse::fromJson($json);
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
     * Retrieve paginated transaction history for the account, ordered by
     * `created_at` descending. Filter to a single day by setting `from_date`
     * and `to_date` to the same date - a bare `YYYY-MM-DD` in `to_date` is
     * expanded to `23:59:59`, so both bounds are inclusive. Bare dates resolve
     * in the server timezone (UTC); send an explicit offset such as
     * `2026-08-28T00:00:00+05:30` to pin a local calendar day.
     *
     * `limit` and `offset` are not supported - unknown parameters are silently
     * dropped. `total` and `summary` are computed over the whole filtered set
     * and ignore pagination, so `per_page=1` returns full-window totals.
     *
     * @param string $authId Your account Auth ID
     * @param ListTransactionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListTransactionsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listTransactions(string $authId, ListTransactionsRequest $request = new ListTransactionsRequest(), ?array $options = null): ?ListTransactionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        if ($request->fromDate != null) {
            $query['from_date'] = $request->fromDate;
        }
        if ($request->toDate != null) {
            $query['to_date'] = $request->toDate;
        }
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->currency != null) {
            $query['currency'] = $request->currency;
        }
        if ($request->referenceType != null) {
            $query['reference_type'] = $request->referenceType;
        }
        if ($request->description != null) {
            $query['description'] = $request->description;
        }
        if ($request->reference != null) {
            $query['reference'] = $request->reference;
        }
        if ($request->transactionId != null) {
            $query['transaction_id'] = $request->transactionId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/transactions",
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
                return ListTransactionsResponse::fromJson($json);
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
     * Returns the distinct `reference_type` values present on the account's ledger. Use it to discover valid values for the `reference_type` filter on the transactions endpoint.
     *
     * @param string $authId Your account Auth ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListTransactionReferenceTypesResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listTransactionReferenceTypes(string $authId, ?array $options = null): ?ListTransactionReferenceTypesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/transactions/reference-types",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListTransactionReferenceTypesResponse::fromJson($json);
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
}
