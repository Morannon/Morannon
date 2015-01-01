<?php

namespace Morannon\Base\Utils;

final class UrlUtils
{

    /**
     * Removes a trailing slash from an url string.
     *
     * @param string $url
     * @return string
     */
    public function removeTrainingSlash($url)
    {
        if (null === $url || strlen($url) <= 2) {
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
    public function buildUrlString($baseUrl, $resource)
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

    /**
     * Separates given string in key value parts.
     *
     * @param string $body
     * @return array
     */
    public function parseNewLineSeparatedBody($body)
    {
        $data = array();

        if (!$body) {
            return $data;
        }

        $parts = preg_split("/\\r?\\n/", $body);
        foreach ($parts as $str) {
            if (!$str) {
                continue;
            }

            list ($key, $value) = explode('=', $str);
            $data[$key] = $value;
        }

        return $data;
    }
}
 