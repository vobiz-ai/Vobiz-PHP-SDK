<?php

namespace Vobiz\BulkOperations;

use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;
use Vobiz\BulkOperations\Requests\BulkExportRecordingsRequest;
use Vobiz\BulkOperations\Types\BulkExportRecordingsResponse;
use Vobiz\Exceptions\VobizException;
use Vobiz\Exceptions\VobizApiException;
use Vobiz\Core\Json\JsonApiRequest;
use Vobiz\Environments;
use Vobiz\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class BulkOperationsClient
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
     * Queue a bulk export of the recordings matching your filter criteria. The request is
     * validated and accepted for background processing, and the resulting archive is emailed
     * as a download link to every address in `recipient.customer_account`. The archive is
     * typically available within 15-60 minutes depending on volume.
     *
     * Results are delivered by email only; the export runs to completion in the background
     * after the `202` response.
     *
     * One export runs at a time per account. While an export is in progress, further requests
     * return `403`.
     *
     * Filter rules:
     * - Use either `from`/`to` or the `recording_storage_duration*` filters, not both.
     * - Use one of `__gt` or `__gte`, and one of `__lt` or `__lte`.
     * - When using range filters (`__gte`/`__lte`), provide both.
     * - Maximum date range is 1 year (366 days); maximum storage duration range is 30 days.
     * - The additional filters (`from_number`, `to_number`, `call_uuid`, `conference_name`,
     *   `recording_format`, `recording_id`) apply when the range is 30 days or less.
     *
     * @param string $authId Your account Auth ID
     * @param BulkExportRecordingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BulkExportRecordingsResponse
     * @throws VobizException
     * @throws VobizApiException
     */
    public function bulkExportRecordings(string $authId, BulkExportRecordingsRequest $request, ?array $options = null): ?BulkExportRecordingsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "api/v1/Account/{$authId}/export/recording/",
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
                return BulkExportRecordingsResponse::fromJson($json);
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
