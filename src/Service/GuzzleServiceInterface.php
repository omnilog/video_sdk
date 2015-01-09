<?php

namespace Lequipe\Service;

interface GuzzleServiceInterface
{
    /**
     * Send a GET request
     *
     * @param string|array|Url $url     URL or URI template
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function get($uri, $headers = [], $params = []);
}
