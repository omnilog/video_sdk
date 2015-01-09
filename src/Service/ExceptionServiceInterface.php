<?php

namespace Lequipe\Service;

use Lequipe\Exception\ApiException;

/**
 *
 * @author cguinet
 */
interface ExceptionServiceInterface {
  
    public function getApiException(\Exception $e);
    
}
