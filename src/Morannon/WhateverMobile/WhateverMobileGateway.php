<?php

namespace Morannon\WhateverMobile;

use Guzzle\Http\Exception\RequestException;
use Morannon\Base\Exception\DeliveryFailedException;
use Morannon\Base\Gateway\AbstractGateway;
use Morannon\Base\Response\BaseSentResponse;
use Morannon\Base\SMS\SMSInterface;

class WhateverMobileGateway extends AbstractGateway
{
    /**
     * {@inheritdoc}
     */
    public function sendSMS(SMSInterface $sms)
    {
        try {
            $body = $this->httpClient->get(
                $this->urlUtils->buildUrlString($this->getApiBaseUrl(), '/sendsms'),
                null,
                array(
                    'query' => array(
                        'user' => $this->getApiUser(),
                        'password' => $this->getApiToken(),
                        'from' => $sms->getFrom(),
                        'to' => $sms->getTo(),
                        'text' => mb_convert_encoding($sms->getText(), 'ISO-8859-15', mb_detect_encoding($sms->getText()))
                    )
                )
            )->send();
        } catch (RequestException $ex) {
            throw new DeliveryFailedException($ex->getMessage(), 0, $ex);
        }

        $data = $this->urlUtils->parseNewLineSeparatedBody($body);
        $sms->setMessageId($data['id']);

        $response = new BaseSentResponse($sms, 1);
        $response->setData($body);
        $response->setMessageId($data['id']);

        return $response;
    }
}
 