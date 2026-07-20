<?php

namespace Vobiz;

use Vobiz\Account\AccountClient;
use Vobiz\Balance\BalanceClient;
use Vobiz\LiveCalls\LiveCallsClient;
use Vobiz\Calls\CallsClient;
use Vobiz\Cdr\CdrClient;
use Vobiz\SubAccounts\SubAccountsClient;
use Vobiz\SubAccountKyc\SubAccountKycClient;
use Vobiz\SubAccountKycTestMode\SubAccountKycTestModeClient;
use Vobiz\PhoneNumbers\PhoneNumbersClient;
use Vobiz\Trunks\TrunksClient;
use Vobiz\Conference\ConferenceClient;
use Vobiz\RecordCalls\RecordCallsClient;
use Vobiz\PlayAudio\PlayAudioClient;
use Vobiz\SpeakText\SpeakTextClient;
use Vobiz\Dtmf\DtmfClient;
use Vobiz\AudioStreams\AudioStreamsClient;
use Vobiz\Conferences\ConferencesClient;
use Vobiz\ConferenceMembers\ConferenceMembersClient;
use Vobiz\ConferenceRecording\ConferenceRecordingClient;
use Vobiz\Recordings\RecordingsClient;
use Vobiz\Credentials\CredentialsClient;
use Vobiz\IpAccessControlList\IpAccessControlListClient;
use Vobiz\OriginationUri\OriginationUriClient;
use Vobiz\Applications\ApplicationsClient;
use Vobiz\Endpoints\EndpointsClient;
use Vobiz\PartnerApi\PartnerApiClient;
use Psr\Http\Client\ClientInterface;
use Vobiz\Core\Client\RawClient;

class VobizClient
{
    /**
     * @var AccountClient $account
     */
    public AccountClient $account;

    /**
     * @var BalanceClient $balance
     */
    public BalanceClient $balance;

    /**
     * @var LiveCallsClient $liveCalls
     */
    public LiveCallsClient $liveCalls;

    /**
     * @var CallsClient $calls
     */
    public CallsClient $calls;

    /**
     * @var CdrClient $cdr
     */
    public CdrClient $cdr;

    /**
     * @var SubAccountsClient $subAccounts
     */
    public SubAccountsClient $subAccounts;

    /**
     * @var SubAccountKycClient $subAccountKyc
     */
    public SubAccountKycClient $subAccountKyc;

    /**
     * @var SubAccountKycTestModeClient $subAccountKycTestMode
     */
    public SubAccountKycTestModeClient $subAccountKycTestMode;

    /**
     * @var PhoneNumbersClient $phoneNumbers
     */
    public PhoneNumbersClient $phoneNumbers;

    /**
     * @var TrunksClient $trunks
     */
    public TrunksClient $trunks;

    /**
     * @var ConferenceClient $conference
     */
    public ConferenceClient $conference;

    /**
     * @var RecordCallsClient $recordCalls
     */
    public RecordCallsClient $recordCalls;

    /**
     * @var PlayAudioClient $playAudio
     */
    public PlayAudioClient $playAudio;

    /**
     * @var SpeakTextClient $speakText
     */
    public SpeakTextClient $speakText;

    /**
     * @var DtmfClient $dtmf
     */
    public DtmfClient $dtmf;

    /**
     * @var AudioStreamsClient $audioStreams
     */
    public AudioStreamsClient $audioStreams;

    /**
     * @var ConferencesClient $conferences
     */
    public ConferencesClient $conferences;

    /**
     * @var ConferenceMembersClient $conferenceMembers
     */
    public ConferenceMembersClient $conferenceMembers;

    /**
     * @var ConferenceRecordingClient $conferenceRecording
     */
    public ConferenceRecordingClient $conferenceRecording;

    /**
     * @var RecordingsClient $recordings
     */
    public RecordingsClient $recordings;

    /**
     * @var CredentialsClient $credentials
     */
    public CredentialsClient $credentials;

    /**
     * @var IpAccessControlListClient $ipAccessControlList
     */
    public IpAccessControlListClient $ipAccessControlList;

    /**
     * @var OriginationUriClient $originationUri
     */
    public OriginationUriClient $originationUri;

    /**
     * @var ApplicationsClient $applications
     */
    public ApplicationsClient $applications;

    /**
     * @var EndpointsClient $endpoints
     */
    public EndpointsClient $endpoints;

    /**
     * @var PartnerApiClient $partnerApi
     */
    public PartnerApiClient $partnerApi;

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
     * @param string $username The username to use for authentication.
     * @param string $password The password to use for authentication.
     * @param string $authId
     * @param string $authToken
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $username,
        string $password,
        string $authId,
        string $authToken,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'X-Auth-ID' => $authId,
            'X-Auth-Token' => $authToken,
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Vobiz',
        ];
        $defaultHeaders['Authorization'] = "Basic " . base64_encode($username . ":" . $password);

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->account = new AccountClient($this->client, $this->options);
        $this->balance = new BalanceClient($this->client, $this->options);
        $this->liveCalls = new LiveCallsClient($this->client, $this->options);
        $this->calls = new CallsClient($this->client, $this->options);
        $this->cdr = new CdrClient($this->client, $this->options);
        $this->subAccounts = new SubAccountsClient($this->client, $this->options);
        $this->subAccountKyc = new SubAccountKycClient($this->client, $this->options);
        $this->subAccountKycTestMode = new SubAccountKycTestModeClient($this->client, $this->options);
        $this->phoneNumbers = new PhoneNumbersClient($this->client, $this->options);
        $this->trunks = new TrunksClient($this->client, $this->options);
        $this->conference = new ConferenceClient($this->client, $this->options);
        $this->recordCalls = new RecordCallsClient($this->client, $this->options);
        $this->playAudio = new PlayAudioClient($this->client, $this->options);
        $this->speakText = new SpeakTextClient($this->client, $this->options);
        $this->dtmf = new DtmfClient($this->client, $this->options);
        $this->audioStreams = new AudioStreamsClient($this->client, $this->options);
        $this->conferences = new ConferencesClient($this->client, $this->options);
        $this->conferenceMembers = new ConferenceMembersClient($this->client, $this->options);
        $this->conferenceRecording = new ConferenceRecordingClient($this->client, $this->options);
        $this->recordings = new RecordingsClient($this->client, $this->options);
        $this->credentials = new CredentialsClient($this->client, $this->options);
        $this->ipAccessControlList = new IpAccessControlListClient($this->client, $this->options);
        $this->originationUri = new OriginationUriClient($this->client, $this->options);
        $this->applications = new ApplicationsClient($this->client, $this->options);
        $this->endpoints = new EndpointsClient($this->client, $this->options);
        $this->partnerApi = new PartnerApiClient($this->client, $this->options);
    }
}
