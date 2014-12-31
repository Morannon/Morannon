<?php

namespace Morannon\Base\Gateway;

use Morannon\Base\Response\SentResponseInterface;
use Morannon\Base\SMS\SMSInterface;

interface GatewayInterface
{
    /**
     * Sends an sms.
     *
     * @param SMSInterface $sms
     * @return SentResponseInterface $response
     */
    public function sendSMS(SMSInterface $sms);

    /**
     * Sets the API base url.
     *
     * @param $baseUrl
     * @return mixed
     */
    public function setApiBaseUrl($baseUrl);

    /**
     * Sets the API user.
     *
     * @param string $apiUser
     * @return $this
     */
    public function setApiUser($apiUser);

    /**
     * Sets the API token.
     *
     * @param $apiToken
     * @return $this
     */
    public function setApiToken($apiToken);
}
 