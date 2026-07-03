<?php

namespace Vobiz\Cdr;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\Cdr\Requests\ListCdrsRequest;
use Vobiz\Cdr\Types\ListCdrsResponse;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonSerializer;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\Cdr\Requests\SearchCdrsRequest;
use Vobiz\Cdr\Types\SearchCdrsResponse;
use Vobiz\Cdr\Requests\ListRecentCdrsRequest;
use Vobiz\Cdr\Types\ListRecentCdrsResponse;
use Vobiz\Cdr\Requests\ExportCdrsRequest;
use Vobiz\Cdr\Types\GetCdrResponse;

class CdrClient
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
     * Returns all CDRs for your account. Supports filtering by phone numbers,
     * date range, call direction, duration, and pagination.
     *
     * @param string $authId Your account Auth ID
     * @param ListCdrsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCdrsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listCdrs(string $authId, ListCdrsRequest $request = new ListCdrsRequest(), ?array $options = null): ?ListCdrsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fromNumber != null) {
            $query['from_number'] = $request->fromNumber;
        }
        if ($request->toNumber != null) {
            $query['to_number'] = $request->toNumber;
        }
        if ($request->startDate != null) {
            $query['start_date'] = JsonSerializer::serializeDate($request->startDate);
        }
        if ($request->endDate != null) {
            $query['end_date'] = JsonSerializer::serializeDate($request->endDate);
        }
        if ($request->callDirection != null) {
            $query['call_direction'] = $request->callDirection;
        }
        if ($request->minDuration != null) {
            $query['min_duration'] = $request->minDuration;
        }
        if ($request->sipCallId != null) {
            $query['sip_call_id'] = $request->sipCallId;
        }
        if ($request->bridgeUuid != null) {
            $query['bridge_uuid'] = $request->bridgeUuid;
        }
        if ($request->hangupCause != null) {
            $query['hangup_cause'] = $request->hangupCause;
        }
        if ($request->hangupDisposition != null) {
            $query['hangup_disposition'] = $request->hangupDisposition;
        }
        if ($request->context != null) {
            $query['context'] = $request->context;
        }
        if ($request->campaignId != null) {
            $query['campaign_id'] = $request->campaignId;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
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
                    path: "api/v1/Account/{$authId}/cdr",
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
                return ListCdrsResponse::fromJson($json);
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
     * Identical filters to the list endpoint, but the response also includes a
     * `filter_summary` object describing the active filters applied.
     *
     * @param string $authId Your account Auth ID
     * @param SearchCdrsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SearchCdrsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function searchCdrs(string $authId, SearchCdrsRequest $request = new SearchCdrsRequest(), ?array $options = null): ?SearchCdrsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fromNumber != null) {
            $query['from_number'] = $request->fromNumber;
        }
        if ($request->toNumber != null) {
            $query['to_number'] = $request->toNumber;
        }
        if ($request->startDate != null) {
            $query['start_date'] = JsonSerializer::serializeDate($request->startDate);
        }
        if ($request->endDate != null) {
            $query['end_date'] = JsonSerializer::serializeDate($request->endDate);
        }
        if ($request->callDirection != null) {
            $query['call_direction'] = $request->callDirection;
        }
        if ($request->minDuration != null) {
            $query['min_duration'] = $request->minDuration;
        }
        if ($request->sipCallId != null) {
            $query['sip_call_id'] = $request->sipCallId;
        }
        if ($request->bridgeUuid != null) {
            $query['bridge_uuid'] = $request->bridgeUuid;
        }
        if ($request->hangupCause != null) {
            $query['hangup_cause'] = $request->hangupCause;
        }
        if ($request->hangupDisposition != null) {
            $query['hangup_disposition'] = $request->hangupDisposition;
        }
        if ($request->context != null) {
            $query['context'] = $request->context;
        }
        if ($request->campaignId != null) {
            $query['campaign_id'] = $request->campaignId;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
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
                    path: "api/v1/Account/{$authId}/cdr/search",
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
                return SearchCdrsResponse::fromJson($json);
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
     * Returns the most recent CDRs for your account without requiring a date range.
     * Default 20 records; use `limit` to retrieve more.
     *
     * @param string $authId Your account Auth ID
     * @param ListRecentCdrsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListRecentCdrsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listRecentCdrs(string $authId, ListRecentCdrsRequest $request = new ListRecentCdrsRequest(), ?array $options = null): ?ListRecentCdrsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/cdr/recent",
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
                return ListRecentCdrsResponse::fromJson($json);
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
     * Returns CDR data as a downloadable CSV file. Same filters as the list endpoint.
     *
     * **Note:** Do NOT send `Accept: application/json` on this endpoint - the response is `text/csv`.
     *
     * @param string $authId Your account Auth ID
     * @param ExportCdrsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return string
     * @throws VobizException
     * @throws VobizApiException
     */
    public function exportCdrs(string $authId, ExportCdrsRequest $request = new ExportCdrsRequest(), ?array $options = null): string
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fromNumber != null) {
            $query['from_number'] = $request->fromNumber;
        }
        if ($request->toNumber != null) {
            $query['to_number'] = $request->toNumber;
        }
        if ($request->startDate != null) {
            $query['start_date'] = JsonSerializer::serializeDate($request->startDate);
        }
        if ($request->endDate != null) {
            $query['end_date'] = JsonSerializer::serializeDate($request->endDate);
        }
        if ($request->callDirection != null) {
            $query['call_direction'] = $request->callDirection;
        }
        if ($request->minDuration != null) {
            $query['min_duration'] = $request->minDuration;
        }
        if ($request->sipCallId != null) {
            $query['sip_call_id'] = $request->sipCallId;
        }
        if ($request->bridgeUuid != null) {
            $query['bridge_uuid'] = $request->bridgeUuid;
        }
        if ($request->hangupCause != null) {
            $query['hangup_cause'] = $request->hangupCause;
        }
        if ($request->hangupDisposition != null) {
            $query['hangup_disposition'] = $request->hangupDisposition;
        }
        if ($request->context != null) {
            $query['context'] = $request->context;
        }
        if ($request->campaignId != null) {
            $query['campaign_id'] = $request->campaignId;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/cdr/export",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return $response->getBody()->getContents();
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
     * Retrieve the CDR for a specific completed call using its `call_id`.
     * Useful when you have a `call_id` from a callback or previous API response.
     *
     * @param string $authId Your account Auth ID
     * @param string $callId The unique call ID of the completed call.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetCdrResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function getCdr(string $authId, string $callId, ?array $options = null): ?GetCdrResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/cdr/{$callId}",
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
                return GetCdrResponse::fromJson($json);
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
