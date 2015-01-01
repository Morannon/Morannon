<?php

namespace Morannon\Base\Gateway;

use Morannon\Base\SMS\SMSInterface;
use Morannon\Base\Utils\UrlUtils;

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
     * @var UrlUtils
     */
    protected $urlUtils;

    /**
     * @param UrlUtils $urlUtils
     * @param $apiBaseUrl
     * @param $apiToken
     * @param $apiUser
     */
    public function __construct(UrlUtils $urlUtils, $apiBaseUrl, $apiToken, $apiUser)
    {
        $this->apiBaseUrl = $apiBaseUrl;
        $this->apiToken = $apiToken;
        $this->apiUser = $apiUser;
        $this->urlUtils = $urlUtils;
    }

    /**
     * {@inheritdoc}
     */
    public abstract function sendSMS(SMSInterface $sms);

    /**
     * {@inheritdoc}
    */
    public function setApiBaseUrl($apiBaseUrl)
    {
        $this->apiBaseUrl = $apiBaseUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiBaseUrl()
    {
        return $this->apiBaseUrl;
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
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * {@inheritdoc}
    */
    public function setApiUser($apiUser)
    {
        $this->apiUser = $apiUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiUser()
    {
        return $this->apiUser;
    }
}
 