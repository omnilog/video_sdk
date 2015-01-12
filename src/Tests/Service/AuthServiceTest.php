<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthServiceTest
 *
 * @author cguinet
 */
class AuthServiceTest extends \PHPUnit_Framework_TestCase {

    public function testGetAuthParams() {
        
        $login = "toto";
        $password = "tata";
        $Auth = new \Lequipe\Service\AuthService($login, $password);
        $actual = array(
            'login' => $login,
            'password' => $password
        );
        $this->assertEquals($actual, $Auth->getAuthParams());
    }
}
