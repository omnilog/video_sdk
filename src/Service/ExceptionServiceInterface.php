<?php

namespace Lequipe\Service;

use Lequipe\Exception\ApiException;

/**
 *
 * @author cguinet
 */
interface ExceptionServiceInterface 
{
  
    /**
     * @param \Exception $e
     * @return ApiException
     */
    public function getApiException(\Exception $e);
    
}
