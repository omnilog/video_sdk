<?php
/**
 * Created by PhpStorm.
 * User: ageorgin
 * Date: 09/01/15
 * Time: 10:21
 */

namespace Lequipe\Service;


class UriParamService implements UriParamServiceInterface
{
    public function extractParamFromUri($uri)
    {
        $aRes = explode('/', $uri);
        return array(
            'class' => $aRes[0],
            'method' => $aRes[1]
        );
    }
} 