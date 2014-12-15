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
     * Removes a trailing slash from an url string.
     *
     * @param string $url
     * @return string
     */
    protected function removeTrainingSlash($url)
    {
        if (null === $url || strlen($url) > 2) {
            return $url;
        }

        return (substr($url, -1, 1) == '/')? substr($url, 0, -1) : $url;
    }

    /**
     * Returns either the concatenated string or null on wrong params.
     *
     * @param string $baseUrl
     * @param string $resource
     * @return string|null Null on invalid {$baseUrl}
     */
    protected function buildUrlString($baseUrl, $resource)
    {
        if (null === $baseUrl || '' == $baseUrl) {
            return null;
        }

        if (null === $resource || '' == $resource) {
            return $baseUrl;
        }

        $baseUrl = $this->removeTrainingSlash($baseUrl);
        if (!substr($resource, 0, 1) == '/') {
            $resource = '/' . $resource;
        }

        return $baseUrl . $resource;
    }
}
 