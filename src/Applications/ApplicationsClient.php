<?php

namespace Vobiz\Applications;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\Applications\Requests\ListApplicationsRequest;
use Vobiz\Applications\Types\ListApplicationsResponse;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\Applications\Requests\CreateApplicationRequest;
use Vobiz\Applications\Types\CreateApplicationResponse;
use Vobiz\Applications\Types\RetrieveApplicationResponse;
use Vobiz\Applications\Requests\UpdateApplicationRequest;
use Vobiz\Applications\Types\UpdateApplicationResponse;
use Vobiz\Core\Json\JsonDecoder;

class ApplicationsClient
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
     * Get details of all applications created under your Vobiz account.
     *
     * @param string $authId Your account Auth ID
     * @param ListApplicationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListApplicationsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listApplications(string $authId, ListApplicationsRequest $request = new ListApplicationsRequest(), ?array $options = null): ?ListApplicationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Application/",
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
                return ListApplicationsResponse::fromJson($json);
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
     * Creates an Application with webhook URLs for call handling.
     * Creating an application is usually a first step, after which you
     * attach the application to either a number or an endpoint.
     *
     * @param string $authId Your account Auth ID
     * @param CreateApplicationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateApplicationResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function createApplication(string $authId, CreateApplicationRequest $request, ?array $options = null): ?CreateApplicationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Application/",
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
                return CreateApplicationResponse::fromJson($json);
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
     * Get details of a particular application by passing the app_id.
     *
     * @param string $authId Your account Auth ID
     * @param string $appId Unique identifier for the application
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RetrieveApplicationResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function retrieveApplication(string $authId, string $appId, ?array $options = null): ?RetrieveApplicationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Application/{$appId}/",
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
                return RetrieveApplicationResponse::fromJson($json);
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
     * Modify an application using this API. You can update any subset of
     * fields (partial update). Fields not provided will remain unchanged.
     *
     * @param string $authId Your account Auth ID
     * @param string $appId
     * @param UpdateApplicationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateApplicationResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function updateApplication(string $authId, string $appId, UpdateApplicationRequest $request, ?array $options = null): ?UpdateApplicationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Application/{$appId}/",
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
                return UpdateApplicationResponse::fromJson($json);
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
     * Permanently delete an Application. If the application is associated
     * with phone numbers, the deletion may be blocked unless those
     * associations are removed first.
     *
     * @param string $authId Your account Auth ID
     * @param string $appId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?string
     * @throws VobizException
     * @throws VobizApiException
     */
    public function deleteApplication(string $authId, string $appId, ?array $options = null): ?string
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Application/{$appId}/",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeString($json);
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
