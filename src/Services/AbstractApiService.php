<?php

namespace Lequipe\Services;
/**
 * Description of AbstractApiService
 *
 * @author cguinet
 */

abstract class AbstractApiService {
    
    const URI = "http://qlf-ws.lequipe.fr/ws/index.php";
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
