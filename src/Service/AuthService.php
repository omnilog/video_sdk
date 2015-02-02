<?php
/**
 * Created by PhpStorm.
 * User: ageorgin
 * Date: 09/01/15
 * Time: 10:26
 */

namespace Lequipe\Service;


class AuthService implements AuthServiceInterface
{
    /**
     * @var string
     */
    private $login = null;

    /**
     * @var string
     */
    private $password = null;
    
    private $acllog = null;
    
    private $aclpass = null;

    public function __construct($login, $password, $acllog = "", $aclpass = "")
    {
        $this->login = $login;
        $this->password = $password;
        $this->acllog= $acllog;
        $this->aclpass = $aclpass;
    }

    public function getAuthParams()
    {
        return array(
            'login' => $this->login,
            'password' => $this->password
        );
    }

    public function getAuthOptions()
    {
        return array(
            'auth' => array(
                $this->AclLog,
                $this->AclPass
            )
        );
    }


}
