<?php

namespace Lequipe\Service;
/**
 * Description of AbstractApiService
 *
 * @author cguinet
 */

abstract class AbstractApiService {
    /**
     * @var GuzzleInterface
     */
    private $guzzleSvc;

    /**
     * @param GuzzleInterface $guzzleSvc
     */
    public function setGuzzleSvc($guzzleSvc)
    {
        $this->guzzleSvc = $guzzleSvc;
    }

    /**
     * @return GuzzleInterface
     */
    public function getGuzzleSvc()
    {
        return $this->guzzleSvc;
    }
}
