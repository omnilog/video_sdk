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

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getAuthParams()
    {
        return array(
            'login' => $this->login,
            'password' => $this->password
        );
    }

}
