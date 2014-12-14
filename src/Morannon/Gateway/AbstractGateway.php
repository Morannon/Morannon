<?php

namespace Morannon\Gateway;

use Morannon\SMS\SMSInterface;

abstract class AbstractGateway implements GatewayInterface
{
    /**
     * @var string
     */
    protected $apiBaseUrl;

    /**
     * @var string
     */
    protected $apiUser;

    /**
     * @var string
     */
    protected $apiToken;

    /**
     * @param $apiBaseUrl
     * @param $apiToken
     * @param $apiUser
     */
    function __construct($apiBaseUrl, $apiToken, $apiUser)
    {
        $this->apiBaseUrl = $apiBaseUrl;
        $this->apiToken = $apiToken;
        $this->apiUser = $apiUser;
    }

    /**
     * {@inheritdoc}
     */
    public abstract function sendSMS(SMSInterface $sms);

    /**
     * {@inheritdoc}
     */
    public abstract function receiveSMS();

    /**
     * {@inheritdoc}
    */
    public function setApiBaseUrl($apiBaseUrl)
    {
        $this->apiBaseUrl = $apiBaseUrl;

        return $this;
    }

    /**
     * {@inheritdoc}
    */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;

        return $this;
    }

    /**
     * {@inheritdoc}
    */
    public function setApiUser($apiUser)
    {
        $this->apiUser = $apiUser;

        return $this;
    }
}
 