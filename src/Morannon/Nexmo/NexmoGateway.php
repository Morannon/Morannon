<?php

namespace Morannon\Nexmo;

use Morannon\Base\Gateway\AbstractHttpClientGateway;
use Morannon\Base\Response\BaseSentResponse;
use Morannon\Base\SMS\SMSInterface;

class NexmoGateway extends AbstractHttpClientGateway
{
    /**
     * {@inheritdoc}
     */
    public function sendSMS(SMSInterface $sms)
    {
        $data = $this->httpClient->post(
            $this->urlUtils->buildUrlString($this->getApiBaseUrl(), '/sms/json'),
            array(
                'content-type' => 'application/json'
            ),
            json_encode(
                array(
                    'api_key' => $this->getApiUser(),
                    'api_secret' => $this->getApiToken(),
                    'type' => 'text',
                    'from' => $sms->getFrom(),
                    'to' => $sms->getTo(),
                    'text' => urlencode(utf8_encode($sms->getText()))
                )
            )
        )->send()->json();

        $sms->setMessageId($data['message-id']);

        $response = new BaseSentResponse($sms, $data['message-count']);
        $response->setData($data);

        // TODO clearify usage of other messages
        $response->setMessageId($data['messages'][0]['message-id']);
        $response->setInternalId($data['messages'][0]['client-ref']);

        return $response;
    }
}
