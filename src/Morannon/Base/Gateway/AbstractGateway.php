<?php

namespace Morannon\Base\Gateway;

use Guzzle\Http\ClientInterface;
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
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @param $apiBaseUrl
     * @param $apiToken
     * @param $apiUser
     */
    public function __construct($apiBaseUrl, $apiUser, $apiToken)
    {
        $this->apiBaseUrl = $apiBaseUrl;
        $this->apiUser = $apiUser;
        $this->apiToken = $apiToken;
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

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param UrlUtils $urlUtils
     */
    public function setUrlUtils($urlUtils)
    {
        $this->urlUtils = $urlUtils;
    }

    /**
     * @return UrlUtils
     */
    public function getUrlUtils()
    {
        return $this->urlUtils;
    }
}
 