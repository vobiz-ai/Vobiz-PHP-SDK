<?php

namespace Vobiz\Sms\Brands;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\Sms\Types\Brand;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use Vobiz\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\Sms\Types\CreateBrandRequest;
use Vobiz\Sms\Brands\Requests\UpdateBrandRequest;
use Vobiz\Sms\Types\BrandRegistrarStatus;
use Vobiz\Sms\Types\BrandAuthRequested;
use Vobiz\Sms\Brands\Requests\BrandVetRequest;
use Vobiz\Sms\Brands\Requests\ListBrandVetsRequest;
use Vobiz\Sms\Types\BrandVetList;

class BrandsClient
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
     * Returns every brand on your account as a bare JSON array, newest first. The list is not paginated and reads the records stored on your account without contacting the registry; deleted brands are left out. Call `GET /10dlc/brands/{id}` for the latest registry state of one brand.
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<Brand>
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listBrands(?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands",
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
                return JsonDecoder::decodeArray($json, [Brand::class]); // @phpstan-ignore-line
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
     * Creates a brand, the business identity that US carriers associate with your 10DLC traffic, and mirrors it to the US 10DLC registry in `DRAFT` stage. `name` and `brandType` are required; send every other field your business has, because the registry reviews them when you register. Nothing is submitted for review until you call `POST /10dlc/brands/{id}/register`. Pass a `referenceId` so that a retried request (for example after a `502`) reconciles to the same brand instead of creating a second one. Next, register the brand, then create a campaign under it with `POST /10dlc/campaigns`.
     *
     * @param CreateBrandRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Brand
     * @throws VobizException
     * @throws VobizApiException
     */
    public function createBrand(CreateBrandRequest $request, ?array $options = null): ?Brand
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands",
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
                return Brand::fromJson($json);
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
     * Returns one brand after refreshing its `stage`, `registrationStatus`, `brandIdentityStatus` and `rejectionReasons` from the US 10DLC registry. The refresh is best-effort: if the registry is slow to answer, you get the stored record and `lastSyncedAt` tells you how fresh it is. Poll this endpoint (or listen for the `10dlc.brand.updated` WebSocket event) after registering to follow the review.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Brand
     * @throws VobizException
     * @throws VobizApiException
     */
    public function getBrand(string $id, ?array $options = null): ?Brand
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}",
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
                return Brand::fromJson($json);
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
     * Replaces the brand with the body you send and pushes the change to the US 10DLC registry. This is a full replacement, not a patch: send the same shape as create, including `name` and `brandType`, and any field you leave out is cleared. `referenceId` is ignored on update. Use it to correct a brand before registering it, or to fix the points listed in `rejectionReasons` before resubmitting.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param UpdateBrandRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Brand
     * @throws VobizException
     * @throws VobizApiException
     */
    public function updateBrand(string $id, UpdateBrandRequest $request, ?array $options = null): ?Brand
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}",
                    method: HttpMethod::PUT,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Brand::fromJson($json);
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
     * Deletes the brand from your account and from the US 10DLC registry and returns `204` with no body. A brand that still owns campaigns returns `409` with `conflict: brand still has N campaign(s); delete them first`, so delete or deregister its campaigns first. Deletion cannot be undone; a new brand needs a new registration.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
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
    public function deleteBrand(string $id, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}",
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
     * Submits the brand to the US 10DLC registry for identity verification. The brand moves from `DRAFT` to `SUBMITTED` and `registrationStatus` starts tracking the registrar's decision (`PENDING`, then `ACTIVE` or `REJECTED`). The request has no body and returns the refreshed brand. Submit only when the brand details are final and you intend to register this business. Follow progress with `GET /10dlc/brands/{id}` or `GET /10dlc/brands/{id}/registrar-statuses`.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Brand
     * @throws VobizException
     * @throws VobizApiException
     */
    public function registerBrand(string $id, ?array $options = null): ?Brand
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}/register",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Brand::fromJson($json);
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
     * Returns the brand's state at each registrar that has reviewed it, read live from the US 10DLC registry. Each entry carries the registrar's `state` and, when the registrar reports them, the identity result, the authentication status and a rejection reason. An empty array means no registrar has recorded a state yet. Use it to see why a brand is pending or rejected.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<BrandRegistrarStatus>
     * @throws VobizException
     * @throws VobizApiException
     */
    public function brandRegistrarStatuses(string $id, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}/registrar-statuses",
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
                return JsonDecoder::decodeArray($json, [BrandRegistrarStatus::class]); // @phpstan-ignore-line
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
     * Starts the registry's brand authentication for a brand whose `brandType` is `TENDLC_PUBLIC_COMPANY`. The registry sends a two-factor verification request to the brand's `businessContactEmail`, and the brand shows `registrationStatus` `PENDING_2FA` until the contact completes it. The request has no body and returns `202` with `{"status":"requested"}`. Any other brand type returns `400` with `invalid request: brand authentication is only available for TENDLC_PUBLIC_COMPANY brands`.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BrandAuthRequested
     * @throws VobizException
     * @throws VobizApiException
     */
    public function brandAuthVerification(string $id, ?array $options = null): ?BrandAuthRequested
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}/brand-auth-verification",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return BrandAuthRequested::fromJson($json);
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
     * Asks the registry to send the brand-authentication verification again to the brand's `businessContactEmail`. Use it when a `TENDLC_PUBLIC_COMPANY` brand is `PENDING_2FA` and the contact did not receive or let the first request expire. The request has no body and returns `202` with `{"status":"requested"}`. Any other brand type returns `400`.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BrandAuthRequested
     * @throws VobizException
     * @throws VobizApiException
     */
    public function resend2Fa(string $id, ?array $options = null): ?BrandAuthRequested
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}/resend-2fa",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return BrandAuthRequested::fromJson($json);
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
     * Requests an external vet of a registered brand from the US 10DLC registry. A successful vet can raise the brand's trust tier and, with it, the throughput carriers grant its campaigns. `type` defaults to `STANDARD`; any value other than `STANDARD`, `ENHANCED` or `POLITICAL` returns `400`. Every call files a new vetting request, so send it only when you intend to. The response is the registry's vetting record, returned as received; list past vets with `GET /10dlc/brands/{id}/vets`.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param BrandVetRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws VobizException
     * @throws VobizApiException
     */
    public function vetBrand(string $id, BrandVetRequest $request = new BrandVetRequest(), ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}/vet",
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
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
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
     * Returns the brand's vetting records from the US 10DLC registry, one page at a time. The body is `{"results": [...], "paging": {...}}`, where each result is a registry vetting record passed through as received. `page` must be 0 or more and `size` between 0 and 100; other values return `400` with `page must be >= 0 and size between 0 and 100`.
     *
     * @param string $id Brand ID (UUID) returned by `POST /10dlc/brands`. An unknown ID, an ID from another account, or a value that is not a UUID returns `404` with `{"error":"brand not found"}`.
     * @param ListBrandVetsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BrandVetList
     * @throws VobizException
     * @throws VobizApiException
     */
    public function listBrandVets(string $id, ListBrandVetsRequest $request = new ListBrandVetsRequest(), ?array $options = null): ?BrandVetList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->size != null) {
            $query['size'] = $request->size;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sms/10dlc/brands/{$id}/vets",
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
                return BrandVetList::fromJson($json);
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
