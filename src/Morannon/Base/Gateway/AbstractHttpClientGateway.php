<?php

namespace Morannon\Base\Gateway;


use Guzzle\Http\ClientInterface;

abstract class AbstractHttpClientGateway extends AbstractGateway
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
 