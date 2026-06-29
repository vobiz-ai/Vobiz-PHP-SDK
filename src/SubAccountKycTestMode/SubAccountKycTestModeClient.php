<?php

namespace Vobiz\SubAccountKycTestMode;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\SubAccountKycTestMode\Requests\MockVerifySubaccountPanRequest;
use Vobiz\Types\KycVerificationResult;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vobiz\SubAccountKycTestMode\Requests\MockVerifySubaccountGstRequest;
use Vobiz\SubAccountKycTestMode\Requests\MockSearchSubaccountCinRequest;
use Vobiz\Core\Json\JsonDecoder;
use Vobiz\SubAccountKycTestMode\Requests\MockConfirmSubaccountCinRequest;
use Vobiz\SubAccountKycTestMode\Requests\MockSubaccountDigilockerInitiateRequest;
use Vobiz\SubAccountKycTestMode\Requests\MockSubaccountDigilockerVerifyRequest;
use Vobiz\SubAccountKycTestMode\Requests\MockFinalizePendingKycRequest;

class SubAccountKycTestModeClient
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
     * Mock PAN verification — never hits the provider. Magic `pan` inputs:
     *
     * | Input | Outcome |
     * |---|---|
     * | `TESTSUCCESS0001` | verified |
     * | `TESTFAIL0001` | failed |
     * | `TESTERROR0001` | HTTP 500 |
     * | `TESTPENDING001` | pending (finalize as verified) |
     * | `TESTPENDING_FAIL` | pending (finalize as failed) |
     *
     * Persists a real `kyc_verifications` row and recomputes `kyc_status`.
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockVerifySubaccountPanRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?KycVerificationResult
     * @throws VobizException
     * @throws VobizApiException
     */
    public function mockVerifySubaccountPan(string $subAuthId, MockVerifySubaccountPanRequest $request, ?array $options = null): ?KycVerificationResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/verify-pan",
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
                return KycVerificationResult::fromJson($json);
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
     * Mock GST verification. Same magic-input matrix as [Mock verify PAN](#operation/mock-verify-subaccount-pan).
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockVerifySubaccountGstRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?KycVerificationResult
     * @throws VobizException
     * @throws VobizApiException
     */
    public function mockVerifySubaccountGst(string $subAuthId, MockVerifySubaccountGstRequest $request, ?array $options = null): ?KycVerificationResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/verify-gst",
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
                return KycVerificationResult::fromJson($json);
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
     * Returns deterministic fake company matches.
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockSearchSubaccountCinRequest $request
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
    public function mockSearchSubaccountCin(string $subAuthId, MockSearchSubaccountCinRequest $request, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/cin/search",
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
     * Succeeds when `selected_cin` starts with `U72900KA2024PTC123456`.
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockConfirmSubaccountCinRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?KycVerificationResult
     * @throws VobizException
     * @throws VobizApiException
     */
    public function mockConfirmSubaccountCin(string $subAuthId, MockConfirmSubaccountCinRequest $request, ?array $options = null): ?KycVerificationResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/cin/confirm",
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
                return KycVerificationResult::fromJson($json);
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
     * Returns a deterministic `access_request_id`.
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockSubaccountDigilockerInitiateRequest $request
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
    public function mockSubaccountDigilockerInitiate(string $subAuthId, MockSubaccountDigilockerInitiateRequest $request, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/digilocker/initiate",
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
     * `access_request_id` `MOCK_AR_SUCCESS` → verified; `MOCK_AR_FAIL` → failed.
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockSubaccountDigilockerVerifyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?KycVerificationResult
     * @throws VobizException
     * @throws VobizApiException
     */
    public function mockSubaccountDigilockerVerify(string $subAuthId, MockSubaccountDigilockerVerifyRequest $request, ?array $options = null): ?KycVerificationResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/digilocker/verify",
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
                return KycVerificationResult::fromJson($json);
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
     * Promotes the most recent **pending** mock verification of the given
     * type to a terminal outcome — this drives the async (`TESTPENDING…`)
     * path without webhooks. `verification_type` ∈ `pan | aadhaar | gst | cin`;
     * `outcome` ∈ `verified | failed`.
     *
     * @param string $subAuthId The sub-account's Auth ID.
     * @param MockFinalizePendingKycRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?KycVerificationResult
     * @throws VobizException
     * @throws VobizApiException
     */
    public function mockFinalizePendingKyc(string $subAuthId, MockFinalizePendingKycRequest $request, ?array $options = null): ?KycVerificationResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/sub-accounts/test/{$subAuthId}/kyc/finalize-pending",
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
                return KycVerificationResult::fromJson($json);
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
