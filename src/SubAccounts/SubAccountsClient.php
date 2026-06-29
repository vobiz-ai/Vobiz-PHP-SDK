<?php

namespace Vobiz\SubAccounts;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\SubAccounts\Types\ListSubaccountsResponse;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\SubAccounts\Requests\CreateSubaccountRequest;
use Vobiz\SubAccounts\Types\CreateSubaccountResponse;
use Vobiz\SubAccounts\Types\RetrieveSubaccountResponse;
use Vobiz\SubAccounts\Requests\UpdateSubaccountRequest;
use Vobiz\SubAccounts\Types\UpdateSubaccountResponse;
use Vobiz\SubAccounts\Types\DeleteSubaccountResponse;

class SubAccountsClient
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
     * Retrieve all sub-accounts under the master account.
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
     * @return ?ListSubaccountsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listSubaccounts(string $authId, ?array $options = null): ?ListSubaccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/accounts/{$authId}/sub-accounts/",
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
                return ListSubaccountsResponse::fromJson($json);
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
     * Create a new sub-account under the master account.
     *
     * Set `kyc_mode` to control how the sub-account is verified:
     *
     * - `personal_use` *(default)* — the sub-account inherits the parent's
     *   KYC; no separate verification is required.
     * - `customer_use` — the sub-account must complete its own KYC before it
     *   can place calls. A fresh `customer_use` sub-account is returned with
     *   `kyc_calls_blocked: true`. `customer_use` **requires** `email`.
     *
     * @param string $authId Your account Auth ID
     * @param CreateSubaccountRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateSubaccountResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function createSubaccount(string $authId, CreateSubaccountRequest $request, ?array $options = null): ?CreateSubaccountResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/accounts/{$authId}/sub-accounts/",
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
                return CreateSubaccountResponse::fromJson($json);
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
     * Retrieve details of a specific sub-account.
     *
     * @param string $authId Your account Auth ID
     * @param string $subAuthId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RetrieveSubaccountResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function retrieveSubaccount(string $authId, string $subAuthId, ?array $options = null): ?RetrieveSubaccountResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/accounts/{$authId}/sub-accounts/{$subAuthId}",
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
                return RetrieveSubaccountResponse::fromJson($json);
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
     * Update the name or status of a sub-account, or change its `kyc_mode`.
     *
     * Promoting an existing sub-account to `customer_use` requires the
     * sub-account to already have an `email` (otherwise `400`). On any
     * `kyc_mode` change, `kyc_calls_blocked` is re-derived from the
     * sub-account's current KYC state.
     *
     * @param string $authId Your account Auth ID
     * @param string $subAuthId
     * @param UpdateSubaccountRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSubaccountResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function updateSubaccount(string $authId, string $subAuthId, UpdateSubaccountRequest $request = new UpdateSubaccountRequest(), ?array $options = null): ?UpdateSubaccountResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/accounts/{$authId}/sub-accounts/{$subAuthId}",
                    method: HttpMethod::PUT,
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
                return UpdateSubaccountResponse::fromJson($json);
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
     * Permanently delete a sub-account and revoke its credentials.
     *
     * @param string $authId Your account Auth ID
     * @param string $subAuthId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteSubaccountResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function deleteSubaccount(string $authId, string $subAuthId, ?array $options = null): ?DeleteSubaccountResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/accounts/{$authId}/sub-accounts/{$subAuthId}",
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
                return DeleteSubaccountResponse::fromJson($json);
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
