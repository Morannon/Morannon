<?php

namespace Morannon\WhateverMobile;

use Morannon\Base\Gateway\AbstractGateway;
use Morannon\Base\Response\BaseSentResponse;
use Morannon\Base\SMS\SMSInterface;

class NoopGateway extends AbstractGateway
{
    /**
     * {@inheritdoc}
     */
    public function sendSMS(SMSInterface $sms)
    {
        $id = rand();
        $sms->setMessageId(rand());

        $response = new BaseSentResponse($sms, 1);
        $response->setData(array('id' => $id));
        $response->setMessageId($id);

        return $response;
    }
}
 