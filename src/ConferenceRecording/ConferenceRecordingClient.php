<?php

namespace Vobiz\ConferenceRecording;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\ConferenceRecording\Requests\StartConferenceRecordingRequest;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use Psr\Http\Client\ClientExceptionInterface;

class ConferenceRecordingClient
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
     * Begin recording all audio in a conference room.
     *
     * @param string $authId Your account Auth ID
     * @param string $conferenceName
     * @param StartConferenceRecordingRequest $request
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
    public function startConferenceRecording(string $authId, string $conferenceName, StartConferenceRecordingRequest $request = new StartConferenceRecordingRequest(), ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Conference/{$conferenceName}/Record/",
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
     * Stop recording a conference room.
     *
     * @param string $authId Your account Auth ID
     * @param string $conferenceName
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
    public function stopConferenceRecording(string $authId, string $conferenceName, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/Conference/{$conferenceName}/Record/",
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
}
