<?php

namespace Morannon\Nexmo;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Morannon\Gateway\AbstractGateway;
use Morannon\Response\BaseSentResponse;
use Morannon\SMS\SMSInterface;

class NexmoGateway extends AbstractGateway
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * {@inheritdoc}
     */
    public function sendSMS(SMSInterface $sms)
    {
        if (null === $this->httpClient) {
            $this->httpClient = new Client();
        }

        $data = $this->httpClient->post(
            $this->buildUrlString($this->getApiBaseUrl(), '/sms/json'),
            array(
                'json' => array(
                    'api_key' => $this->getApiUser(),
                    'api_secret' => $this->getApiToken(),
                    'type' => 'text',
                    'from' => $sms->getFrom(),
                    'to' => $sms->getTo(),
                    'text' => urlencode(utf8_encode($sms->getText()))
                )
            )
        )->json();

        $sms->setMessageId($data['message-id']);

        $response = new BaseSentResponse($sms, $data['message-count']);
        $response->setData($data);

        // TODO clearify usage of other messages
        $response->setMessageId($data['messages'][0]['message-id']);
        $response->setInternalId($data['messages'][0]['client-ref']);

        return $response;
    }

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
 