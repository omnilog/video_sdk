<?php

namespace Lequipe\Service;

/**
 * Description of DataFormatter
 *
 * @author cguinet
 */
class DataFormatterService implements DataFormatterServiceInterface {
    /**
     * @var string
     */
    private $format;
    
    public function __construct($format)
    {
        $this->format = $format;    
    }
    
    public function getFormat() {
        return $this->format;
    }
    
    public function setFormatParams() {
        return array('outputType' => $this->format);
    }
}
