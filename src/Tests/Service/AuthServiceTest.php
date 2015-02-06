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
        $expected = array(
            'login' => $login,
            'password' => $password
        );
        $this->assertEquals($expected, $Auth->getAuthParams());
    }
    
    public function testGetAuthOptions() {
        $expected = array(
            'auth' => array(
                '',
                ''
            )
        );
        $login = "toto";
        $password = "tata";
        $Auth = new \Lequipe\Service\AuthService($login, $password);
        $this->assertEquals($expected, $Auth->getAuthOptions());
    }
}
