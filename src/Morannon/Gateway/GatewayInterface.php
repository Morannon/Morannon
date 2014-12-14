<?php

namespace Morannon\Gateway;

use Morannon\SMS\SMSInterface;

interface GatewayInterface
{
    /**
     * Sends an sms.
     *
     * @param SMSInterface $sms
     * @return mixed
     */
    public function sendSMS(SMSInterface $sms);

    /**
     * Receives an SMS from current url.
     *
     * @return SMSInterface
     */
    public function receiveSMS();

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
 