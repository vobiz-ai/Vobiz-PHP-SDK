<?php

namespace Vobiz\Sms;

use Vobiz\Sms\Messages\MessagesClient;
use Vobiz\Sms\Numbers\NumbersClient;
use Vobiz\Sms\Coverage\CoverageClient;
use Vobiz\Sms\Conversations\ConversationsClient;
use Vobiz\Sms\OptOuts\OptOutsClient;
use Vobiz\Sms\Webhooks\WebhooksClient;
use Vobiz\Sms\Broadcasts\BroadcastsClient;
use Vobiz\Sms\RcsSenders\RcsSendersClient;
use Vobiz\Sms\Brands\BrandsClient;
use Vobiz\Sms\Campaigns\CampaignsClient;
use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;

class SmsClient
{
    /**
     * @var MessagesClient $messages
     */
    public MessagesClient $messages;

    /**
     * @var NumbersClient $numbers
     */
    public NumbersClient $numbers;

    /**
     * @var CoverageClient $coverage
     */
    public CoverageClient $coverage;

    /**
     * @var ConversationsClient $conversations
     */
    public ConversationsClient $conversations;

    /**
     * @var OptOutsClient $optOuts
     */
    public OptOutsClient $optOuts;

    /**
     * @var WebhooksClient $webhooks
     */
    public WebhooksClient $webhooks;

    /**
     * @var BroadcastsClient $broadcasts
     */
    public BroadcastsClient $broadcasts;

    /**
     * @var RcsSendersClient $rcsSenders
     */
    public RcsSendersClient $rcsSenders;

    /**
     * @var BrandsClient $brands
     */
    public BrandsClient $brands;

    /**
     * @var CampaignsClient $campaigns
     */
    public CampaignsClient $campaigns;

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
        $this->messages = new MessagesClient($this->client, $this->options);
        $this->numbers = new NumbersClient($this->client, $this->options);
        $this->coverage = new CoverageClient($this->client, $this->options);
        $this->conversations = new ConversationsClient($this->client, $this->options);
        $this->optOuts = new OptOutsClient($this->client, $this->options);
        $this->webhooks = new WebhooksClient($this->client, $this->options);
        $this->broadcasts = new BroadcastsClient($this->client, $this->options);
        $this->rcsSenders = new RcsSendersClient($this->client, $this->options);
        $this->brands = new BrandsClient($this->client, $this->options);
        $this->campaigns = new CampaignsClient($this->client, $this->options);
    }
}
